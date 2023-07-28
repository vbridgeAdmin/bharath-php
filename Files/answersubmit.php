<?php
include "db.php";

$question_id=$_POST['question_id'];
$answer=$_POST['answer'];
$answerdby=$_POST['answerdby'];
$date=date("Y-m-D H:i:s");

$insertSql="insert into answers (question_id,answer,answerdby,answeredDate) values ('$question_id','$answer','$answerdby','$date')";
mysql_query($insertSql);

$retirnTable="<h3>Answers</h3><table border='1' cellpadding='0' cellspacing='0'><tr><th>Answer</th><th>Answered By</th>";
$selectSql="select answer_id,answer,answerdby,answeredDate from answers where question_id=".$question_id;
$r=mysql_query($selectSql);
while($v=mysql_fetch_object($r)){
	$retirnTable.="<tr>
		<td>".$v->answer."</td>
		<td>".$v->answerdby."</td>
	</tr>";
	
}
$retirnTable.="</table>";
echo $retirnTable;
?>