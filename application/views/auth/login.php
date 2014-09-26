<?=form_open('login')?>

<?=(isset($errorlogin))? '<p style="color: red;">' . $errorlogin . '</p>' : ''?>
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
<?=form_hidden($pagina)?>
<div class="form-group">
	<button type="submit" name="submit" value="submit" class="btn btn-primary">Afegir</button>
</div>
<?=form_close()?>
