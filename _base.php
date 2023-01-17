<?php
function read_excel($data) : array
{
    $lines = explode("\n", $data);
    // remove empty lines or lines with only spaces
    $lines = array_filter($lines, fn($line) => !empty(trim($line)));

    foreach ($lines as $i => $line_item) {
        $lines[$i] = explode("\t", $line_item);
    }

    return $lines;
}

$_conferences = file_get_contents("_conferences.txt");
$_journals = file_get_contents("_journals.txt");
$_books = file_get_contents("_books.txt");
