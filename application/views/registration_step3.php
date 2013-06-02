
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

			<div id="step2" class="cf">
			<h1>Program Selection</h1>
			<h2>Select the tities of the program for which you would like to register:</h2>
			<h3>Selected Programs<h3>
			<hr id="dasdot">

			<?php foreach($programs as $prog): ?>
					<h4><?php $programreg =  $this->mprograms->findprog(array('id'=> $prog->program_id ,'program_lang.lang'=> $this->lang->mci_current())); echo $programreg->program_name; ?></h4>
					<?php  echo $this->mperiode_courses->find(array('id'=>$prog->periode_id))->periode ?>
					<div class="addpartisipan" id="addpartisipan-<?php echo $prog->id ?>">PARTICIPANTS</div>
					<hr>
					<div class="content-<?php echo $prog->id ?>">
						<div class="add-participan">
						<h1>Participants</h1>
						<h2>add participants to the programs</h2>
						<br>
							<?php
								$participants = $this->mregisters->findregisters(array('participant_of' => $register_id,'program_id'=> $prog->program_id), 'registrations.id,registrations.first_name,last_name,job_title,mobile_phone,email,program_id');
							?>
							<?php $no=1; ?>
							<?php if($participants): ?> 
						<h3> Participant List </h3>
						<table id="participanlist">
							<tr>
								<th>No.</th>
								<th>Participant</th>
								<th>Mobile Phone</th>
								<th>Email</th>
								<th>Tuition Fee (IRD)</th>
								<th></th>
							</tr>
							<?php $subtotal = 0; ?>
							<?php foreach ($participants  as $participan): ?>
						
							<?php $subtotal = $this->mprograms->findprog(array('id'=> $participan->program_id))->price + $subtotal; ?>	
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $participan->first_name .' '. $participan->last_name ?> <br> <?php echo $participan->job_title ?></td>
								<td><?php echo $participan->mobile_phone ?></td>
								<td><?php echo $participan->email ?></td>
								<td><?php echo number_format($this->mprograms->findprog(array('id'=> $participan->program_id))->price, 2, ',', ' ') ?></td>
								<td><a class="edit-<?php echo $prog->id ?>" id="edit" rel="<?php echo $participan->id ?>" style="padding:0px 0px 0px 0px;">Edit</a> <a class="delete-<?php echo $prog->id ?>"  id="delete" rel="<?php echo $participan->id ?>">Remove</a></td>
							</tr>
							<?php $no++; ?>
							<?php endforeach; ?>
						</table>

						<br>
						<h3>Total Participants :  <?php echo $no; ?></h3>
						<div style="float: right;">SubTotal Fee : <?php number_format($subtotal, 2, ',', ' ') ?> IDR</div><br>
						<div style="float: right;">Group Discount : 0 IDR</div>
						<br>
						<hr>
						<div style="float: right; font-weight: bold;">Total Fee : <?php number_format($subtotal, 2, ',', ' ') ?> IDR</div>
						<?php endif; ?>
						<br>
						<form method="post">

						<input type="hidden" name="prog_id" value="<?php echo $prog->id ?>">
						<input type="hidden" name="register_id" value="<?php echo  $register_id ?>">
						<input type="hidden" name="reg_id" id="reg_id-<?php echo $prog->id ?>"> 
						<input type="checkbox" id="personal-<?php echo $prog->id ?>" name="personal"  value="1"/>I'm registering for my self only
							<table>
								<tr> 
									<td>
										<div class="simple">
											<label for="firstname">First Name:</label>
											<input type="text" class="rounded" name="firstname" id="firstname-<?php echo $prog->id ?>" value="" required />
										</div>
									</td>
									<td>
										<div class="simple">
											<label for="lastname">Last Name:</label>
											<input type="text" name="lastname" class="rounded" id="lastname-<?php echo $prog->id ?>"  value="" required/>
										</div>
									</td>
								</tr>

								<tr> 
									<td>
										<div class="simple">
											<label for="firstname">Brith Place</label>
											<input type="text" class="rounded" name="birth_place" id="birth_place-<?php echo $prog->id ?>" value="" />
										</div>
									</td>
									<td>
										<div class="simple">
											<label for="lastname">Date of Birth</label>
											<input type="text" name="date_of_birth" style="witdh:120px; " class="rounded" id="datepicker-<?php echo $prog->id ?>" value=""/>
										</div>
									</td>
								</tr>
							</table>
						
						
						<div class="simple">
							<label for="gender">Gender:</label>
							<input type="radio" name="gender" id="gender-<?php echo $prog->id ?>" value="Male"/> Male 
							<input type="radio" name="gender" id="gender-<?php echo $prog->id ?>" value="Female"/> Female 
						</div>
						<div class="simple">
							<label for="jobtitle">Job Title:</label>
							<input type="text" name="jobtitle" class="rounded" id="jobtitle-<?php echo $prog->id ?>" value="" />
						</div>
						<div class="simple">
							<label for="mobile_phone">Mobile Phone:</label>
							<input type="text" name="mobile_phone" id="mobile_phone-<?php echo $prog->id ?>" class="rounded" value=""/>
						</div>
						
							<input type="submit" class="rounded" name="submit" value="+ Add / Save" />
							
						</div>
					</div>
					</form>
					</div>
			
			<?php endforeach; ?>
				<div class="submit">
					<?php echo form_open('registers/cetak',array('target'=>'_blank')); ?>
						<input type="hidden" name="register_id" value="<?php echo  $register_id ?>">
						<input type="submit" class="rounded" name="submit" value="Print" />
					</form>	
				</div>
			</div>
		</div>
	</div>
