<?php
	require "../includes/head.php";

	$sql = "SELECT * FROM `authors` ORDER BY name ASC";

	$result = mysqli_query($dbc, $sql);

	if($result){
		$allAuthors = mysqli_fetch_all($result, MYSQLI_ASSOC);

		$aauthor = array(); $bauthor = array(); $cauthor = array();
		$dauthor = array(); $eauthor = array(); $fauthor = array();
		$gauthor = array(); $hauthor = array(); $iauthor = array();
		$jauthor = array(); $kauthor = array(); $lauthor = array();
		$mauthor = array(); $nauthor = array(); $oauthor = array();
		$pauthor = array(); $qauthor = array(); $rauthor = array();
		$sauthor = array(); $tauthor = array(); $uauthor = array();
		$vauthor = array(); $wauthor = array(); $xauthor = array();
		$yauthor = array(); $zauthor = array();

		foreach($allAuthors as $author){
			$letter = str_split(strtolower($author['name']));

			switch($letter[0]){
				case "a":
					array_push($aauthor, $author);

					break;
				case "b":
					array_push($bauthor, $author);

					break;
				case "c":
					array_push($cauthor, $author);

					break;
				case "d":
					array_push($dauthor, $author);

					break;
				case "e":
					array_push($eauthor, $author);

					break;
				case "f":
					array_push($fauthor, $author);

					break;
				case "g":
					array_push($gauthor, $author);

					break;
				case "h":
					array_push($hauthor, $author);

					break;
				case "i":
					array_push($iauthor, $author);

					break;
				case "j":
					array_push($jauthor, $author);

					break;
				case "k":
					array_push($kauthor, $author);

					break;
				case "l":
					array_push($lauthor, $author);

					break;
				case "m":
					array_push($mauthor, $author);

					break;
				case "n":
					array_push($nauthor, $author);

					break;
				case "o":
					array_push($oauthor, $author);

					break;
				case "p":
					array_push($pauthor, $author);

					break;
				case "q":
					array_push($qauthor, $author);

					break;
				case "r":
					array_push($rauthor, $author);

					break;
				case "s":
					array_push($sauthor, $author);

					break;
				case "t":
					array_push($tauthor, $author);

					break;
				case "u":
					array_push($uauthor, $author);

					break;
				case "v":
					array_push($vauthor, $author);

					break;
				case "w":
					array_push($wauthor, $author);

					break;
				case "x":
					array_push($xauthor, $author);

					break;
				case "y":
					array_push($yauthor, $author);

					break;
				default:
					array_push($zauthor, $author);

					break;
			}
		}
	} else {
		die("ERROR: Database SELECT failed");
	}
?>

<div class="container">
	<div class="row mb-2">
		<div class="col">
			<h1>All Authors</h1>
		</div>
	</div>

	<?php if(!empty($_SESSION['username'])): ?>
		<div class="row mb-2">
			<div class="col">
				<a class="btn btn-outline-primary" href="./books/add.php">Add new Author</a>
			</div>
		</div>
	<?php endif; ?>

	<div class="row">
		<div class="col-md-4">
			<?php if(!empty($aauthor)): ?>
				<ul>
					<h5>A</h5>
					<?php foreach($aauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($bauthor)): ?>
				<ul>
					<h5>B</h5>
					<?php foreach($bauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($cauthor)): ?>
				<ul>
					<h5>C</h5>
					<?php foreach($cauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($dauthor)): ?>
				<ul>
					<h5>D</h5>
					<?php foreach($dauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($eauthor)): ?>
				<ul>
					<h5>E</h5>
					<?php foreach($eauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($fauthor)): ?>
				<ul>
					<h5>F</h5>
					<?php foreach($fauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($gauthor)): ?>
				<ul>
					<h5>G</h5>
					<?php foreach($gauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($hauthor)): ?>
				<ul>
					<h5>H</h5>
					<?php foreach($hauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($iauthor)): ?>
				<ul>
					<h5>I</h5>
					<?php foreach($iauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>

		<div class="col-md-4">
			<?php if(!empty($jauthor)): ?>
				<ul>
					<h5>J</h5>
					<?php foreach($jauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($kauthor)): ?>
				<ul>
					<h5>K</h5>
					<?php foreach($kauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($lauthor)): ?>
				<ul>
					<h5>L</h5>
					<?php foreach($lauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($mauthor)): ?>
				<ul>
					<h5>M</h5>
					<?php foreach($mauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($nauthor)): ?>
				<ul>
					<h5>N</h5>
					<?php foreach($nauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($oauthor)): ?>
				<ul>
					<h5>O</h5>
					<?php foreach($oauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($pauthor)): ?>
				<ul>
					<h5>P</h5>
					<?php foreach($pauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($qauthor)): ?>
				<ul>
					<h5>Q</h5>
					<?php foreach($qauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($rauthor)): ?>
				<ul>
					<h5>R</h5>
					<?php foreach($rauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>

		<div class="col-md-4">
			<?php if(!empty($sauthor)): ?>
				<ul>
					<h5>S</h5>
					<?php foreach($sauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($tauthor)): ?>
				<ul>
					<h5>T</h5>
					<?php foreach($tauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($uauthor)): ?>
				<ul>
					<h5>U</h5>
					<?php foreach($uauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($vauthor)): ?>
				<ul>
					<h5>V</h5>
					<?php foreach($vauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($wauthor)): ?>
				<ul>
					<h5>W</h5>
					<?php foreach($wauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($xauthor)): ?>
				<ul>
					<h5>X</h5>
					<?php foreach($xauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($yauthor)): ?>
				<ul>
					<h5>Y</h5>
					<?php foreach($yauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if(!empty($zauthor)): ?>
				<ul>
					<h5>Z</h5>
					<?php foreach($zauthor as $author): ?>
						<li><?= $author['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php require "../includes/footer.php" ?>
