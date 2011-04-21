<?php

class TreeController extends Controller
{

	public function behaviors() {
		return array(
			'EJNestedTreeActions'=>array(
				'class'=>'ext.EJNestedTreeActions.EBehavior',
				'classname'=>'Tree',
				'identity'=>'id',
				'text'=>'name',
			),
		);
	}
	public function actions() {
		return array (
			'render'=>'ext.EJNestedTreeActions.actions.Render',
			'createnode'=>'ext.EJNestedTreeActions.actions.Createnode',
			'renamenode'=>'ext.EJNestedTreeActions.actions.Renamenode',
			'deletenode'=>'ext.EJNestedTreeActions.actions.Deletenode',
			'movenode'=>'ext.EJNestedTreeActions.actions.Movenode',
			'copynode'=>'ext.EJNestedTreeActions.actions.Copynode',
		);
	
	}
}