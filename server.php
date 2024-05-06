<?php
//legge un file, lo trasforma in una stringa
$books = file_get_contents('data.json');//adesso $filecontent è una stringa di testo!!!
echo $books;
header('Content-Type: application/json');
if (isset($_POST['title'])) {
    var_dump($_POST);
    //converte json in un array php
    $booksPhp = json_decode($books, true);
    //creo un array associativo per item inserito dall'utente
    $bookSold = [
        'title' => $_POST['title'],
        'genre' => $_POST['genre'],
        'img' => $_POST['img'],
        'id' => $_POST['id'],
        'soldout' => $_POST['soldout'],
    ];
    $booksPhp[] = $bookSold;
    $books = json_encode($booksPhp, JSON_PRETTY_PRINT);//trasformiamo il php in json
    file_put_contents('data.json', $books);
}