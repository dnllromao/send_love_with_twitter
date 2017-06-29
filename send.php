<?php

	if(!isset($_GET['to'])) {
		return; // or exit; whish one?
	}

	if(!empty($_GET['to'])) {
		// @ sanitize
		$to = $_GET['to'];

		$statues = $connection->post("statuses/update", ["status" => "With ❤ to ".$to." #sendlovewith"]);
	} else {
		echo 'Please rewrite the name of the lucky one.';
	}