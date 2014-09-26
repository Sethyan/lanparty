<div class="container row">
	<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
		<!-- <form action="=site_url('welcome/insert');?>" method="post"> -->
		<?php   if(isset($id)) {
					echo form_open('welcome/delete/'.$id);
				} else {
					echo form_open('welcome/delete');
				} ?>
			<div class="form-group">
			
			    <label for="clients">Id:</label>
			    <?php echo form_input($id['input'],$id['value']); ?>
			    <?php echo form_error('id'); ?>
			</div>
			<?php echo form_submit('borrar', 'Borrar'); ?>
			<!-- <input type="submit" class="btn btn-default" name="formulari"/><br/> -->
		<?php echo form_close(); ?>
	</div>
	<table class="table table-striped">
		<tr>
			<th>id</th>
			<th>client</th>
			<th>tasca</th>
		</tr>
		<?php foreach ($llistat as $item){?>
			<tr>
				<td><?=$item->id?></td>
				<td><?=$item->client?></td>
				<td><?=$item->tasca?></td>
			</tr>
		<?php }?>
	</table>
</div>