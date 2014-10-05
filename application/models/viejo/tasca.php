<?php
Class Tasca extends DataMapper {
	
	var $table = 'tasca';
	
	var $model = 'tasca';
	
	var $has_one = array();

	var $has_many = array('treballador'=>array(
								'class' => 'treballador',
								'other_field'=>'tasca',
								'join_self_as'=>'tasca',
								'join_other_as'=>'treballador',
								'join_table'=>'tasques_treballadors'),
						'client'=>array(
								'class'=>'client',
								'other_field'=>'tasca',
								'join_self_as'=>'tasca',
								'join_other_as'=>'client',
								'join_table'=>'clients_tasques')
						);
	}

?>