<?php
	if(is_dir("vendor")){
		require "vendor/autoload.php";
	} else{
		require "../vendor/autoload.php";
	}

	$dotenv = new Dotenv\Dotenv(__DIR__."/.."); $dotenv->load();
	$baseURL = getenv("PROJECT_URL");

	require "connection.php";

	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="<?= $baseURL; ?>">

		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Yoobee School of Design Library</title>

		<!-- Fonts -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato">
		<!-- FontAwesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<link rel="stylesheet" href="css/master.css">
	</head>
	<body>
        <header class="blog-header py-3 bg-info">
            <div class="container">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-3 pt-1">
                        <a class="text-light" href="#">Subscribe</a>
                    </div>

                    <div class="col-6 text-center">
                        <a class="blog-header-logo text-light" href="#">Yoobee School of Design Library</a>
                    </div>

                    <div class="col-3 d-flex justify-content-end align-items-center">
                        <a class="text-light" href="#">
                            <i class="fas fa-search mx-3"></i>
                        </a>

						<?php if(empty($_SESSION['username'])): ?>
							<a class="btn btn-sm btn-outline-light" href="./users/login.php">Login</a>
	                        <a class="btn btn-sm btn-outline-light" href="./users/signup.php">Sign up</a>
						<?php else: ?>
							<a class="btn btn-sm btn-outline-light" href="./users/logout.php"><?= $_SESSION['username'].": Logout"; ?></a>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </header>

        <div class="container">
            <div class="nav-scroller py-1 mb-2">
                <?php require_once "nav.php"; ?>
            </div>
        </div>
