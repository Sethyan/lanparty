<?php 
Class Reserva extends DataMapper{
	
	var $table = 'reservas';
	
	var $model = 'reserva';
	
	var $has_one = array(
			'user'=>array(
					'class'=>'user',
					'other_field'=>'reserva',
					'join_self_as'=>'reserva',
					'join_other_as'=>'user',
					'join_table' => 'users_reservas')
	);
	
	var $has_many = array();
}
?>