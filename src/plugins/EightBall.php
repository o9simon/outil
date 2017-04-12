<?php
class EightBall extends Plugin {

	public function onReceivedData($data) {
		if ($data["message"][0] == ".8ball") {
			$answers = array(
				"signs point to yes",
				"answer will be clear after your next game of arcadei",
				"yes",
				"play more Arcadei for understanding",
				"reply hazy, try again",
				"without a doubt",
				"my sources say no",
				"as I see it, yes",
				"you may rely on it",
				"concentrate and ask again",
				"outlook not so good",
				"it is decidedly so",
				"better not tell you now",
				"very doubtful",
				"yes - definitely",
				"it is certain",
				"cannot predict now",
				"most likely",
				"ask again later",
				"my reply is no",
				"outlook good",
				"go play a game of Warsow Arcadei and get back to me",
				"No one cares. Go away",
				"don't count on it",
				"I drank too much last night. My head is fuzzy. Flip a coin instead");
			
			$text .= $data["source"] . ": ";
			
			if(count($data["message"])> 3) { 
				if ((strtolower ( $data["message"][1]) == "how") || (strtolower ( $data["message"][1]) == "why")) { 
					$text .= "I don\'t know. Google it.";
				} else {
					$text .= $answers[rand(0, count($answers)-1)] . ".";
				}
		     } else {
		     	$answers = array(
		     		'I need more information.',
		     		'Is that a real question?',
		     		'I do not understand what you are asking me.',
		     		'That is barely a question. Tell me more.',
		     		'I need a more challenging question.',
		     		"is that really relevant?");


				 $text .= $answers[rand(0, count($answers)-1)] . " ";
		     }
		    
			$this->privmsg($data["target"], $text);
		}
	}
}
