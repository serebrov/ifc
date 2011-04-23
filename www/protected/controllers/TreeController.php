<?php

class TreeController extends Controller
{

	public function actionData($id) {
        if ((integer)$id===0) {
			$models = Tree::model()->roots()->findAll();
        } else {
			$models = Tree::model()->findByPk($id)->children()->findAll();
        }
        echo CJSON::encode($this->formatJsTreeData($models, true));
	}
    
	public function actionLoadNode($nid, $type) {
		if ($type=='machine')
			return $this->forward('machine/viewNode');
		if ($type=='machine_node')
			return $this->forward('machineNode/viewNode');
		throw new CHttpException(404,'The requested page does not exist.');
	}
	
	public function formatJsTreeData($models, $addChildren = true) {
		/*{
			data : "node_title",
		    // omit `attr` if not needed; the `attr` object gets passed to the jQuery `attr` function
			attr : { id : "node_identificator", some-other-attribute : "attribute_value" },
			// `state` and `children` are only used for NON-leaf nodes
			state: "closed", // or "open", defaults to "closed"
			children: [ / an array of child nodes objects / ]
		}*/
		$data = array();
		foreach($models as $model) {
			$d = array(
				'data' => $model->name,
				'attr' => array(
					'id' => 'node_' . $model->id,
					'rel' => $model->getTypeName()
				),
			);	
			if ($model->isLeaf()) {
				$d['children'] = array();
			} else if ($addChildren) {
				$d['children'] = $this->formatJsTreeData($model->children()->findAll());
			}
			if (!$model->isLeaf()) {
				//'state' => $addChildren || $model->isLeaf() ? 'open' : 'closed',
				$d['state'] = 'open';
			}
			$data[] = $d;
		}
		return $data;
    }
}