<?php
$mysql = new mysqli('localhost', 'root', '123', 'students');



$order = 'SELECT * FROM students';
$result = $mysql->query($order);
 $columnsAmount = $mysql->field_count;
while ($row = $result->fetch_array(1)) {
	$rows[] = $row;
 }
 foreach ($rows as $student) {
	$averageMark = ($student['OSISP'] + $student['TK'] + $student['OOP'])/($columnsAmount - 1);
	$marks = array(
		'OSISP' => $student['OSISP'],
		'TK' => $student['TK'],
		'OOP' => $student['OOP']
	);
	$minMark = 11;
	$maxMark = 0;

 foreach ($marks as $mark) {
	if ($mark >= $maxMark) 
		$maxMark = $mark;
	if ($mark <= $minMark) 
		$minMark = $mark;
 }
 echo '<h2>', $student["surname"],'</h2>';
 echo ' Average mark ', number_format( $averageMark, 2, '.', '' ),'<br>';
 echo '<a>Max mark ', $maxMark, ' ';
 echo '</a><br>';
 echo '<a>Min mark ', $minMark, ' ';
 echo '</a><br>';
 }

?>
