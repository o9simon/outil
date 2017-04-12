<?php
/**
 * Outputs the received data to the terminal/console
 */
class Output extends Plugin {

	public function onReceivedData($data) {
		$time = localtime($timestamp = time(), true);
		$formattedTime =  "<" . $time['tm_hour'] . ":" . $time['tm_min'] . ":" . $time['tm_sec'] . ">";

		print($formattedTime . " " . $data["raw"] . "\n");
	}

}
