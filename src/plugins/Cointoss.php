<?php
class Cointoss extends Plugin {

	public function onReceivedData($data) { 
		if ($data["message"][0] == ".cointoss" ) {
			if (rand(1, 2) == 1) { 
				$this->privmsg($data["target"], "Heads");
			} else {
				$this->privmsg($data["target"], "Tails");
			}
		}
	}

}