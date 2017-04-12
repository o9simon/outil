<?php
class Invite extends Plugin {

	public function onReceivedData($data) {
		if ($data["code"] == "INVITE") {
			$this->join($data["message"][0]);
		}
	}
	
}
