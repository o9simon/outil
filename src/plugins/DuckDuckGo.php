<?php
class DuckDuckGo extends Plugin {

	public function onReceivedData($data) {   
		if ($data["message"][0] == ".s") { // s for search
			$text = "";
			$params = array("q" => urlencode(implode('+', array_slice($data["message"], 1))), "format" => "json");
			$json = json_decode(file_get_contents(
				"http://api.duckduckgo.com/?" .
				http_build_query($params)));
			if (isset($json->RelatedTopics[0])) {
				$text .= $json->RelatedTopics[0]->Text;
				$text .= " - ";
				$text .= $json->RelatedTopics[0]->FirstURL;
			} else {
				$text .= $this->teal("No results");
			}

			$this->privmsg($data["target"], $text);
		}
	}

}
