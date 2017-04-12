<?php
class AutoJoiner extends Plugin {
	
	public function onReceivedData($data) {
		if ($data["code"] == 376) {
			$this->join("#outildev");
		}
	}

}
