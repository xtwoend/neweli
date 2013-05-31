
		<nav id="breadcrumb" class="cf">
			<div>
				<a href="#">Home</a> &raquo;
				<?php echo $page->title; ?>
			</div>
		</nav>

		<article id="contact" class="cf">
			<div class="left">
				<h1><?php echo $page->title; ?></h1>
				<p>
					<?php echo $this->lang->line('content'); ?>
				</p>
				<?php echo form_open('email/send'); ?>
					<div class="simple">
						<label for="name"><?php echo $this->lang->line('name'); ?></label>
						<input type="text" name="name" value="" />
					</div>
					<div class="simple">
						<label for="email"><?php echo $this->lang->line('email'); ?></label>
						<input type="email" name="email" value="" />
					</div>
					<div class="simple">
						<label for="subject"><?php echo $this->lang->line('subject'); ?></label>
						<select name="subject" id="contactemail">
							<option value="information.eli@pmbs.ac.id">Program Information</option>
							<option value="registration.eli@pmbs.ac.id">Program Registration</option>
							<option value="finance.eli@pmbs.ac.id">Finance</option>
							<option value="admin_iht@pmbs.ac.id">Administration Program</option>
							<option value="bmna.eli@pmbs.ac.id">Brand, Market, and Network Acceleration</option>
							<option value="aditans88@gmail.com">Test Email</option>
						</select>
					</div>
					<div class="simple">
						<label for="division"><?php echo $this->lang->line('division_email'); ?></label>
						<input type="email" name="division" value=""  />
					</div>
					<div class="simple">
						<label for="message"><?php echo $this->lang->line('message'); ?></label>
						<textarea name="message"></textarea>
					</div>
					<div class="simple">
						<label for="submit">&nbsp;</label>
						<input type="submit" name="submit" value="<?php echo $this->lang->line('submit'); ?>" />
					</div>
				</form>
			</div><!--left-->

			<div class="right">
				{{ HTML::image('themes/images/logo-right.jpg', '', array('height'=>'61', 'width'=>'220' )) }} 
				<h2><?php echo $this->lang->line('office'); ?></h2>
				<p>
					Prasetiya Mulya Campus, Building 2, #2203<br />
					Jl. R.A Kartini (TB. Simatupang)<br />
					Cilandak Barat,<br />
					Jakarta 12430<br />
				</p>

				<table>
					<tr>
						<td>Telp. </td>
						<td>(+62-21) 751 - 1126,</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>750 - 0463, 765 - 7257</td>
					</tr>
					<tr>
						<td>Fax. </td>
						<td>(+62-21) 751 - 1128,</td>
					</tr>
					<tr>
						<td>HP. </td>
						<td>(+62-21) 812 - 1983 - 1982,</td>
					</tr>
				</table>

				<p>
					{{ HTML::image('themes/images/map-icon.jpg', '', array('height'=>'23', 'width'=>'20' )) }} 
					<h2><?php echo $this->lang->line('location'); ?></h2>
				</p>
				<p>
					{{ HTML::image('themes/images/map.jpg', '', array('height'=>'208', 'width'=>'252', 'class'=>'cf block' )) }} 
					<a class="cright cf" href="#">See it on Google Maps &raquo;</a>
				</p>
				<p>
					{{ HTML::image('themes/images/map-qr.gif', '', array('height'=>'163', 'width'=>'139', 'class'=>'cf' )) }}
				</p>
			</div><!--right-->
		</article>

<script>
    $("#contactemail").change(function () {
          var str = $(this).val();
      		$('input[name=division]').val(str);	
        })
        .change();
</script>
