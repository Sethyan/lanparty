<?php 
Class Juego extends DataMapper{
	
	var $table = 'juegos';
	
	var $model = 'juego';
	
	var $has_one = array();
	
	var $has_many = array(
		'torneo'=>array(
				'class'=>'torneo',
				'other_field'=>'juego',
				'join_self_as'=>'juego')
	);
}
?>