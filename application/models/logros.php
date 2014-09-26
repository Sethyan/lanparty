<?php 
Class Logros extends DataMapper{
	
	var $table = 'logros';
	
	var $model = 'logros';
	
	var $has_one = array(
			'user'=>array(
					'class'=>'user',
					'other_field'=>'logros',
					'join_self_as'=>'logros',
					'join_other_as'=>'user',
					'join_table' => 'users_logros')
	);
	
	var $has_many = array();
}
?>