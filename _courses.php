<?php
$data = file_get_contents("_courses.txt");
$rows = explode("\n", $data);
$courses = [];
foreach ($rows as $i => $row_item) {
	$row_item = trim($row_item);
	$row_item = str_replace("      ", "", $row_item);
	$row_item = str_replace(" )", ")", $row_item);
	if ($row_item === "") continue;
	$row_item = explode("\t", $row_item);
	if (count($row_item) == 0) continue;

	if (!isset($courses[$row_item[0]])) $courses[$row_item[0]] = [];

	// print_r($row_item);
	$courses[$row_item[0]][] = $row_item[2];
	continue;

	$str = "<li>";
	$str .= $row_item[4] . ": <b>" . $row_item[2] . "</b> (" . "نیم سال " . $row_item[1] . ")";// . " سال " . $row_item[0] . ")";
	$str .= "</li>\n";
	$courses[$row_item[0]][] = $str;
}


// sort $coourses by keys
ksort($courses);
// reverse
// $courses = array_reverse($courses, true);

// print_r($courses);
$names = [];
foreach ($courses as $year => $courses_in_year) {
	echo "<h3>سال " . $year . "</h3>\n";
	echo "<ul>\n";
	foreach ($courses_in_year as $course) {
		// remove everything after ()
		$course = preg_replace("/\s*\(.*/", "", $course);
		// remove , and .
		$course = str_replace(",", "", $course);
		$course = str_replace(".", "", $course);
		// remove spaces and tabs or lines
		$course = str_replace("  ", " ", $course);
		$course = str_replace("\t", " ", $course);
		$course = str_replace("\n", "", $course);
		$course = str_replace("‌", " ", $course);
		$course = str_replace("  ", " ", $course);
		$course = str_replace("  ", " ", $course);
		$course = str_replace("  ", " ", $course);
		$course = str_replace("  ", " ", $course);
		$course = str_replace("  ", " ", $course);
		$course = str_replace("    ", " ", $course);
		$course = str_replace("   ", " ", $course);
		$course = str_replace("  ", " ", $course);
		$course = str_replace("  ", " ", $course);
		$course = trim($course);
		$names[$course] = 0;

		// print "\t<li>";
		// echo $course;
		// print "</li>\n";
	}
	// echo "</ul>\n";
}

print implode(", ", array_keys($names));
