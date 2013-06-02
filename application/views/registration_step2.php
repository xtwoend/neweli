<article id="registration" class="cf">
	<div class="left">
		<nav id="menu" class="cf">
			<ul>
				<li class="active"><?php echo lanchor('registers','public programs'); ?></li>
				<li><?php echo lanchor('registers/costum','custom programs'); ?></li>
			</ul>
		</nav>
		
		<div class="content">
			
			<h1>registration form</h1>
			<fieldset>
				<legend class="rounded">
					<a href="">step 1 &bull; personal &amp; company details</a>
					<a href="" class="last">step 2 &bull; programs &amp; participants</a>
				</legend>
			</fieldset>

			<form method="post">

			<div id="step2" class="cf">
				<h1>Program Selection</h1>
				<h2>Select the tities of the program for which you would like to register:</h2>
				
				<?php if($programselected): ?>
					<h3>Selected Programs<h3>
					<hr id="dasdot">
					<?php foreach ($programselected as $prog): ?>
						
						<h4><?php $programreg =  $this->mprograms->findprog(array('id'=> $prog->program_id ,'program_lang.lang'=> $this->lang->mci_current())); echo $programreg->program_name; ?></h4>
							<?php  echo $this->mperiode_courses->find(array('id'=>$prog->periode_id))->periode ?>
						<br>
						<hr>			
					<?php endforeach; ?>

				<?php endif; ?>
				<br>
				<br>
				<input type="hidden" name="register_id" value="<?php echo $register_id; ?>">
				<select id="program1" class="program" name="program">
					<?php foreach ($programs as $program): ?>
						<option value="<?php echo  $program->id; ?>"><?php echo  $program->program; ?></option>
					<?php endforeach; ?>
				</select>
				<div id="viprogram"></div>
				<br>
			
			<br>

				<div> 
					<label for="periode">Periode : </label>
					<select name="periode" class="periode">
						<?php foreach ($periode as $pr): ?>
							<option value="<?php echo  $pr->id; ?>"><?php echo  $pr->periode; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>

			<input type="submit" class="rounded" name="submit" value="+ Add Program" /></form>
		<br>
		<br>		
		<div class="submit cf">
					
				<?php echo lanchor('registers/step3' ,'Next &rsaquo;','class="rounded"'); ?>
		</div>
		
		</div><!--content-->
		</form>
	</div><!--left-->
</article>

<script>
   $("#program1").change(function () {
  		$('#viprogram').load('<?php echo base_url() ?>/registers/ajaxprogram/'+ $(this).val());
	}).change();
</script>