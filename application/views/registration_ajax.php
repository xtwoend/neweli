<select id="program_<?php echo $id ?>" class="program" name="program">
	<?php foreach ($programs as $program): ?>
		<option value="<?php echo  $program->id; ?>"><?php echo  $program->program; ?></option>
	<?php endforeach; ?>
</select>
<div id="viprogram_<?php echo $id ?>"></div>
<script type="text/javascript">
 $("#program_<?php echo $id ?>").change(function () {
  		$('#viprogram_<?php echo $id ?>').load('<?php echo base_url() ?>/registers/ajaxprogram/'+ $(this).val());
	}).change();
</script>