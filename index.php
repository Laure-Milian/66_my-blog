<?php 
define('BASEPATH', __DIR__);
require BASEPATH . '/Controllers/PostController.php';

require BASEPATH . '/vendor/autoload.php';
ORM::configure('mysql:host=localhost;dbname=my_blog');
ORM::configure('username', 'root');
ORM::configure('password', 'simplonco');

$posts = ORM::for_table('posts')->find_many();


if (!isset($_GET["page"])) {
	require BASEPATH . '/Views/index.php';
} 
elseif ($_GET["page"] === "form") {
	require BASEPATH . '/Views/form.php';
}
elseif ($_GET["page"] === "submit") {
	(new PostController());
}
?>