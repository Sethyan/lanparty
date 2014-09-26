<?php 
Class Torneo extends DataMapper{
	
	var $table = 'torneos';
	
	var $model = 'torneo';
	
	var $has_one = array('juego');
	
	var $has_many = array(
		'puntuacion'=>array(
				'class'=>'puntuacion',
				'other_field'=>'torneo',
				'join_self_as'=>'torneo')
	);
}
?>