<?php
Class Treballador extends DataMapper{
	
	var $table="treballadors";
	
	var $model = 'treballador';
	
	var $has_one = array();
	
	var $has_many = array(
			'tasca'=>array(
					'class'=>'tasca',
					'other_field'=>'treballador',
					'join_self_as'=>'treballador',
					'join_other_as'=>'tasca',
					'join_table'=>'clients_tasques')
	);
}
?>