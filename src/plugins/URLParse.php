<?php
class URLParse extends Plugin {

	public function onReceivedData($data) {
		if (isset($data["message"]) && is_array($data["message"])) {
			foreach ($data["message"] as $token) {
				// https not handled, try with http
				if (strcmp(substr($token, 0, 5), "https") == 0) {
					$token = "http" . substr($token, 5);
				}
				
				// if the token starts with www, add http file handle
				if (strcmp(substr($token, 0, 4), "www.") == 0) {
					$token = "http://" . $token;
				}
				
				if (filter_var($token, FILTER_VALIDATE_URL)) {
					$file = file_get_contents($token);
					$dom = new DOMDocument;
					@$dom->loadHTML($file);
					
					// retrieve the title from the DOM node 
					// if assignment is valid then...
					if ($title = $dom->getElementsByTagName("title")) {
						// send a message to the channel
						for ($n = 0; $n < 1; $n++) {								
							$text = str_replace(array("\r", "\n"), '', $title->item($n)->nodeValue);
							$this->privmsg($data["target"], $text);
						}
					}
				}
			}
		}
	}
}
