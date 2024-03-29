<?php

require_once('connection.php');

$search = $_GET['q'];

$stmt = $pdo->prepare('SELECT * FROM books WHERE is_deleted=0 and title LIKE :q');
$stmt->execute(['q' => "%".$search."%"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bookstore</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav style="display: flex; justify-content: space-between;">
        <a href="add_author.php">Lisa autor</a>

        <form action="index.php" method="get">
            <input type="text" name="q" placeholder="Otsing">
            <input type="submit" value="Otsi">
        </form>
    </nav>

    <main>
        <ul>
        <?php while ($book = $stmt->fetch()) { ?>
            <li>
                <a href="book.php?id=<?=$book['id'];?>"><?=$book['title'];?></a>
            </li>
        <?php } ?>
        </ul>
    </main>

</body>
</html>
