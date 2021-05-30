<?php
       $url = "https://www.olx.ro/oferte/q-ford-focus-2/";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl,CURLOPT_URL,$url);

		$rezultat = curl_exec($curl);

		//echo $rezultat;

		preg_match_all("!<div class='offer-wrapper'!",$rezultat,$matches);

		//"https://frankfurt.apollo.olxcdn.com:443/v1/files/d2dmk8evnnwx1-RO/image;s=644x461";
		//'https://frankfurt.apollo.olxcdn.com:443/v1/files/a07y1x195u8s-RO/image;s=644x461'

		print_r($matches);