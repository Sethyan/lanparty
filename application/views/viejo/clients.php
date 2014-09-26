<div class="container row">
	<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
		<?php   if(isset($id)) {
					echo form_open('clients/update/'.$id);
				} else {
					echo form_open('clients/update');
				} ?>
			<div class="form-group">
			
			    <label for="clients">Client:</label>
			    <?php echo form_input($client['input'],(isset($client['value'])) ? $client['value'] : '' ); ?>
			    <?php echo form_error('client'); ?>
			</div>
			<!-- <div class="form-group">
			 <!--    <label for="tasques">Tasca:</label>
			<!--     <?php echo form_input($tasca['input'],(isset($tasca['value'])) ? $tasca['value'] : ''); ?>
		<!-- 	    <?php echo form_error('tasca'); ?>
			</div>
			<div class="form-group">
			    <label for="treballadors">Treballador:</label>
		<!-- 	    <?php echo form_input($treballador['input'],(isset($treballador['value'])) ? $treballador['value'] : ''); ?>
		<!-- 	    <?php echo form_error('treballador'); ?>
			</div>-->
			<?php echo form_submit('formulari', 'Enviar'); ?>
		<?php echo form_close(); ?>
	</div>
</div>