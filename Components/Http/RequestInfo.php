<?php
namespace Mobius\Components\Http;

/**
 * Provides request info as static
 *
 * @todo Deprecate this with request objects
 */
class RequestInfo
{
	static function requestPath() {
		return preg_split("/\/$/", preg_split("/\?/", $_SERVER['REQUEST_URI'])[0])[0];
	}

	static function requestMethod() {
		return $_SERVER['REQUEST_METHOD'];
	}
}