</article>



<script>

	<?php foreach($programs as $prog): ?>

	 $('.edit-<?php echo $prog->id ?>').each(function(index,elem) {
          $(elem).click(function(){
            var regid = $(elem).attr('rel');
            //edit(regid);
            $.ajax({
	          type: 'GET',
	          contentType: 'application/json',
	          url: '<?php echo site_url('registers/partisipan') ?>/' + regid,
	          dataType: "json",
	          success: function(data){
	          	//var obj = jQuery.parseJSON(data);
	          	//alert(obj.first_name);
	          	$('#reg_id-<?php echo $prog->id ?>').val(data.id);
	          	$('#firstname-<?php echo $prog->id ?>').val(data.first_name);
	          	$('#lastname-<?php echo $prog->id ?>').val(data.last_name);
	          	$('#birth_place-<?php echo $prog->id ?>').val(data.birth_place);
	          	$('#datepicker-<?php echo $prog->id ?>').val(data.date_of_birth);
	          	$('#jobtitle-<?php echo $prog->id ?>').val(data.job_title);
	          	$('#mobile_phone-<?php echo $prog->id ?>').val(data.mobile_phone);
	          }, 
	        });
            return false;
          });
      });

	 $('.delete-<?php echo $prog->id ?>').each(function(index,elem) {
          $(elem).click(function(){
            var regid = $(elem).attr('rel');
            var r=confirm("Your sure!")
			if (r==true)
			  {
			  	//el(regid);
		           	$.ajax({
			          type: 'GET',
			          contentType: 'application/json',
			          url:  '<?php echo site_url('registers/delpartisipan') ?>/' + regid,
			          dataType: "json",
			          success: function(data){
			          	alert(data.msg);
			          	location.reload();
			          }, 
			        });
			  }
            

           	return false;
          });
      });
	<?php endforeach; ?>
	$(function(){

		
		<?php foreach($programs as $prog): ?>
		/*
		$( "#datepicker-<?php echo $prog->id ?>" ).datepicker({
			showOn: "button",
			buttonImage: "themes/images/calendar.gif",
			buttonImageOnly: true,
			dateFormat: 'yy-mm-dd',
		});
		*/
		$('#personal-<?php echo $prog->id ?>').click(function() {
	    	var $this = $(this);
	    // $this will contain a reference to the checkbox   
		    if ($this.is(':checked')) {
		        $('.content-<?php echo $prog->id ?>').css('display','none');
		    } else {
		        $('.content-<?php echo $prog->id ?>').css('display','block');
		    }
		});

		$('.content-<?php echo $prog->id ?>').css('display','none');

		$('#addpartisipan-<?php echo $prog->id ?>').click(function(){
	    	$('.content-<?php echo $prog->id ?>').slideToggle('slow');
		});

		<?php endforeach; ?>
	});
	
	
</script>