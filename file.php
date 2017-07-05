<?php
$f = "test.txt";

// File Size
$size = filesize($f);
echo $f . " is " . $size . " bytes.";

// File History
if (file_exists($f))  {
    $size = filesize($f);
    echo $f . " is " . $size . " bytes.";
}
else  {
    echo $f . " does not exist.";
}

// File History
$dateFormat = "D d M Y g:i A";

$atime = fileatime($f);
$mtime = filemtime($f);
$ctime = filectime($f);

echo $f . " was accessed on " . date($dateFormat, $atime) . ".<br>";
echo $f . " was modified on " . date($dateFormat, $mtime) . ".<br>";
echo $f . " was changed on " . date($dateFormat, $ctime) . ".";

// File Permissions
echo $f . (is_readable($f) ? " is" : " is not") . " readable.<br>";
echo $f . (is_writable($f) ? " is" : " is not") . " writeable.";

// File or Not
echo $f . (is_file($f) ? " is" : " is not") . " a file.<br>";
echo $f . (is_dir($f) ? " is" : " is not") . " a directory.";

// Reading Files
$f1 = fopen($f, "r");
$f1 = file_get_contents($f);
echo $f1;

// Writing Files
$f1 = fopen($f, "a");
$output = "banana";
fwrite($f1, $output);
$output = "cheese";
fwrite($f1, $output);
fclose($f1);

// Write to CSV
$file = "students.csv";
$f = fopen($file, "a");

$newFields = array(
    array('Ram', 'Prashad', 36, 'Good'),
    array('Shyam', 'Singh', 45, 'Excellent'),
    array('Hari', 'Bahadur', 34, 'Best'));

foreach($newFields as $fields)  {
    fputcsv($f, $fields);
}
fclose($f);

// Read From CSV
$file = "students.csv";
$f = fopen($file, "r");
while ($record = fgetcsv($f)) {
    foreach($record as $field) {
        echo $field . "<br>";
    }
}
fclose($f);
