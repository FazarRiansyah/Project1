<?php
require_once('./line_class.php');

$channelAccessToken = 'wS3Jb+LDQ719sRqRu4tkk5tgfaC96cxQ3iTWRvJ36lq1UuR0t9+l+W6MJ+TLcElLtpDmU9ludYBWThoiPiDsOmnTATSLDgadFx5jE6EgvMps80fVQwEsobjZRhDULbmxj3TgAbq+K61fO3GvmE6lNAdB04t89/1O/w1cDnyilFU='; 
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

	if($text=='template'){
		$balas = array(
			'replyToken' => $replyToken,
			'messages' => array(
				array(
					'type' => 'template',
					'altText' => 'Example buttons template',
					'template' => array(
						'type' => 'buttons',
						'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg',
						'title' => 'Example Menu',
						'text' => 'Please select',
						'actions' => array(
							array(
								'type' => 'postback',
								'label' => 'Postback example',
								'data' => 'action=buy&itemid=123'
							),
							array(
								'type' => 'message',
								'label' => 'Message example',
								'text' => 'Message example'
							),
							array(
								'type' => 'uri',
								'label' => 'Uri example',
								'uri' => 'https://github.com/GoneTone/line-example-bot-php'
							)
						)
					),
					array(
						'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg',
						'title' => 'Example Menu',
						'text' => 'Please select',
						'actions' => array(
							array(
								'type' => 'postback',
								'label' => 'Postback example',
								'data' => 'action=buy&itemid=123'
							),
							array(
								'type' => 'message',
								'label' => 'Message example',
								'text' => 'Message example'
							),
							array(
								'type' => 'uri',
								'label' => 'Uri example',
								'uri' => 'https://github.com/GoneTone/line-example-bot-php'
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