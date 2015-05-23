<?php
namespace Mobius\Components\Http;

class RequestInfo
{
	static function requestPath() {
		return preg_split("/\/$/", preg_split("/\?/", $_SERVER['REQUEST_URI'])[0])[0];
	}

	static function requestMethod() {
		return $_SERVER['REQUEST_METHOD'];
	}
}