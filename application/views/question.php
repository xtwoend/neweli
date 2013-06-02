
		<nav id="breadcrumb" class="cf">
			<div>
				<a href="#">Home</a> &raquo;
				Find your program
			</div>
		</nav>
			
<article id="question" class="cf">
	<div class="left">
		<h1>find your program</h1>
		<h4>Answer this questionnaire to find us recommends programs best suited for you</h4>
		<!--
		<div class="message cf">
			<div class="success rounded">
				<img src="themes/images/check.png">
				You are a fresh graduate
			</div>
			<div class="error rounded">
				<img src="themes/images/error.png">
				You education background are not in the business / management major
			</div>
		</div>-->
		<form method="post">
		<ul>
			<li>
				<div class="left">q:</div>
				<div class="right">
					<?php echo $question->question ?>
					<ul>
						<?php foreach($this->mquestionoptions->get('id,option', array('question_id'=>$question->id))  as $option): ?>
						
							<li><input type="radio" name="answer" value="<?php echo $option->id ?>"><?php echo $option->option; ?></li>						
						<?php endforeach; ?>
					</ul>
				</div>
			</li>
		</ul>
		<div class="submit cf">
					<span></span>
					<input type="submit" class="rounded" name="submit" value="Next &rsaquo;" />
				</div>
		</form>
		
	</div><!--left-->
</article>
