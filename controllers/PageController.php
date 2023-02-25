<?php 

namespace Controllers;

class PageController {
	public function index() {
		return view('index');
	}

	public function about() {
		return view('about');
	}

	public function contact() {
		return view('contact');
	}

	public function missing() {
		return view('404');
	}
}
