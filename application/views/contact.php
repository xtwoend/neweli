
		<nav id="breadcrumb" class="cf">
			<div>
				<a href="#">Home</a> &raquo;
				<?php echo $page->title; ?>
			</div>
		</nav>

		<article id="contact" class="cf">
			<div class="left">
				<h1>Contact Us</h1>
				<p>
					If you have any questions or comments, please do not hesitate to contact us:
				</p>
				<form class="cf" method="post" action="#">
					<div class="simple">
						<label for="name">Name:</label>
						<input type="text" name="name" value="" />
					</div>
					<div class="simple">
						<label for="email">Email:</label>
						<input type="email" name="email" value="" />
					</div>
					<div class="simple">
						<label for="subject">Subject:</label>
						<select name="subject" class="subject">
							<option value="option1">Option 1</option>
							<option value="option2">Option 2</option>
							<option value="option3">Option 3</option>
							<option value="option4">Option 4</option>
						</select>
					</div>
					<div class="simple">
						<label for="division">Division Email:</label>
						<input type="email" name="division" value="" />
					</div>
					<div class="simple">
						<label for="message">Message:</label>
						<textarea name="message"></textarea>
					</div>
					<div class="simple">
						<label for="submit">&nbsp;</label>
						<input type="submit" name="submit" value="submit form" />
					</div>
				</form>
			</div><!--left-->

			<div class="right">
				<div class="first">
					<img src="images/logo-grey.jpg" width="220" />
					<h3>office</h3>
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
				</div>

				<div class="second">
					<p>
						<img class="fleft" src="images/map-icon.jpg" height="23" width="20" />
						<h2>Our Location</h2>
					</p>
					<p>
						<img class="cf block" src="images/map.jpg" height="208" width="252" />
						<a class="cright cf" href="#">See it on Google Maps &raquo;</a>
					</p>
					<p>
						<img class="cf" src="images/map-qr.gif" height="163" width="139" />
					</p>
				</div>
			</div><!--right-->
		</article>
