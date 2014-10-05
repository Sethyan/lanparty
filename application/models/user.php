<?php 
Class User extends DataMapper{
	
	var $table = 'users';
	
	var $model = 'user';
	
	var $has_one = array(
			'grupo',
			'pago',
			'perfil'=>array(
					'class'=>'perfil',
					'other_field'=>'user',
					'join_self_as'=>'user',
					'join_other_as'=>'perfil')
			
	);
	
	var $has_many = array(
			'puntuacion',
			'logros'=>array(
					'class'=>'logros',
					'other_field'=>'user',
					'join_self_as'=>'user',
					'join_other_as'=>'logros',
					'join_table' => 'users_logros'),
			'reserva'=>array(
					'class'=>'reserva',
					'other_field'=>'user',
					'join_self_as'=>'user',
					'join_other_as'=>'reserva',
					'join_table' => 'users_reservas'),
			'puntuacion'=>array(
					'class'=>'puntuacion',
					'other_field'=>'user',
					'join_self_as'=>'user'),
			'numero'=>array(
					'class'=>'numero',
					'other_field'=>'user',
					'join_self_as'=>'user')
			
	);
}
?>