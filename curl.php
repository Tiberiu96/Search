<?php

	if(isset($_POST["text"])){

		$text = $_POST['text'];
		$url = "https://m.olx.ro/api/v1/offers/?offset=0&limit=50&query=$text&description=true&currency=RON";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl,CURLOPT_URL,$url);

		$rezultat = curl_exec($curl);

		//preg_match_all("!https://frankfurt.apollo.olxcdn.com:443/v1/files/[^\s]*?-RO/image;s=644x461!",$rezultat,$matches);

		//"https://frankfurt.apollo.olxcdn.com:443/v1/files/d2dmk8evnnwx1-RO/image;s=644x461";
		//'https://frankfurt.apollo.olxcdn.com:443/v1/files/a07y1x195u8s-RO/image;s=644x461'

		echo json_encode($rezultat);

		

		}
	
	
?>