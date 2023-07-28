<?php
include "db.php";
?>
<link rel="stylesheet" type="text/css" href="css/styles.css"/>
<script src="js/jquery.js"></script>
<script type="text/javascript">
function submitQuestion(){
	var question=$("#question").val();
	var raisedBy=$("#raisedby").val();
	if(question!="" && raisedBy!=""){
		$.ajax({
						type: "POST",
						url: 'questionsubmit.php',
						data: {question: question, raisedBy: raisedBy},
						success: function (data) {
							$("#questionsTable").html(data);
							
					}
                });
	}else{
		alert("Question and Raised By are mandatory");
	}
}
function displayAnswerForm(question_id){
	$("#answersForm").show();
	$("#question_id").val(question_id);
}
function submitAnswer(){
	var answer=$("#answer").val();
	var answerdby=$("#answerdby").val();
	var question_id=$("#question_id").val();
	if(answer!="" && answerdby!=""){
		$.ajax({
						type: "POST",
						url: 'answersubmit.php',
						data: {question_id: question_id, answer: answer,answerdby: answerdby},
						success: function (data) {
							$("#answerTable").html(data);
							
					}
                });
	}else{
		alert("Question and Raised By are mandatory");
	}
}
</script>
<form>
<p class="label">Question?</p> <input type="text" name="question" id="question" class="textfield" />
<p class="label">Raised By</p> <input type="text" name="raisedby" id="raisedby" class="textfield"/>
<p><input type="button" name="submit" id="submit" value="Submit" onclick="submitQuestion()" /></p>
</form>


<div id="questionsTable"></div>

<div id="answersForm" style="display:none;">
<form>
<p class="label">Answer?</p> <input type="text" name="answer" id="answer" class="textfield"/>
<p class="label">Answered By</p> <input type="text" name="answerdby" id="answerdby" class="textfield"/>
<input type="hidden" name="question_id" id="question_id" />
<p><input type="button" name="submit" id="submit" value="Submit" onclick="submitAnswer()" /></p>
</form>
</div>


<div id="answerTable"></div>