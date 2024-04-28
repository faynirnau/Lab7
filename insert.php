<?php
include 'database.php';

$statement = $connection->prepare('INSERT INTO books (name, author_name, issue_date, number_pages, genre) VALUES (:title, :author, :date, :pages, :genre)');
$statement->bindParam(':title', $_POST['title']);
$statement->bindParam(':author', $_POST['author']);
$statement->bindParam(':date', $_POST['date']);
$statement->bindParam(':pages', $_POST['pages']);
$statement->bindParam(':genre', $_POST['genre']);
$statement->execute();
header('Location: index.php');
?>