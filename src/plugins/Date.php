<?php
class Date extends Plugin {

	public function onReceivedData($data) {
		if (($data["message"][0] == ".date") or ($data["message"][0] == "date")) {
			$text = $this->bold("Date: ");
			$text .= date("Y-m-d H:i:s");
			$this->privmsg($data["target"], $text);	
		}
	}

}
