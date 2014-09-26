<div class="container row">
	<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
		<!-- <form action="=site_url('welcome/insert');?>" method="post"> -->
		<?php   if(isset($id)) {
					echo form_open('welcome/update/'.$id);
				} else {
					echo form_open('welcome/update');
				} ?>
			<div class="form-group">
			
			    <label for="clients">Client:</label>
			    <!--?php echo form_input($client["input"], $client["value"]); ?-->
			    <?php echo form_input($client['input'],(isset($client['value'])) ? $client['value'] : '' ); ?>
			    <!-- <input type="text" class="form-control" name="client" placeholder="Introdueix client"> -->
			    <?php echo form_error('client'); ?>
			</div>
			<div class="form-group">
			    <label for="tasques">Tasca:</label>
			    <!--?php echo form_input($tasca["input"], $tasca["value"]); ?-->
			    <?php echo form_input($tasca['input'],(isset($tasca['value'])) ? $tasca['value'] : ''); ?>
			    <!-- <input type="text" class="form-control" name="tasca" placeholder="Introdueix tasca">-->
			    <?php echo form_error('tasca'); ?>
			</div>
			<?php echo form_submit('formulari', 'Enviar'); ?>
			<!-- <input type="submit" class="btn btn-default" name="formulari"/><br/> -->
		<?php echo form_close(); ?>
	</div>
</div>