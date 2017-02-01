<?php

Class FormController {

	private $title = "";
	private $author = "";
	private $content = "";

	public function __construct() {
		if (isset($_GET['id'])) {
			$this->edit();
		} 
		elseif ($_GET['title']){
			$this->correct();
		}
	}

	public function form() {
		$controller = $this;
		require BASEPATH . '/Views/form.php';
	}

	public function edit() {
		$id = $_GET['id'];
		$selectedPost = ORM::for_table('posts')->where('id', $id)->find_one();
		$this->title = $selectedPost->title;
		$this->author = $selectedPost->author;
		$this->content = $selectedPost->content;		
	}

	public function correct() {
		if ($_GET['title'] === "missing") {
			echo "<div> Merci de renseigner le titre de l'article </div>";
			$this->title = "";
		} else {
			$this->title = $_GET['title'];
		}
		if ($_GET['author'] === "missing") {
			echo "<div> Merci de renseigner l'auteur de l'article </div>";
			$this->author = "";
		} else {
			$this->author = $_GET['author'];
		}
		if ($_GET['content'] === "missing") {
			echo "<div> Merci de renseigner le contenu de l'article </div>";
			$this->content = "";
		} else {
			$this->content = $_GET['content'];
		}
	}

	public function getTitle() {
		return $this->title;	
	}

	public function getAuthor() {
		return $this->author;	
	}

	public function getContent() {
		return $this->content;	
	}
}



