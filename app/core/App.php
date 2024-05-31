<?php 


class App {
	private $class = 'Home',
			$method = 'index',
			$params = [];

	public function __construct() {
		$url = ($this->parseURL() == NULL) ? ['Home'] : $this->parseURL() ;
		$dirName = 'app/controllers/';

		if (file_exists($dirName.ucfirst($url[0]).'.php')) {
			$this->class = ucfirst($url[0]);
			unset($url[0]);
		}

		require_once $dirName.$this->class.'.php';
		$this->class = new $this->class;

		if (isset($url[1])) {
			if (method_exists($this->class, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		if (isset($url)) {
			$this->params = array_values($url);
		}

		call_user_func_array([$this->class, $this->method], $this->params);


	}



	public function parseURL() {
		if (isset($_GET['url'])) {
			$url = $_GET['url'];
			$url = rtrim($url, '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
}