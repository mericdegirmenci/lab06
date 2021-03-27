<?php 
require 'logic.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Version C</title>
</head>
<body>

<h1>Book Search</h1>
<h2>(Version C)</h2>

<form  method="GET" action="search.php">

<label>
<input type="text" name="searchTerm" value="Hamlet">
</label>

<input type="submit" value="Search">

</form>

<?php if(isset($result)): ?>

<p>
You search for <strong><?= htmlentities($result['searchTerm']) ?></strong>
</p>

<?php if ($result['haveBooks']): ?> 
    <h2>Results:</h2>
    <?php foreach($results['books'] as $title => $book): ?>
        <div class="book">
        <?= $title; ?> by <?= $book['author'] ?>
        <img src="<?php echo $book['cover_url'] ?>" alt="Cover photo for <?= $title; ?>">
        </div>

<?php endforeach?>
<?php else: ?>
<p>No results found</p>
<?php endif?>
<?php endif ?>
</body>
</html>