<?php 

namespace Controllers;
use Core\App;
use Models\Post;

class PostController {
	public function index() {
		$posts = App::get('database')->getAll('posts');
		
		$posts_array = array_map(function($post) {
			$title = $post->title;
			$body = $post->body;

			return new Post($title, $body);
		}, $posts);

		return view('posts', ['posts' => $posts_array]);
	}

	public function post() {
		$data = [
			'title' => $_POST['title'],
			'body' => $_POST['body'],
		];

		$result = App::get('database')->create('posts', $data);

		header('Location:' . BASE_URL . 'posts');
	}

	public function update($id) {
		$data = [
			'body' => $_POST['body']
		];

		$result = App::get('database')->update('posts', $id, $data);
	}
}
