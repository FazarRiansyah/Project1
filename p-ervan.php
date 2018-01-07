<?php
require_once('./line_class.php');

$channelAccessToken = '6xBeAXLMX7RTyPNzYuKilFTk48dnAEUckMNDDu5xPA8O6dBr1P1o03jPL5x+dyU/tpDmU9ludYBWThoiPiDsOmnTATSLDgadFx5jE6EgvMrAhTfRwErxa/tscW17WU0tzUKtoRZq+30lwAAiknTPjAdB04t89/1O/w1cDnyilFU='; 
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
	if($text=='carousel'){
		$balas = array(
			'replyToken' => $replyToken,
			'messages' => array(
				array(
					'type' => 'template',
					'altText' => 'altnya',
					'template' => array(
						array(
							'type' => 'carousel',
							'columns' => array(
								array(
									'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg',
									'title' => 'ini menu',
									'text' => 'deskripsi',
									'actions' => array(
										array(
											'type' => 'uri',
											'label' => 'PING',
											'text' => 'https://www.facebook.com/'
										)
									)
								),
								array(
									'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg',
									'title' => 'ini menu',
									'text' => 'deskripsi',
									'actions' => array(
										array(
											'type' => 'message',
											'label' => 'PING',
											'text' => 'PONG'
										)
									)
								)
							)
						)
					)
				)
			)
		);
	}
}
$client->replyMessage($balas);
