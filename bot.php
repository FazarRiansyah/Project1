<?php
require_once('./line_class.php');

$channelAccessToken = 'hD4ZQjdd31/VfsiJGRFGrdnFUYzfwoSPknLdg0i7rUyS217QpVg7uRuvWw5ce29utpDmU9ludYBWThoiPiDsOmnTATSLDgadFx5jE6EgvMqvqmj8Pv84o+CD4a4+roviJJWE8pPdssB6TPrd9ZQToQdB04t89/1O/w1cDnyilFU='; 
$channelSecret = '6a0d4e83e1d0198373f3de1d03866d06';
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId 	= $client->parseEvents()[0]['source']['userId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$text = $message['text'];

if($message['type']=='text'){

	if($text=='Keyword'){
		$balas = array(
			'replyToken' => $replyToken,
			'messages' => array(
				array(
					'title' => 'Keyword',
					'text' => 'Silahkan Dipilih',
					'thumbnail_image_url' => 'https://github.com/FazarRiansyah/Carousel/blob/master/Afrika.png'
					'actions' =>
					array( 
                    'type' => 'template',
					'altText' => 'ini altnya',
					'template' => array(
						'type' => 'confirm',
						'text' => 'Ini contoh button',
						'actions' => array(
							array(
								
								'type' => 'postback',
								'label' => 'Yes',
								'text' => 'yes',
							),
							array(
								'type' => 'postback',
								'label' => 'No',
								'text' => 'no',
							),
							array(
								'type' => 'postback',
								'label' => 'coba'
								'text' => 'coba'
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