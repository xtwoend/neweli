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

<h2> Note: </h2>
<?php echo $register->note; ?>
