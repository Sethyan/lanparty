<div class="container row">
	<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
		<form action="<?=site_url('welcome/insert');?>" method="post">
			<div class="form-group">
			    <label for="clients">Client:</label>
			    <input type="text" class="form-control" name="client" placeholder="Introdueix client">
			</div>
			<div class="form-group">
			    <label for="tasques">Tasca:</label>
			    <input type="text" class="form-control" name="tasca" placeholder="Introdueix tasca">
			</div>
			<input type="submit" class="btn btn-default" name="formulari"/><br/>
		</form>
	</div>
</div>
