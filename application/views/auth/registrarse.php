

<p>En caso de no tener dni ir <a href="<?=site_url() .'/registrarse-no-dni' ?>">aqui</a></p>


<?=form_open('registrarse')?>
<div class="form-group">
	<label for="titol">dni:</label>
	<?=form_input($dni['input'],(isset($dni['value'])) ? $dni['value'] : '', 'class="form-control"')?>
	<?=form_error($dni['input']['name'])?>
</div>
<div class="form-group">
	<label for="titol">Nombre:</label>
	<?=form_input($nombre['input'],(isset($nombre['value'])) ? $nombre['value'] : '', 'class="form-control"')?>
	<?=form_error($nombre['input']['name'])?>
</div>
<div class="form-group">
	<label for="titol">Apellidos:</label>
	<?=form_input($apellidos['input'],(isset($apellidos['value'])) ? $apellidos['value'] : '', 'class="form-control"')?>
	<?=form_error($apellidos['input']['name'])?>
</div>
<div class="form-group">
	<label for="titol">E-mail:</label>
	<?=form_input($email['input'],(isset($email['value'])) ? $email['value'] : '', 'class="form-control"')?>
	<?=form_error($email['input']['name'])?>
</div>
<div class="form-group">
	<label for="titol">Confirmar E-mail:</label>
	<?=form_input($email2['input'],(isset($email2['value'])) ? $email2['value'] : '', 'class="form-control"')?>
	<?=form_error($email2['input']['name'])?>
</div>
<div class="form-group">
	<label for="titol">Nickname:</label>
	<?=form_input($nickname['input'],(isset($nickname['value'])) ? $nickname['value'] : '', 'class="form-control"')?>
	<?=form_error($nickname['input']['name'])?>
</div>
<div class="form-group">
	<label for="titol">Contraseña:</label>
	<?=form_password($password['input'], '', 'class="form-control"')?>
	<?=form_error($password['input']['name'])?>
</div>
<div class="form-group">
	<label for="titol">Confirmar contraseña:</label>
	<?=form_password($password2['input'], '', 'class="form-control"')?>
	<?=form_error($password2['input']['name'])?>
</div>
<?=form_hidden($pagina)?>
<div class="form-group">
	<button type="submit" name="submit" value="submit" class="btn btn-primary">Afegir</button>
</div>

<?=form_close()?>


