<?php
require_once('./line_class.php');

$channelAccessToken = ''; 
$channelSecret = '';
$client = new LINEBotTiny($jhB+26GgpPZYjuBLsC6SfDRa+T/9oY7PFjaa6jWKlIY7I+FXRWWQqbdiPfT6TUvetpDmU9ludYBWThoiPiDsOmnTATSLDgadFx5jE6EgvMoFM/xM0zGOv7hv5ixdulV3lDFoZmLlqChsvp0X56ebzwdB04t89/1O/w1cDnyilFU=, $6a0d4e83e1d0198373f3de1d03866d06);
$userId 	= $client->parseEvents()[0]['source']['userId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$text = $message['text'];

if($message['type']=='text'){

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
}
 
$result =  json_encode($balas);

file_put_contents('./balasan.json',$result);
$client->replyMessage($balas);
