<?php
abstract class Plugin {
	
	public abstract function onReceivedData($args);

	public function isEnabled() {
		return true;
	}

	public function jsonp_decode($jsonp, $assoc = false) { // PHP 5.3 adds depth as third parameter to json_decode
    	if ($jsonp[0] !== '[' && $jsonp[0] !== '{') { // we have JSONP
       		$jsonp = substr($jsonp, strpos($jsonp, '('));
    	}
    	return json_decode(trim($jsonp,'();'), $assoc);
	}

	
	protected final function auth($name, $pw) {
		Connection::send("AUTH ". $name . " " .$pw);
	}
		
	protected final function invite($nick, $channel) {
		Connection::send("INVITE " . $nick . " " . $channel);
	}
	
	protected final function join($channel) {
		Connection::send("JOIN " . $channel);
	}
	
	protected final function kick($channel, $nick) {
		Connection::send("KICK " . $channel . " " . $nick);
	}
	
	protected final function nick($nick) {
		Connection::send("NICK " . $nick);
	}

    protected final function privmsg($receiver, $message) {
		 Connection::send("PRIVMSG " . $receiver . " :" . $message);
	}

	protected final function notice($receiver, $message) {
		Connection::send("NOTICE " . $receiver . " :" . $message);
	}
	
	protected final function topic($channel, $topic) {
		Connection::send("TOPIC " . $channel . " " . $topic);
	}
	
	protected final function blue($text) {
		return "\x0302" . $text . "\x03";
	}
	
	protected final function green($text) {
		return "\x0303" . $text . "\x03";
	}
	
	protected final function red($text) {
		return "\x0304" . $text . "\x0f";
	}
	
	protected final function brown($text) {
		return "\x0305" . $text . "\x03";
	}
	
	protected final function purple($text) {
		return "\x0306" . $text . "\x03";
	}
	
	protected final function orange($text) {
		return "\x0307" . $text . "\x03";
	}
	
	protected final function yellow($text) {
		return "\x0308" . $text . "\x03";
	}
	
	protected final function lime($text) {
		return "\x0309" . $text . "\x03";
	}
	
	protected final function teal($text) {
		return "\x0310" . $text . "\x03";
	}
	
	protected final function aqua($text) {
		return "\x0311" . $text . "\x03";
	}
	
	protected final function sky($text) {
		return "\x0312" . $text . "\x03";
	}
	
	protected final function pink($text) {
		return "\x0313" . $text . "\x03";
	}
	
	protected final function grey($text) {
		return "\x0314" . $text . "\x03";
	}
	
	protected final function lightGrey($text) {
		return "\x0315" . $text . "\x03";
	}
	
	protected final function bold($text) {
		return "\x02" . $text . "\x0f";
	}
	
	protected final function underline($text) {
		return "\x1f" . $text . "\x0f";
	}

}
