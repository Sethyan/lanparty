<?php 
Class Perfil extends DataMapper{
	
	var $table = 'perfiles';
	
	var $model = 'perfil';
	
	var $has_one = array(
			'user'=>array(
					'class'=>'user',
					'other_field'=>'perfil',
					'join_self_as'=>'perfil',
					'join_other_as'=>'user'),
			'imagen'=>array(
					'class'=>'imagen',
					'other_field'=>'user',
					'join_self_as'=>'user')
	);
	
	var $has_many = array();
}
?>