<table>
<?php $this->set('title_for_layout', 'View Active Users'); ?>
<?php foreach ($templates as $template): ?>
	<tr>
		<td><?php echo $template["Form"]["form_id"]; ?></td>
		<td><?php echo $template["Form"]["name"]; ?></td>
	</tr>
<?php endforeach; ?>
</table>