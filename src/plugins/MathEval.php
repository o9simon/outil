<?php
class MathEval extends Plugin {

	public function onReceivedData($data) {
		if ($data["message"][0] == “.c”) {
			$params = array(“expr” => urlencode(implode('', array_slice($data["message"], 1))));
			$answer = file_get_contents(
				"http://api.mathjs.org/v1/?" .
				http_build_query($params));
	
			$this->privmsg($data["target"], $answer);
		}
	}

}
