<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<table class="form-table">
	<tr>
		<th scope="row"><?= $title; ?></th>
		<td>
			<label for="<?= $id; ?>">
				<input type="checkbox" name="<?= $name; ?>" id="<?= $id; ?>" <?= $checked; ?> />
				<?= $description; ?>
			</label>
		</td>
	</tr>
</table>