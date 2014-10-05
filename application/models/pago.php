<?php 
Class Pago extends DataMapper{
	
	var $table = 'pagos';
	
	var $model = 'pago';
	
	var $has_one = array(
		'user'=>array(
				'class'=>'user',
				'other_field'=>'pago',
				'join_self_as'=>'pago')
	);
	
	var $has_many = array();
}
?>