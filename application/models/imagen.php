<?php 
Class imagen extends DataMapper{
	
	var $table = 'imagenes';
	
	var $model = 'imagen';
	
	var $has_one = array(
			'perfil'
	);
	
	var $has_many = array();
}
?>