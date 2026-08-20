<?php
/*
 * Pure-PHP pthreads shim (single-process mode).
 * Loaded by PocketMine.php when the pthreads extension is not available.
 * Implements the subset of the pthreads v3 API used by PocketMine-MP 1.6dev.
 * No real threads are created: "threads" run in the main process.
 */

if(isset($GLOBALS["pocketmine_pthreads_shim"])){
	return;
}
$GLOBALS["pocketmine_pthreads_shim"] = true;

define("PTHREADS_INHERIT_ALL", 0x111111);
define("PTHREADS_INHERIT_NONE", 0x000000);
define("PTHREADS_INHERIT_INI", 0x000001);
define("PTHREADS_INHERIT_CONSTANTS", 0x000010);
define("PTHREADS_INHERIT_CLASSES", 0x000100);
define("PTHREADS_INHERIT_FUNCTIONS", 0x001000);
define("PTHREADS_INHERIT_INCLUDES", 0x010000);
define("PTHREADS_INHERIT_COMMENTS", 0x100000);
define("PTHREADS_ALLOW_HEADERS", 0x1000000);

interface Collectable{
	public function isGarbage();
	public function setGarbage();
}

class Threaded implements \ArrayAccess, \Countable, \IteratorAggregate{
	private $__store = [];
	private $__threadId = 0;

	public function offsetExists($offset) : bool{
		return isset($this->__store[$offset]);
	}

	public function offsetGet($offset){
		return isset($this->__store[$offset]) ? $this->__store[$offset] : null;
	}

	public function offsetSet($offset, $value) : void{
		if($offset === null){
			$this->__store[] = $value;
		}else{
			$this->__store[$offset] = $value;
		}
	}

	public function offsetUnset($offset) : void{
		unset($this->__store[$offset]);
	}

	public function count() : int{
		return count($this->__store);
	}

	public function getIterator() : \Traversable{
		return new \ArrayIterator($this->__store);
	}

	public function shift(){
		return array_shift($this->__store);
	}

	public function unshift($value){
		array_unshift($this->__store, $value);

		return count($this->__store);
	}

	public function chunk($size, $preserve = false){
		return array_splice($this->__store, 0, (int) $size);
	}

	public function pop(){
		return array_pop($this->__store);
	}

	public function push($value){
		$this->__store[] = $value;

		return count($this->__store);
	}

	public function merge($data){
		foreach($data as $k => $v){
			$this->__store[$k] = $v;
		}

		return count($this->__store);
	}

	public function toArray(){
		return $this->__store;
	}

	public function synchronized(\Closure $function, ...$args){
		return \call_user_func_array($function, $args);
	}

	public function wait($timeout = 0){
		if($timeout > 0){
			\usleep((int) $timeout);
		}

		return true;
	}

	public function notify(){
		return true;
	}

	public function notifyOne(){
		return true;
	}

	public function getThreadId(){
		return $this->__threadId;
	}

	public function getCreatorId(){
		return 0;
	}

	public function isRunning(){
		return false;
	}

	public function isTerminated(){
		return false;
	}

	public function isJoined(){
		return false;
	}

	public function isWaiting(){
		return false;
	}

	public function join(){
		return true;
	}

	public function kill(){
		return null;
	}

	public function start(int $options = PTHREADS_INHERIT_ALL){
		return true;
	}

	public function run(){
		return true;
	}

	public function setGarbage(){
	}

	public function isGarbage(){
		return false;
	}

	public static function getCurrentThreadId(){
		return 0;
	}

	public static function getCurrentThread(){
		return null;
	}
}

class Thread extends Threaded{
	public function getThreadName(){
		return (new \ReflectionClass($this))->getShortName();
	}
}

class Worker extends Thread{
	public function stack(\Threaded $work){
		$this[] = $work;

		return count($this);
	}

	public function unstack(){
		return $this->shift();
	}

	public function shutdown(){
		return true;
	}

	public function getStacked(){
		return count($this);
	}

	public function isWorking(){
		return false;
	}
}

class Volatile extends Threaded{
}