<?php

Class FormController {

	private $id;
	private $title = "";
	private $author = "";
	private $content = "";

	public function __construct() {
		if (isset($_GET['id'])) {
			$this->edit();
		} 
		elseif (isset($_GET['title'])){
			$this->correct();
		}
	}

	public function form() {
		$controller = $this;
		require BASEPATH . '/Views/form.php';
	}

	public function edit() {
		$this->id = $_GET['id'];
		$selectedPost = ORM::for_table('posts')->where('id', $this->id)->find_one();
		$this->title = $selectedPost->title;
		$this->author = $selectedPost->author;
		$this->content = $selectedPost->content;		
	}

	public function correct() {
		if ($_GET['title'] === "missing") {
			echo "<div> Merci de renseigner le titre de l'article </div>";
		} else {
			$this->title = htmlspecialchars($_GET['title']);
		}
		if ($_GET['author'] === "missing") {
			echo "<div> Merci de renseigner l'auteur de l'article </div>";
		} else {
			$this->author = htmlspecialchars($_GET['author']);
		}
		if ($_GET['content'] === "missing") {
			echo "<div> Merci de renseigner le contenu de l'article </div>";
		} else {
			$this->content = htmlspecialchars($_GET['content']);
		}
	}

	public function getId() {
		return $this->id;	
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



