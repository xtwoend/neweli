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
		<form method="post" action="{{URL::current()}}">
		<ul>
			<li>
				<div class="left">q:</div>
				<div class="right">
					{{$question->question}}
					<ul>
						@foreach(Questionoption::where_question_id($question->id)->get() as $option)
							<li><input type="radio" name="answer" value="{{$option->id}}">{{$option->option}}</li>						
						@endforeach
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
