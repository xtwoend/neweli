<article id="registration" class="cf">
	<div class="left">
		<nav id="menu" class="cf">
			<ul>
				<li><?php echo lanchor('registers','public programs'); ?></li>
				<li class="active"><?php echo lanchor('registers/costum','custom programs'); ?></li>
			</ul>
		</nav>
		<div class="content">
			<h1>registration form</h1>
			<fieldset>
				<legend class="rounded">
					<a href="" class="first">step 1 &bull; personal &amp; company details</a>
					<a href="">step 2 &bull; programs &amp; participants</a>
				</legend>
			</fieldset>
			<h1>Personal Information</h1>
			<h5>Please fill in your personal details.</h5>
			<form method="post">
				<div>
					<div class="left">
						<div class="simple">
							<label for="firstname">First Name:</label>
							<input type="text" class="rounded" name="firstname" value="" required />
						</div>
						<div class="simple">
							<label for="lastname">Last Name:</label>
							<input type="text" name="lastname" class="rounded" value="" required/>
						</div>
						<div class="simple">
							<label for="gender">Gender:</label>
							<input type="radio" name="gender" value="Male"/> Male 
							<input type="radio" name="gender" value="Female"/> Female 
						</div>
						<div class="simple">
							<label for="jobtitle">Job Title:</label>
							<input type="text" name="jobtitle" class="rounded" value="" />
						</div>
						<div class="simple">
							<label for="email">Email:</label>
							<input type="email" name="email" class="rounded" value="" required/>
						</div>
						
						<div class="simple">
								<label for="com_name">Company Name:</label>
								<input type="text" name="com_name" class="rounded" value="" />
							</div>
							<!--
							<div class="simple">
								<label for="com_email">Email:</label>
								<input type="text" email="com_email" name="com_email" class="rounded" value="" />
							</div>
						-->
							<div class="simple">
								<label for="com_industry">Industry:</label>
								<input type="text" industry="com_industry" name="com_industry" class="rounded" value="" />
							</div>
							<div class="simple">
								<label for="com_address">Address:</label>
								<input type="text" address="com_address"  name="com_address" class="rounded" value="" />
							</div>
							<div class="simple">
								<label for="com_code">Postal Code:</label>
								<input type="text" code="com_code" class="rounded" name="com_code" value="" />
							</div>
							<div class="simple">
								<label for="com_city">City:</label>
								<input type="text" city="com_city"  name="com_city" class="rounded" value="" />
							</div>
							<div class="simple">
								<label for="com_country">Country:</label>
								<input type="text" country="com_country" name="com_country" class="rounded" value="" />
							</div>
							<div class="simple">
								<label for="com_phone">Phone:</label>
								<input type="text" phone="com_phone" name="com_phone" class="rounded" value="" />
							</div>
							<div class="simple">
								<label for="com_fax">Fax:</label>
								<input type="text" fax="com_fax" name="com_fax" class="rounded" value="" />
							</div>

					</div><!--left-->
					<div class="right">
						<div id="company">
							<h4>What can we do for you</h4>
							<div class="simple">
							<textarea cols="35" rows="35" name="note"></textarea>
							</div>
						</div>
					</div><!--right-->
					<div class="cf"></div>
				</div>
				<div class="submit cf">
					<span>Proceed to select programs and participant(s)</span>
					<input type="submit" class="rounded" name="submit" value="Next &rsaquo;" />
				</div>
			</form>
		</div><!--content-->
	</div><!--left-->
</article>

<script>
    $('#personal').click(function() {
	    var $this = $(this);
	    // $this will contain a reference to the checkbox   
	    if ($this.is(':checked')) {
	        $('#company').css('display','none');
	    } else {
	        $('#company').css('display','block');
	    }
	});
</script>