<?php
//legge un file, lo trasforma in una stringa
$books = file_get_contents('data.json');//adesso $filecontent è una stringa di testo!!!
echo $books;
header('Content-Type: application/json');