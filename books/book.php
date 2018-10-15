<?php
	require "../includes/head.php";

	$id = $_GET['id'];

	$sql = "SELECT * FROM `books` WHERE id = $id";

	$result = mysqli_query($dbc, $sql);

	if($result && mysqli_affected_rows($dbc) > 0){
		$book = mysqli_fetch_array($result, MYSQLI_ASSOC);
	} else if($result && mysqli_affected_rows($dbc) == 0){
		die("Error 404");
	} else {
		die("ERROR: Database SELECT failed");
	}
?>

<div class="container">
	<div class="row mb-2">
		<div class="col">
			<h1><?= $book['book_name']; ?></h1>
		</div>
	</div>

	<div class="row mb-2">
		<div class="col">
			<a class="btn btn-outline-primary" href="./books/update.php?id=<?= $id ?>">Edit</a>
			<a class="btn btn-outline-danger" href="./books/confirm_delete.php?id=<?= $id ?>">Delete</a>
		</div>
	</div>

	<div class="row mb-2">
		<div class="col-xs-12 col-sm-4 align-self-center">
			<img class="img-fluid" src="./img/uploads/thumbs/<?= $book['image_name']; ?>" alt="Book cover">
		</div>

        <div class="col-xs-12 col-sm-8 align-self-center">
            <h3><?= $book['book_name']; ?></h3>
            <h4><?= $book['author']; ?></h4>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-12">
            <p><?= $book['description']; ?></p>
        </div>
    </div>
</div>

<?php require "../includes/footer.php"; ?>
