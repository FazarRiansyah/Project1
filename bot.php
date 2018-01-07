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
	} else if ($command == '/keyword') {
	
	        $balas = array(
							'replyToken' => $replyToken,
							'messages' => array(
								array (
										  'type' => 'template',
										  'altText' => 'Silahkan Pilih Keyword Yang Anda Inginkan',
										  'template' => 
										  array (
										    'type' => 'carousel',
										    'columns' => 
										    array (
										      0 => 
										      array (
										        'thumbnailImageUrl' => 'https://raw.githubusercontent.com/farz404/zFzBot/master/zFz.png',
										        'title' => 'Keyword 1',
										        'text' => 'Silahkan Dipilih',
										        'actions' => 
										        array (
										          0 => 
										          array (
										            'type' => 'postback',
										            'label' => 'Cari Anime',
										            'data' => 'action=add&itemid=111',
													'text' => 'Ketik /anime [Judul Anime]'
										          ),
										          1 => 
										          array (
										            'type' => 'postback',
										            'label' => 'Cari Sinopsis Anime',
										            'data' => 'action=add&itemid=111',
													'text' => 'Ketik /anime-syn [Judul Anime]'
												  ),
										          2 => 
										          array (
										            'type' => 'postback',
										            'label' => 'Cari Youtube',
										            'data' => 'action=add&itemid=111',
													'text' => 'Ketik /yt [URL Video Youtube]'
										          ),
										        ),
										      ),
										      1 => 
										      array (
										        'thumbnailImageUrl' => 'https://raw.githubusercontent.com/farz404/zFzBot/master/zFz.png',
										        'title' => 'Keyword 2',
										        'text' => 'Silahkan Dipilih',
										        'actions' => 
										        array (
										          0 => 
										          array (
										            'type' => 'postback',
										            'label' => 'Cari Film',
										            'data' => 'action=add&itemid=111',
													'text' => 'Ketik /film [Judul Film]'
										          ),
										          1 => 
										          array (
													'type' => 'postback',
													'label' => 'Cari Sinopsis Film',
													'data' => 'action=add&itemid=111',
													'text' => 'Ketik /film-syn [Judul Film]'
										          ),
										          2 => 
										          array (
													'type' => 'postback',
													'label' => 'Cari Gambar',
													'data' => 'action=add&itemid=111',
													'text' => 'Ketik /gambar [Kata Kunci]'
										          ),
										        ),
										      ),
										      2 => 
										      array (
										        'thumbnailImageUrl' => 'https://raw.githubusercontent.com/farz404/zFzBot/master/zFz.png',
										        'title' => 'Keyword 3',
										        'text' => 'Silahkan Dipilih',
										        'actions' => 
										        array (
										          0 => 
										          array (
										            'type' => 'postback',
										            'label' => 'Jadwal Shalat',
										            'data' => 'action=add&itemid=111',
													'text' => 'Ketik /shalat [Lokasi]'
										          ),
										          1 => 
										          array (
													'type' => 'postback',
													'label' => 'Cari Sinopsis Film',
													'data' => 'action=add&itemid=111',
													'text' => 'Ketik /cuaca [Lokasi]'
										          ),
										          2 => 
										          array (
													'type' => 'postback',
													'label' => 'KOSONG',
													'data' => 'action=add&itemid=111',
													'text' => 'KOSONG'
										          ),
										        ),
										      ),											  
										    ),
										  ),
										)					
			 
        )
    );
	}
$client->replyMessage($balas);