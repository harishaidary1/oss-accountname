<?php
	require("sendRequest.php");

	$client = new sendRequest();

	$apiKey = trim($_POST['apiKey']);
	$apiUrl = trim($_POST['apiUrl']);
	$accountId = trim($_POST['accountId']);
	$accountName = trim($_POST['accountName']);

	$d = array($apiKey, $accountName);

	$response = $client->httpPost($apiUrl."/account/subaccounts/".$accountId, $d, "application/json");

	echo $response;

?>