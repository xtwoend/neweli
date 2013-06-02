<h2>Informasi Personal </h2>

Nama : <?php echo $register->first_name; ?> <?php echo $register->last_name; ?> <br>
Gender : <?php echo $register->gander; ?> <br>
Pekerjaan : <?php echo $register->job_title; ?> <br>
Phone : <?php echo $register->mobile_phone; ?> <br>
Email : <?php echo $register->email; ?> <br>

<br>
<h2>Informasi Perusahaan</h2>
Nama Perusahaan : <?php echo $register->name_com; ?> <br>
Email perusahaan : <?php echo $register->email_com; ?> <br>
Industry : <?php echo $register->indrustry_com; ?> <br>
Alamat : <?php echo $register->address_com; ?> <br>
telp / fax : <?php echo $register->phone_com; ?> / <?php echo $register->fax_com; ?><br>



<br>
<br>
<h2>Program yang di pilih:</h2>

<?php foreach ($programs as $program): ?>
	<h4><?php $programreg =  $this->mprograms->findprog(array('id'=> $program->program_id ,'program_lang.lang'=> $this->lang->mci_current())); echo $programreg->program_name; ?></h4>
	<?php  echo $this->mperiode_courses->find(array('id'=>$program->periode_id))->periode ?><br>

	<h2>Partisipan Program:</h2>
	<?php

		$participants = $this->mregisters->findregisters(array('participant_of' => $register->id ,'program_id'=> $program->program_id), 'registrations.id,registrations.first_name,last_name,job_title,mobile_phone,email,program_id');
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
							</tr>
							<?php $no++; ?>
							<?php endforeach; ?>
						</table>

						<br>
						<h3>Total Participants :  <?php echo $no -1 ; ?></h3>
						<div style="float: right;">SubTotal Fee : <?php echo number_format($subtotal, 2, ',', ' ') ?> IDR</div><br>
						<div style="float: right;">Group Discount : 0 IDR</div>
						<br>
						<hr>
						<div style="float: right; font-weight: bold;">Total Fee : <?php echo number_format($subtotal, 2, ',', ' ') ?> IDR</div>
						<?php endif; ?>
						<br>


<?php endforeach; ?>






