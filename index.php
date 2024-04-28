<?php
include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>
<body>
    <table>
        <tr>
            <?php
            if(!isset($_GET['order']) || !isset($_GET['type'])) {
                echo '<th><a href="?order=title&type=asc">Book name</a></th>';
                echo '<th><a href="?order=author_name&type=asc">Author name</a></th>';
                echo '<th><a href="?order=issue_date&type=asc">Date of issue</a></th>';
                echo '<th><a href="?order=number_pages&type=asc">Number of pages</a></th>';
                echo '<th><a href="?order=genre&type=asc">Genre</a></th>';
            }
            elseif($_GET['order'] == 'title' && $_GET['type'] == 'asc') {
                echo '<th><a href="?order=title&type=desc">Book name</a></th>';
                echo '<th><a href="?order=author_name&type=asc">Author name</a></th>';
                echo '<th><a href="?order=issue_date&type=asc">Date of issue</a></th>';
                echo '<th><a href="?order=number_pages&type=asc">Number of pages</a></th>';
                echo '<th><a href="?order=genre&type=asc">Genre</a></th>';
            }
            elseif($_GET['order'] == 'author_name' && $_GET['type'] == 'asc') {
                echo '<th><a href="?order=title&type=asc">Book name</a></th>';
                echo '<th><a href="?order=author_name&type=desc">Author name</a></th>';
                echo '<th><a href="?order=issue_date&type=asc">Date of issue</a></th>';
                echo '<th><a href="?order=number_pages&type=asc">Number of pages</a></th>';
                echo '<th><a href="?order=genre&type=asc">Genre</a></th>';
            }
            elseif($_GET['order'] == 'issue_date' && $_GET['type'] == 'asc') {
                echo '<th><a href="?order=title&type=asc">Book name</a></th>';
                echo '<th><a href="?order=author_name&type=asc">Author name</a></th>';
                echo '<th><a href="?order=issue_date&type=desc">Date of issue</a></th>';
                echo '<th><a href="?order=number_pages&type=asc">Number of pages</a></th>';
                echo '<th><a href="?order=genre&type=asc">Genre</a></th>';
            }
            elseif($_GET['order'] == 'number_pages' && $_GET['type'] == 'asc') {
                echo '<th><a href="?order=title&type=asc">Book name</a></th>';
                echo '<th><a href="?order=author_name&type=asc">Author name</a></th>';
                echo '<th><a href="?order=issue_date&type=asc">Date of issue</a></th>';
                echo '<th><a href="?order=number_pages&type=desc">Number of pages</a></th>';
                echo '<th><a href="?order=genre&type=asc">Genre</a></th>';
                
            }
            elseif($_GET['order'] == 'genre' && $_GET['type'] == 'asc') {
                echo '<th><a href="?order=title&type=asc">Book name</a></th>';
                echo '<th><a href="?order=author_name&type=asc">Author name</a></th>';
                echo '<th><a href="?order=issue_date&type=asc">Date of issue</a></th>';
                echo '<th><a href="?order=number_pages&type=asc">Number of pages</a></th>';
                echo '<th><a href="?order=genre&type=desc">Genre</a></th>';
            }
            else {
                echo '<th><a href="?order=title&type=asc">Book name</a></th>';
                echo '<th><a href="?order=author_name&type=asc">Author name</a></th>';
                echo '<th><a href="?order=issue_date&type=asc">Date of issue</a></th>';
                echo '<th><a href="?order=number_pages&type=asc">Number of pages</a></th>';
                echo '<th><a href="?order=genre&type=asc">Genre</a></th>';
            }
            ?>
        </tr>
        <?php
            if(!isset($_GET['order']) || !isset($_GET['type'])) {
                $query = 'SELECT * FROM books;';
            }else {
                if ($_GET['order'] == 'title' && $_GET['type'] == 'asc') {
                    $query = 'SELECT * FROM books ORDER BY name ASC;';
                }elseif ($_GET['order'] == 'title' && $_GET['type'] == 'desc') {
                    $query = 'SELECT * FROM books ORDER BY name DESC;';
                }elseif ($_GET['order'] == 'author_name' && $_GET['type'] == 'asc') {
                    $query = 'SELECT * FROM books ORDER BY author_name ASC;';
                }elseif ($_GET['order'] == 'author_name' && $_GET['type'] == 'desc') {
                    $query = 'SELECT * FROM books ORDER BY author_name DESC;';
                }elseif ($_GET['order'] == 'issue_date' && $_GET['type'] == 'asc') {
                    $query = 'SELECT * FROM books ORDER BY issue_date ASC;';
                }elseif ($_GET['order'] == 'issue_date' && $_GET['type'] == 'desc') {
                    $query = 'SELECT * FROM books ORDER BY issue_date DESC;';
                }elseif ($_GET['order'] == 'number_pages' && $_GET['type'] == 'asc') {
                    $query = 'SELECT * FROM books ORDER BY number_pages ASC;';
                }elseif ($_GET['order'] == 'number_pages' && $_GET['type'] == 'desc') {
                    $query = 'SELECT * FROM books ORDER BY number_pages DESC;';
                }elseif ($_GET['order'] == 'genre' && $_GET['type'] == 'asc') {
                    $query = 'SELECT * FROM books ORDER BY genre ASC;';
                }elseif ($_GET['order'] == 'genre' && $_GET['type'] == 'desc') {
                    $query = 'SELECT * FROM books ORDER BY genre DESC;';
                }
            }
            $statement = $connection->prepare($query);
            $statement->execute();
            $books = $statement->fetchAll();
            foreach ($books as $book) {
                echo '<tr>';
                echo '<td>' . $book['name'] . '</td>';
                echo '<td>' . $book['author_name'] . '</td>';
                echo '<td>' . $book['issue_date'] . '</td>';
                echo '<td>' . $book['number_pages'] . '</td>';
                echo '<td>' . $book['genre'] . '</td>';
                echo '</tr>';
            }
        ?>
    </table>

    <form action="insert.php" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
        <label for="author">Author</label>
        <input type="text" name="author" id="author" required>
        <label for="date">Date</label>
        <input type="date" name="date" id="date" required>
        <label for="pages">Pages</label>
        <input type="number" name="pages" id="pages" min="0" required>
        <label for="genre">genre</label>
        <select name="genre" id="genre" required>
            <option value="romantic">romantic</option>
            <option value="adventure">adventure</option>
            <option value="sci-fi">sci-fi</option>
            <option value="crime fiction">crime fiction</option>
            <option value="fantasy">fantasy</option>
        </select>
        <input type="submit" value="submit">
    </form>
</body>
</html>
