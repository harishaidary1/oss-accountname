<?php

define("MULTIPART_BOUNDARY", "----WebKitFormBoundary7MA4YWxkTrZu0gW");

class sendRequest
{
	public function __construct()
	{

	}

	public function httpPost($append, $data, $content_type){

		$api_headers = array(
	        "Authorization: Basic ".$data[0],
	        "Accept: application/json; esl-api-version=11.33",
	        "Content-Type: ".$content_type,
	    );

		$data2 = '{"name":"'.$data[1].'"}';

		$curl = curl_init($append);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
	    curl_setopt($curl, CURLOPT_POSTFIELDS    , $data2);
	    curl_setopt($curl, CURLOPT_HTTPHEADER    , $api_headers);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_PROXY, '127.0.0.1:8888');
		curl_exec($curl);
		$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	    $response = curl_multi_getcontent($curl);
	    curl_close($curl);
	 
	    return $httpcode;
	}

	public function httpGet($append, $data, $content_type){

		$api_headers = array(
	        "Authorization: Basic ".$_SESSION['apiKey'],
	        "Accept: application/json; esl-api-version=11.33",
	        "Content-Type: ".$content_type,
	    );

		$curl = curl_init($_SESSION['apiUrl'].$append);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($curl, CURLOPT_HTTPHEADER    , $api_headers);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	    curl_exec($curl);
	    $response = curl_multi_getcontent($curl);
	    curl_close($curl);
	 
	    return $response;
	}


}

?>