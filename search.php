
<?php 

session_start();

$searchTerm= $_GET['searchTerm'] ?? false;

if($searchTerm){
$booksJson = file_get_contents('books.json');
$books= json_decode($booksJson, true);

    foreach ($books as $title => $book){
        if ($book['title'] != $searchTerm){
            unset($books[$title]);
        }
    }
}
$haveBooks = count($books) > 0;

$_SESSION['results'] = [

    'books' => $books,
    'haveBooks' => $haveBooks,
    'searchTerm' => $searchTerm,
];

header('Location: done.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Version A</title>
</head>
<body>

<h1>Book Search</h1>
<h2>Version B</h2>

<p>
You searched for <strong> <?= htmlentities($searchTerm) ?> </strong>
</p>
    
<?php if($haveBooks) : ?>
<h2>Results:</h2>
<?php foreach($books as $title => $book): ?>
<div>
    <?= $title; ?> by <?= $book['author'] ?>
    <img src="<?php echo $book['cover_url'] ?>" alt="Cover photo for <?= $title; ?>">

</div>

<?php endforeach?>
<?php else: ?>
<p>No results found</p>
<?php endif?>

<p>
<a href="foobooks.php">Search Again</a>
</p>

</body>
</html>