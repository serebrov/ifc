(function( $ ) {
	$.ifcTree = {
		url: {
			data: '/index.php?r=tree/data',
			loadNode: '/index.php?r=tree/loadNode',
			move: '/index.php?r=tree/movenode',
			rename: '/index.php?r=tree/renamenode',
			remove: '/index.php?r=tree/deletenode',
			create: '/index.php?r=tree/createnode',
			copy: '/index.php?r=tree/copynode'
		},
		
		buildTree: function(selector) {
			var self = this;
			$(selector).jstree({
				'json_data': {
					'ajax':{
						'url':this.url.data,
						'data' : function (n) {
						    return { 
								id : n.attr ? n.attr("id") : 0 
							};
						}
					}
				},
				'themes': {
	  	            'theme' : 'default',
	  	            'dots' : true,
	  	            'icons' : true
	  	        },
				'ui': {
					'select_limit': 1
				},
				"types" : {
					"valid_children" : [ "root" ],
					"types" : {
						"root" : {
							//"icon" : { 
							//	"image" : "http://static.jstree.com/v.1.0rc/_docs/_drive.png" 
							//},
							"valid_children" : [ "machine" ],
							//"max_depth" : 2,
							"hover_node" : false,
							"select_node" : function () {return false;}
						},
						"machine" : {
							"valid_children" : [ "machine_node" ]
						},
						"machine_node" : {
							"valid_children" : [ "bearing", "gear" ]
						},
						"bearing" : {
							"valid_children" : [ "none" ]
						},
						"gear" : {
							"valid_children" : [ "none" ]
						}
					}
				},
				/*'rules': {
					'droppable':'tree-drop',
					'multiple':true,
					'deletable':'all',
					'draggable':'all'
				},*/
				'plugins': ['themes', 'json_data', 'ui', 'crrm', 'cookies']
			}).bind("select_node.jstree", function (e, data) {
				self.onSelectNode(e, data);
			}).bind("create.jstree", function (e, data) {
				self.onCreate(e, data);
			}).bind("remove.jstree", function (e, data) {
				self.onRemove(e, data);
			}).bind("rename.jstree", function (e, data) {
				self.onRename(e, data);
			}).bind("move_node.jstree", function (e, data) {
				self.onMove(e, data);
			});
		},

		onSelectNode: function(e, data) {
			var self = this;
			data.rslt.obj.each(function () {
				$.ajax({
					async : false,
					type: 'GET',
					url: self.url.loadNode,
					data : { 
						'nid' : this.id.replace("node_",""),
						'type': $(this).attr('rel')
					}, 
					success : function (data, textStatus, jqXHR) {
						$('#details').html(data);
					}
				});
			});
		},

		onCreate: function(e, data) {
			$.post(
				this.url.create,
				{ 
					"operation" : "create_node", 
					"id" : data.rslt.parent.attr("id").replace("node_",""), 
					"position" : data.rslt.position,
					"title" : data.rslt.name,
					"type" : data.rslt.obj.attr("rel")
				}, 
				function (r) {
					if(r.status) {
						$(data.rslt.obj).attr("id", "node_" + r.id);
					}
					else {
						$.jstree.rollback(data.rlbk);
					}
				}
			);
		},

		onRemove: function(e, data) {
			var self = this;
			data.rslt.obj.each(function () {
				$.ajax({
					async : false,
					type: 'POST',
					url: self.url.remove,
					data : { 
						"operation" : "remove_node", 
						"id" : this.id.replace("node_","")
					}, 
					success : function (r) {
						if(!r.status) {
							data.inst.refresh();
						}
					}
				});
			});
		},

		onRename: function(e, data) {
			$.post(
				this.url.rename,
				{ 
					"operation" : "rename_node", 
					"id" : data.rslt.obj.attr("id").replace("node_",""),
					"title" : data.rslt.new_name
				}, 
				function (r) {
					if(!r.status) {
						$.jstree.rollback(data.rlbk);
					}
				}
			);
		},

		onMove: function(e, data) {
			var self = this;
			data.rslt.o.each(function (i) {
				$.ajax({
					async : false,
					type: 'POST',
					url: self.url.move,
					data : { 
						"operation" : "move_node", 
						"id" : $(this).attr("id").replace("node_",""), 
						"ref" : data.rslt.np.attr("id").replace("node_",""), 
						"position" : data.rslt.cp + i,
						"title" : data.rslt.name,
						"copy" : data.rslt.cy ? 1 : 0
					},
					success : function (r) {
						if(!r.status) {
							$.jstree.rollback(data.rlbk);
						}
						else {
							$(data.rslt.oc).attr("id", "node_" + r.id);
							if(data.rslt.cy && $(data.rslt.oc).children("UL").length) {
								data.inst.refresh(data.inst._get_parent(data.rslt.oc));
							}
						}
						$("#analyze").click();
					}
				});
			})
		}
	}

}) (jQuery);

