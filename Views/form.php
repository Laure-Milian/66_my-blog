<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formformform</title>
</head>
<body>

	<?php
	if (isset($_GET['title'])) {
		if ($_GET['title'] === "missing") {
			echo "<div> Merci de renseigner le titre de l'article </div>";
			$title = "";
		} else {
			$title = $_GET['title'];
		}
		if ($_GET['author'] === "missing") {
			echo "<div> Merci de renseigner l'auteur de l'article </div>";
			$author = "";
		} else {
			$author = $_GET['author'];
		}
		if ($_GET['content'] === "missing") {
			echo "<div> Merci de renseigner le contenu de l'article </div>";
			$content = "";
		} else {
			$content = $_GET['content'];
		}
	} else {
		$title="";
		$author="";
		$content="";
	}
	?>
	<div>
		<form action="/index.php?page=submit" method="post">
			<div>
				<label for="title">Titre de l'article : </label>
			</div>
			<div>
				<input id="title" name="title" type="text" value="<?= $title ?>" >
			</div>
			<div>
				<label for="author">Nom de l'auteur : </label>
			</div>
			<div>
				<input id="author" name="author" type="text"  value="<?= $author ?>">
			</div>
			<div>
				<label for="content">Contenu : </label>
			</div>
			<div>
				<textarea id="content" name="content" type="text"><?= $content ?></textarea>
			</div>
			<div>
				<input type="submit" value="Créer l'article">
			</div>
		</form>
	</div>



</body>
</html>