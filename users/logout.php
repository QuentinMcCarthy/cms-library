<?php
	require "../includes/head.php";

	if($_POST){
		unset($_SESSION["username"]);

		header("Refresh:2; URL=./users/logout.php");
	}
?>

<div class="container">
	<?php if(empty($_SESSION['username'])): ?>
		<?php header("Refresh:3; URL=../index.php"); ?>

		<div class="row mb-2">
			<div class="col">
				<div class="alert alert-success" role="alert">
					<h3><center>Successfully logged out</center></h3>
				</div>
			</div>
		</div>
	<?php else: ?>
		<div class="row mb-2">
			<div class="col">
				<h1>Are you sure you want to log out?</h1>
			</div>
		</div>

		<div class="row mb-2">
			<div class="col">
				<form class="d-inline-block" action="./users/logout.php" method="post">
					<input class="d-none" type="text" name="logout" value="true">
					<button type="submit" class="btn btn-outline-danger">Yes</button>
				</form>
				<a class="btn btn-outline-primary" href="./books/book.php?id=<?= $id; ?>">No</a>
			</div>
		</div>
	<?php endif ?>
</div>

<?php require "../includes/footer.php" ?>
