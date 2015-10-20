<?php
spl_autoload_register(function ($class) {
	$pathArr = split('\\', $class);
	$pathArrLen = count($pathArr);
	$path = __DIR__;
	for ($i = ($pathArrLen === 1 ? 0 : 1); $i < $pathArrLen; $i++) {
		$path .= '/' . $pathArr[$i];
	}
	$path .= '.php';

	if (is_file($path)) {
		include $path;
	}
});
