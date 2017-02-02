<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blogblogblog</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.6/semantic.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class='container'>
		<h1>Mon blog</h1>
		<?php foreach ($posts as $post) : ?>
			<div>
				<h2><?= $post->title; ?></h2>
				<div><?= $post->content; ?></div>
				<div><?= $post->author; ?>, le <?= $post->created_at; ?></div>
				<a href="index.php?page=form&id=<?= $post->id ?>">
					<button>Editer</button>
				</a>
			</div>
			<div>
				<form action="/index.php?page=comment" method="post">
					<div>
						<input type="hidden" id="id_post" name="id_post" value="<?= $post->id; ?>">
					</div>
					<div>
						<label for="author">Author</label>
					</div>
					<div>
						<input type="text" id="author" name="author">
					</div>
					<div>
						<label for="content">Content</label>
					</div>
					<div>
						<textarea name="content" id="content" cols="30" rows="5"></textarea>
					</div>
					<div>
						<input type="submit" value="Commenter">
					</div>
				</form>
			</div>
		<?php endforeach; ?>
		<div>
			<a href="/index.php?page=form">
				<button class="ui orange button">Ajouter un article</button>
			</a>
		</div>
	</div>
</body>
</html>