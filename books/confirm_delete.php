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

	if($_POST){
		$sql = "SELECT * FROM `books` ORDER BY `id` DESC LIMIT 1";

		$result = mysqli_query($dbc, $sql);

		if($result){
			$latest = mysqli_fetch_array($result, MYSQLI_ASSOC); $latest = $latest['id'];

			$sql = "DELETE FROM `books` WHERE id = $id";

			$result = mysqli_query($dbc, $sql);

			if($result && mysqli_affected_rows($dbc) > 0){
				header("Location: ../index.php");
			} else{
				die("ERROR: Database DELETE failed");
			}
		} else {
			die("ERROR: Database SELECT failed");
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
				<input class="d-none" type="text" name="delete" value="true">
				<button type="submit" class="btn btn-outline-danger">Yes</button>
			</form>
			<a class="btn btn-outline-primary" href="./books/book.php?id=<?= $id; ?>">No</a>
		</div>
	</div>
</div>

<?php require "../includes/footer.php" ?>
