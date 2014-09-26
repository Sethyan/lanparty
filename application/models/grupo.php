<?php 
Class Grupo extends DataMapper{
	
	var $table = 'grupos';
	
	var $model = 'grupo';
	
	var $has_one = array(
		'user'=>array(
				'class'=>'user',
				'other_field'=>'grupo',
				'join_self_as'=>'grupo')
	);
	
	var $has_many = array();
}
?>