<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formformform</title>
</head>
<body>

	<form action="/index.php?page=submit" method="post">
		<input type="hidden" name="id" value="<?= $controller->getId() ?>">
		<div>
			<label for="title">Titre de l'article : </label>
		</div>
		<div>
			<input id="title" name="title" type="text" value="<?= $controller->getTitle() ?>" >
		</div>
		<div>
			<label for="author">Nom de l'auteur : </label>
		</div>
		<div>
			<input id="author" name="author" type="text"  value="<?= $controller->getAuthor() ?>">
		</div>
		<div>
			<label for="content">Contenu : </label>
		</div>
		<div>
			<textarea id="content" name="content" type="text"><?= $controller->getContent() ?></textarea>
		</div>
		<div>
			<input type="submit" value="Enregistrer">
		</div>
	</form>

</body>
</html>