<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blogblogblog</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.6/semantic.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="ui centered grid">
		<div class="ten wide column">

			<div>
				<form action="/index.php?page=form" method="post">
					<input type="submit" class="ui fluid green button" value="Créer un nouvel article"></input>
				</form>
			</div>

			<?php foreach ($posts as $post) : ?>
				<div class="container_post">
					<div class="ui items">
						<div class="item">
							<div class="content">
								<div class="header"><?= $post->title; ?></div>
								<div class="meta">
									<span><?= $post->author; ?></span>
								</div>
								<div class="description">
									<p><?= $post->content; ?></p>
								</div>
								<div class="extra">
									<?= $post->created_at; ?>
								</div>
							</div>
						</div>
					</div>	
					<form action="index.php?page=form&id=<?= $post->id ?>" method="post">
						<input class="ui fluid button" type="submit" value="Editer"></input>
					</form>
				</div>

				<div class="ui comments">
					<h3 class="ui dividing header">Comments</h3>
					<?php 
					$comments = ORM::for_table('comments')->where('post_id', $post->id)->find_many(); ?>
					<div class="comment">
						<?php foreach ($comments as $comment) :?>
							<div class="content">
								<a class="author"><?=$comment->author;?></a>
								<div class="metadata">
									<span class="date"><?=$comment->created_at;?></span>
								</div>
								<div class="text">
									<?= $comment->content; ?>
								</div>
							</div>
						<?php endforeach; ?>
						<form class="ui reply form" action="/index.php?page=comment" method="post">
							<div>
								<input type="hidden" id="id_post" name="id_post" value="<?= $post->id; ?>">
							</div>
							<div>
								<label for="author">Author</label>
							</div>
							<div class="field">
								<input type="text" id="author" name="author">
							</div>
							<div>
								<label for="content">Content</label>
							</div>
							<div class="field" >
								<textarea name="content" id="content"></textarea>
							</div>
							<div>
								<input class="ui fluid blue button" type="submit" value="Commenter">
							</div>
						</form>
					</div>
				</div>
				<?php endforeach; ?>

		</div>


	</body>
	</html>