<?php
class Connection {

	public static $connection;

	public static function open($host, $port) {
		self::$connection = fsockopen($host, $port);
		stream_set_timeout(self::$connection, 300);
		stream_set_blocking(self::$connection, false);
	}

    public function send($data) {
		$data = $data."\r\n";
		fputs(self::$connection, $data);
	}

	public static function get($length = 256) {
		if (self::$connection) {		
			$buffed = explode(" ", trim(fgets(self::$connection, $length)));
			if ($buffed[0] == "PING") { self::send("PONG " . $buffed[1]); }
			return $buffed;
		}
	}

}