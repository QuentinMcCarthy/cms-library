<?php
	require "../includes/head.php";

	$id = $_GET['id'];

	$sql = "SELECT * FROM `books` WHERE id = $id";

	$result = mysqli_query($dbc, $sql);

	if($result && mysqli_affected_rows($dbc) > 0){
		$book = mysqli_fetch_array($result, MYSQLI_ASSOC);

		$originalImage = $book['image_name'];
	} else if($result && mysqli_affected_rows($dbc) == 0){
		// die("Error 404");

		header("Location: ../errors/404.php");
	} else {
		die("ERROR: Database SELECT failed");
	}

	if($_POST){

		$sql = "DELETE FROM `books` WHERE id = $id";

		$result = mysqli_query($dbc, $sql);

		if($result && mysqli_affected_rows($dbc) > 0){
			unlink("../img/uploads/$originalImage");
			unlink("../img/uploads/thumbs/small/$originalImage");
			unlink("../img/uploads/thumbs/medium/$originalImage");

			header("Location: ../index.php");
		} else{
			die("ERROR: Database DELETE failed");
		}
	}
?>

<div class="container">
	<div class="row mb-2">
		<div class="col">
			<h1>Are you sure you want to delete <em><?= $book['book_name']; ?>?</em></h1>
		</div>
	</div>

	<div class="row mb-2">
		<div class="col">
			<form class="d-inline-block" action="./books/confirm_delete.php?id=<?= $id; ?>" method="post">
				<input type="hidden" name="delete" value="true">
				<button type="submit" class="btn btn-outline-danger">Yes</button>
			</form>
			<a class="btn btn-outline-primary" href="./books/book.php?id=<?= $id; ?>">No</a>
		</div>
	</div>
</div>

<?php require "../includes/footer.php" ?>
