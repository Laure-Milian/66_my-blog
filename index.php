<?php 
define('BASEPATH', __DIR__);
require BASEPATH . '/vendor/autoload.php';
ORM::configure('mysql:host=localhost;dbname=my_blog');
ORM::configure('username', 'root');
ORM::configure('password', 'simplonco');

$posts = ORM::for_table('posts')->find_many();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blogblogblog</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class='container'>
		<h1>Mon blog</h1>
		<?php foreach ($posts as $post) : ?>
			<div>
				<h2><?= $post->title ?></h2>
				<div><?= $post->content ?></div>
				<div><?= $post->author ?>, le <?= $post->created_at ?></div>
			</div>
		<?php endforeach; ?>
	</div>
</body>
</html>