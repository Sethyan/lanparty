<div class="container row">
	<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
		<?php   if(isset($id)) {
					echo form_open('treballadors/update/'.$id);
				} else {
					echo form_open('treballadors/update');
				} ?>
			<div class="form-group">
			    <label for="treballadors">Treballador:</label>
			    <?php echo form_input($treballador['input'],(isset($treballador['value'])) ? $treballador['value'] : '' ); ?>
			    <?php echo form_error('treballador'); ?>
			</div>
			<?php echo form_submit('formulari', 'Enviar'); ?>
		<?php echo form_close(); ?>
	</div>
</div>