<?php
namespace Mobius\Components;

class Model
{
	private $data = [];

	/**
	 * Set the value of a given key
	 *
	 * @param string $key The specified key to set
	 * @param any $value The value to set
	 */
	public function set($key, $value) {
		$this->data[$key] = $value;
	}

	/**
	 * Check for the existence of a given key
	 *
	 * @param string $key The specified key to set
	 * @return bool Whether or not the key exists
	 */
	public function has($key) {
		if (isset($this->data[$key])) {
			return true;
		}
		return false;
	}

	/**
	 * Get the value of a given key
	 *
	 * @param string $key The specified key to set
	 * @return any The value stored under $key
	 */
	public function get($key) {
		if ($this->has($key)) {
			return $this->data[$key];
		}
		return NULL;
	}

	/**
	 * Get all data in model
	 *
	 * @return array An associative array of $this->data
	 */
	public function getAll() {
		return $this->data;
	}
}
