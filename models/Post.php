<?php 

namespace Models;

class Post {
	public $title;
	public $body;

	public function __construct($title, $body) {
		$this->title = $title;
		$this->body = $body;
	}
}
