#!/usr/bin/php

<?php
include("Connection.php");
include("Plugin.php");
include("PluginHandler.php");
include("Settings.php");

$buffed = array();
$plugins = new PluginHandler();

Connection::open(Settings::HOST, Settings::PORT);
Connection::send("USER " . Settings::NICK . " Bot " . Settings::NICK . " :" . Settings::NICK);
Connection::send("NICK " . Settings::NICK);

while (true) { 
	$buffed = Connection::get();

	if (count($buffed) >= 4) {
		$data["raw"] = implode(" ", $buffed);
		$data["source"] = substr($buffed[0], 1, strpos($buffed[0], "!") - 1);
		$data["code"] = $buffed[1];
		$data["target"] = $buffed[2];
		$data["message"] = array_slice($buffed, 3);
		$data["message"][0] = substr($data["message"][0], 1);
		if (strcmp($data["target"], Settings::NICK) == 0) {
			$data["target"] = $data["source"];
		}

		$plugins->onReceivedData($data);
	} else if (count($buffed) == 3) {
		$data["raw"] = implode(" ", $buffed);
		$data["source"] = substr($buffed[0], 1, strpos($buffed[0], "!") - 1);
		$data["code"] = $buffed[1];
		$data["target"] = $buffed[2];
		$data["message"] = "";

		$plugins->onReceivedData($data);
	}
}
