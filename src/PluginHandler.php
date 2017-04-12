<?php
class PluginHandler {

	public $plugins = array();
	
	public function PluginHandler() {
		// load plugins in the plugins folder
		foreach (glob("./plugins/*.php") as $file) {
			include($file);

			$class = str_replace("./plugins/", "", $file);
			$class = str_replace(".php", "", $class);
			
			array_push($this->plugins, new $class());
		}
	}
	
	public function onReceivedData($data) {
		foreach ($this->plugins as $plugin) {			
			if ($plugin->isEnabled()) {
		 		 $plugin->onReceivedData($data);
			}	
		}
	}

}
