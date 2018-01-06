<?php
require_once('./line_class.php');

$channelAccessToken = 'SOB38ptux2H7fhjquEfu3dt9u/YVsfflpd+QiAQBN9OajzZgyOvchrHb/s+JNYcItpDmU9ludYBWThoiPiDsOmnTATSLDgadFx5jE6EgvMq7cb+A96cW05OyrFbVEOMk0Uex3ycd8V4gGM3wLJuwXgdB04t89/1O/w1cDnyilFU='; 
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


    if($text=='template'){
		$balas = array(
			'replyToken' => $replyToken,
			'messages' => array(
				array(
					'type' => 'template',
					'altText' => 'Example buttons template',
					'template' => array(
						array(
							'type' => 'carousel',
							'colums' => array(
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
											)
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