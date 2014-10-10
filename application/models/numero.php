<?php 
Class Numero extends DataMapper{
	
	var $table = 'numeros';
	
	var $model = 'numero';
	
	var $has_one = array(
			'user'
	);
	
	var $has_many = array();
}
?>