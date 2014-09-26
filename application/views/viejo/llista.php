<div class="container row">
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