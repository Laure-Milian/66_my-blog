<?php
	
	Class PostController {

		private $title;
		private $author;
		private $content;

		public function __construct() {
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
			header('Location: /index.php');
			die();
		}

	}