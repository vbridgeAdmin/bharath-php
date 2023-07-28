<?php
include "db.php";

$question=$_POST['question'];
$raisedBy=$_POST['raisedBy'];
$date=date("Y-m-D H:i:s");
$insertSql="insert into questions (question,raisedby,raisedDate) values ('$question','$raisedBy','$date')";
mysql_query($insertSql);

$retirnTable="<h3>Questions</h3><table border='1' border='1' cellpadding='0' cellspacing='0'><tr><th>Question</th><th>Raised By</th><th>Action</th>";
$selectSql="select question_id,question,raisedby,raisedDate from questions";
$r=mysql_query($selectSql);
while($v=mysql_fetch_object($r)){
	$retirnTable.="<tr>
		<td>".$v->question."</td>
		<td>".$v->raisedby."</td>
		<td><a onclick='displayAnswerForm(".$v->question_id.")'>Answers</a></td>
	</tr>";
	
}
$retirnTable.="</table>";
echo $retirnTable;
?>