<?php 
Class Puntuacion extends DataMapper{
	
	var $table = 'puntuaciones';
	
	var $model = 'puntuacion';
	
	var $has_one = array(
			'juego',
			'user'
	);
	
	var $has_many = array();
}
?>