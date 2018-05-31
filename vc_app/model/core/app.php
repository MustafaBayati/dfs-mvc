<?php
class App {
	protected $controller = 'home_page';
	protected $method = 'login';
	protected $params = array();

	public function __construct(){
		$URL = $this->paramsUrl();

		if(file_exists('vc_app/controllers/' .$URL[0] . '.php')){
			$this->controller = $URL[0];
			unset($URL[0]);
		}
		require_once 'vc_app/controllers/'.$this->controller . '.php';
		$this->controller = new $this->controller ;
		if(isset($URL[1])){
			if(method_exists($this->controller,$URL[1])){
				$this->method = $URL[1];
				unset($URL[1]);
			}
		}
		$this -> params = $URL ? array_values($URL) : array();
		call_user_func_array(array($this->controller, $this->method), $this->params);
	}

	public function paramsUrl(){
		if(isset($_GET['url'])){
			return $URL = explode('/',rtrim($_GET['url'],'/'));
		}
	}
}
