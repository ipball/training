<?php
//$arr = array();
$person = array(
    'iPhone',
    'Hand',
    'Mackbook Air',
    'Face'
);
echo $person[3];

$student = array(
    'firstname' => 'Mee',
    'lasttname' => 'Deejai',
    'age' => 19,
    'school'=> null
);
echo '<hr/>';
print_r($student);

echo '<hr/>';
echo $student['firstname'];

echo '<hr/>';

$students = array();
$students[] = array(
    'firstname' => 'Mee',
    'lasttname' => 'Deejai',
    'age' => 19,
    'school'=> null
);

$students[] = array(
    'firstname' => 'Ball',
    'lasttname' => 'Deejai',
    'age' => 25,
    'school'=> 'Test school'
);

print_r($students);