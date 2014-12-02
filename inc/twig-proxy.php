<?php
class TwigProxy {
	public function __call($function, $arguments) {
		if (!function_exists($function)) {
			throw new Exception("{$function} not exists.");
			return NULL;
		}
		return call_user_func($function, $arguments);
	}
}