<?php

class CommentController {

	private $id_post;
	private $author;
	private $comment;

	public function __construct() {
		$this->id_post = $_POST["id_post"];
		$this->checkIfEmpty();
	}

	public function checkIfEmpty() {
		if (empty($_POST["author"])) {
			$this->author = 'missing';
		} else {
			$this->author = htmlspecialchars($_POST["author"]);
		}
		if (empty($_POST["content"])) {
			$this->content = 'missing';
		} else {
			$this->content = htmlspecialchars($_POST["content"]);
		}
		$this->chooseRedirect();
	}

	public function chooseRedirect() {
		if ($this->author === 'missing' ||
			$this->content === 'missing') {
			$this->redirectForm();
		} else {
			$this->createComment();
		}
	}

	public function redirectForm() {
		header('Location: /index.php');
		die();
	}

	public function createComment() {
		$newComment = ORM::for_table('comments')->create();
		$newComment->post_id = $this->id_post;
		$newComment->author = $this->author;
		$newComment->content = $this->content;
		$date = new DateTime();
		$newComment->created_at = $date->format('Y-m-d H:i:s');
		$newComment->save();
		$this->redirectHome();
	}

	public function redirectHome() {
		header('Location: /index.php');
		die();
	}

}