<?php

class Controller {
	public function model($model){
		require_once 'vc_app/model/'.$model . '.php';
	}
}
