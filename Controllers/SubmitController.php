<?php
	
	Class SubmitController {

		private $title;
		private $author;
		private $content;

		public function __construct() {
			$this->checkIfEmpty();
		}

		public function checkIfEmpty() {
			if (empty($_POST["title"])) {
				$this->title = 'missing';
			} else {
				$this->title = $_POST["title"];
			}
			if (empty($_POST["author"])) {
				$this->author = 'missing';
			} else {
				$this->author = $_POST["author"];
			}
			if (empty($_POST["content"])) {
				$this->content = 'missing';
			} else {
				$this->content = $_POST["content"];
			}
			$this->chooseRedirect();
		}

		public function chooseRedirect() {
			if ($this->title === 'missing' ||
				$this->author === 'missing' ||
				$this->content === 'missing') {
				$this->redirectForm();
			} else {
				$this->redirectHome();
			}
		}

		public function redirectForm() {
			header(
				'Location: /index.php?page=form' . 
				'&title=' . $this->title . 
				'&author=' . $this->author . 
				'&content=' . $this->content
				);
			die();
		}

		public function redirectHome() {
			$newPost = ORM::for_table('posts')->create();
			$newPost->title = $this->title;
			$newPost->author = $this->author;
			$newPost->content = $this->content;
			$date = new DateTime();
			$newPost->created_at = $date->format('Y-m-d H:i:s');
			$newPost->save();
			header('Location: /index.php');
			die();
		}

	}