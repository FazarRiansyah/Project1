<?php
require_once('./line_class.php');
require_once('./unirest-php-master/src/Unirest.php');
$channelAccessToken = 'pbcRcnu4SUTlV4eRaUCxqw0qG51NSa5KmmoPQJop8e8VVnLuTWUG86PVDPFrUrV9tpDmU9ludYBWThoiPiDsOmnTATSLDgadFx5jE6EgvMoa5IIoH/zvX/LjRlLaWI9mZCrbnl433PkLNqkd+DIc7AdB04t89/1O/w1cDnyilFU='; //sesuaikan 
$channelSecret = '6a0d4e83e1d0198373f3de1d03866d06';//sesuaikan

if($message['type']=='text') {
      if ($command == '/menu') {

        $result = carousel($options);
        $balas = array(
          "type" => "template",
          "altText" => "this is a carousel template",
          "template" => array(
            "type" =>"carousel",
            "columns" => array(
              array(
                "thumbnailImageUrl" => "https://example.com/bot/images/item1.jpg",
                "imageBackgroundColor" => "#FFFFFF",
                "title" => "this is menu",
                "text" => "description",
                "actions" => array(
                  array(
                    "type" => "postback",
                    "label" => "Buy",
                    "data" => "action=buy&itemid=111",
                  ),
                  array(
                    "type" => "postback",
                    "label" => "Buy",
                    "data" => "action=buy&itemid=111",                  
                  )
                )
              )
            )
          )
        );
      }
    }



if (isset($balas)) {
    $result = json_encode($balas);
//$result = ob_get_clean();
    file_put_contents('./balasan.json', $result);
    $client->replyMessage($balas);
}
?>
