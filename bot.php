<?php
require_once('./line_class.php');

$channelAccessToken = 'DaIQwMYMtFJnFd0UZ896Ow7SwjfqCYFG4u+zkqE7bNzknPYEvAjyl2q+hhEEAddwtpDmU9ludYBWThoiPiDsOmnTATSLDgadFx5jE6EgvMonKKq4Eynm1XLn5b3lFvwk0AF8QAF+ssN+tC5MdfEvUgdB04t89/1O/w1cDnyilFU='; 
$channelSecret = '6a0d4e83e1d0198373f3de1d03866d06';
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId 	= $client->parseEvents()[0]['source']['userId'];
$groupId 	= $client->parseEvents()[0]['source']['groupId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$text = $message['text'];

if($message['type']=='text'){

	if($text=='audio'){
		$balas = array(
			'replyToken' => $replyToken,
			'messages' => array(
				array(
					'type' => 'audio',
					'originalContentUrl' => $audiofileurl,
					'duration' => $milliseconds
				)
			)
		);
	}

	if($text=='text'){
		$balas = array(
			'replyToken' => $replyToken,
			'messages' => array(
				array(
					'type' => 'text',
					'text' => 'wkwkkwkwkwk'
				)
			)
		);
	}

	if($text=='buttons'){
		$balas = array(
			'replyToken' => $replyToken,
			'messages' => array(
				array(
					'type' => 'template',
					'altText' => 'ini altnya',
					'template' => array(
						'type' => 'confirm',
						'text' => 'Ini contoh button',
						'actions' => array(
							array(
								'type' => 'message',
								'label' => 'Yes',
								'text' => 'yes',
							),
							array(
								'type' => 'message',
								'label' => 'No',
								'text' => 'no',
							)
						)
					)
				)
			)
		);
	}

	if($text=='imagemap'){
		$balas = array(
			'replyToken' => $replyToken,
			'messages' => array(
				array(
					'type' => 'imagemap',
					'baseUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example',
					'altText' => 'Example imagemap',
					'baseSize' => array(
						'height' => 1040,
						'width' => 1040
					),
					'actions' => array(
						array(
							'type' => 'uri',
							'linkUri' => 'https://github.com/GoneTone/line-example-bot-php',
							'area' => array(
								'x' => 0,
								'y' => 0,
								'width' => 520,
								'height' => 1040
							)
						),
						array(
							'type' => 'message',
							'text' => 'Hello',
							'area' => array(
								'x' => 520,
								'y' => 0,
								'width' => 520,
								'height' => 1040
							)
						)
					)
				)
			)
		);
	}


	if($text=='lokasi'){
		$balas = array(
			'replyToken' => $replyToken,
			'messages' => array(
				array(
					'type' => 'location',
					'title' => 'Example location',
					'address' => '台灣高雄市三民區大昌一路 98 號 (立志中學)',
					'latitude' => 22.653742,
					'longitude' => 120.32652400000006
				)
			)
		);
	}

	if($text=='stiker'){
		$balas = array(
			'replyToken' => $replyToken,
			'messages' => array(
				array(
					'type' => 'sticker',
					'packageId' => 1,
					'stickerId' => 1
				)
			)
		);
	}

	if($text=='help'){
		$balas = array(
			'replyToken' => $replyToken,
			'messages' => array(
				array(
					'type' => 'template',
					'altText' => 'Example buttons template',
					'template' => array(
						'type' => 'buttons',
						'thumbnailImageUrl' => 'https://raw.githubusercontent.com/FazarRiansyah/Project1/master/20171217_161633-1.jpg',
						'title' => 'Keyword',
						'text' => 'Silakan pilih menu dibawah',
						'actions' => array(
							array(
								'type' => 'uri',
								'label' => 'LINK',
								'data' => 'https://ensiklopedia.xyz'
							),
							array(
								'type' => 'postback',
								'label' => 'CEO & Founder',
								'text' => 'Rian : line.me/ti/p/~priandana13\nIrdy : line.me/ti/p/~bjackss'
							),
							array(
								'type' => 'postback',
								'label' => 'TOP UP',
								'uri' => 'Cek NOTE & Bisa langsung menghubungi Admin'
							)
						)
					)
				)
			)
		);
	}

	if($text=='video'){
		$balas = array(
			'replyToken' => $replyToken,
			'messages' => array(
				array(
					'type' => 'video',
					'originalContentUrl' => 'https://api.reh.tw/line/bot/example/assets/videos/example.mp4',
					'previewImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg'
				)
			)
		);
	}
}
$client->replyMessage($balas);
