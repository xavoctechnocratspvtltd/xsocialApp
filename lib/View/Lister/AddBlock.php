<?php

namespace xsocialApp;

class View_Lister_AddBlock extends \CompleteLister{
	public $is_active_marked=false;

	function formatRow(){
		$this->current_row['link']=$this->model['link'];
		if(!$this->is_active_marked){
			$this->current_row['active_class'] ='active';
			$this->is_active_marked=true;
		}else{
			$this->current_row['active_class']='';
		}
	}

	function setModel($model){
		parent::setModel($model);
		$this->template->set('name',$model->ref('block_id')->get('name'));
	}

	
	function defaultTemplate(){
		$l=$this->api->locate('addons',__NAMESPACE__, 'location');
		$this->api->pathfinder->addLocation(
			$this->api->locate('addons',__NAMESPACE__),
			array(
		  		'template'=>'templates',
		  		'css'=>'templates/css',
		  		'js'=>'templates/js'
				)
			)->setParent($l);

		return array('view/xsocial-addblock');

	}
	
}