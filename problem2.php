<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CSC-350 Homework 1-Problem 3</title>
	<link rel="stylesheet" href="grid.css">
</head>
<body>
<?php 
$SurveyName = $_POST['SurveyName'];
$NumberQuestions = $_POST['numberquestions'];
$serialized_questions = json_encode($filtered_Questions);

print "<form method='POST' action='values.php'>";
print "<input type='hidden' name='Questions' value='" . htmlspecialchars($serialized_questions, ENT_QUOTES) . "'>";
print "<input type='hidden' name='SurveyName' value='$SurveyName'>";
for($x=1; $x <= $NumberQuestions; $x++){
print "<p><br>Question $x Text:
	<input type='text' name='Question[]' size='30'> 
	Question $x Type:
	<select name='type[]'>
 	<option value='text'>Text</option>
  	<option value='multiplechoice'>Multiple Choice </option>
	</select></p>";
}
print "<input type='submit' value='Generate Form'>";
print "</form>";

?>
</body>
</html>