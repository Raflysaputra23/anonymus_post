<?php 


class Controller {
	public function view($views, $data = []) {
		require_once 'app/views/'.$views.'.php';
	}

	public function model($models) {
		require_once 'app/models/'.$models.'.php';
		return new $models;
	}
}