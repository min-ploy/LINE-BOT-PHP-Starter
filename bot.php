<?php


$access_token = 'X0Q8gObz71IhgU25g93t/uwaDe8ExgB9p2bs4pY2iZ0hiRffj0kDiIia+Dj5AlMB3NII5Nx4CpoD1KdlI0Pjld0HOXLOSzH16/DU0ocf9YMAq/7JeY8nqIMxAo1+Rm8qtU9v8SkXhP6DU3vxpc9pHAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			switch ($text) {
				case 'หวัดดี' :
					$messages = [
						'type' => 'text',
						'text' => 'ดีจ้า'
					];
					// Make a POST Request to Messaging API to reply to sender
					$url = 'https://api.line.me/v2/bot/message/reply';
					$data = [
						'replyToken' => $replyToken,
						'messages' => [$messages]
					];
					break;
					
				case 'สบายดีมั้ย' :
					$messages = [
						'type' => 'text',
						'text' => 'สบายดี'
					];
					// Make a POST Request to Messaging API to reply to sender
					$url = 'https://api.line.me/v2/bot/message/reply';
					$data = [
						'replyToken' => $replyToken,
						'messages' => [$messages]
					];
					break;
									
				case 'วันนี้' :
					$messages = [
						'type' => 'text',
						'text' => 'วันดีปีใหม่'
					];
					$mess = [
						'type' => 'text',
						'text' => 'อย่าลืมไปลอยกระทงนะ'
					];
					// Make a POST Request to Messaging API to reply to sender
					$url = 'https://api.line.me/v2/bot/message/reply';
					$data = [
						'replyToken' => $replyToken,
						'messages' => [$messages, $mess]
					];
					break;
									
				case 'อากาศดี' :
					$messages = [
						'type' => 'text',
						'text' => 'เหมาะแก่การนอนมากๆเลย ~'
					];
					// Make a POST Request to Messaging API to reply to sender
					$url = 'https://api.line.me/v2/bot/message/reply';
					$data = [
						'replyToken' => $replyToken,
						'messages' => [$messages]
					];
					break;
					
				case 'หิวข้าว' :
					$messages = [
						'type' => 'text',
						'text' => 'ลองค้นหาร้านอร่อยๆดูสิ'
					];
					$mess = [
						'type' => 'text',
						'text' => 'โดยพิมพ์คำว่า ร้านอาหาร ดูนะ'
					];
					// Make a POST Request to Messaging API to reply to sender
					$url = 'https://api.line.me/v2/bot/message/reply';
					$data = [
						'replyToken' => $replyToken,
						'messages' => [$messages, $mess]					
					];
					break;
				
				case 'น่ารัก' :
					$messages = [
						'type' => 'text',
						'text' => 'ขอบคุณที่ชมค้าบบบ'
					];
					// Make a POST Request to Messaging API to reply to sender
					$url = 'https://api.line.me/v2/bot/message/reply';
					$data = [
						'replyToken' => $replyToken,
						'messages' => [$messages]
					];
					break;
				
				case 'ฝนจะตกมั้ย' :
					$messages = [
						'type' => 'text',
						'text' => 'ลองมองไปที่ท้องฟ้าสิ'
					];
					$mess = [
						'type' => 'text',
						'text' => 'แต่มีร่มสำรองหรือเปล่า'
					];
					$me = [
						'type' => 'text',
						'text' => 'ถ้าไม่มีลองหาที่ซื้อร่ม โดยพิมพ์คำว่า ห้างสรรพสินค้า ดูสิ'
					];
					// Make a POST Request to Messaging API to reply to sender
					$url = 'https://api.line.me/v2/bot/message/reply';
					$data = [
						'replyToken' => $replyToken,
						'messages' => [$messages, $mess, $me]
					];
					break;
				
				case 'บอทชื่ออะไร' :
					$messages = [
						'type' => 'text',
						'text' => 'เราชื่อ บอทเวย์'
					];
					// Make a POST Request to Messaging API to reply to sender
					$url = 'https://api.line.me/v2/bot/message/reply';
					$data = [
						'replyToken' => $replyToken,
						'messages' => [$messages]
					];
					break;
				
				case 'แนะนำเพลงหน่อย' :
					$messages = [
						'type' => 'text',
						'text' => 'ฉันแพ้ทางคนอย่างเธอ ~'
					];
					// Make a POST Request to Messaging API to reply to sender
					$url = 'https://api.line.me/v2/bot/message/reply';
					$data = [
						'replyToken' => $replyToken,
						'messages' => [$messages]
					];
					break;
				
				case 'ทำอะไรดี' :
					$messages = [
						'type' => 'text',
						'text' => 'ไปไหว้พระกันมั้ย'
					];
					$mess = [
						'type' => 'text',
						'text' => 'ลองค้นหาวัดใกล้ๆ'
					];
					$me = [
						'type' => 'text',
						'text' => 'โดยพิมพ์คำว่า วัด ดูสิ'
					];
					// Make a POST Request to Messaging API to reply to sender
					$url = 'https://api.line.me/v2/bot/message/reply';
					$data = [
						'replyToken' => $replyToken,
						'messages' => [$messages, $mess, $me]
					];
					break;
					
				case 'ร้านอาหาร': 
					$url = "https://maps.googleapis.com/maps/api/place/radarsearch/json?language=th&location=13.825699,100.516154&radius=500&type=restaurant&key=AIzaSyBEA0UcZj9m-fYvwGTx0aoITGJxyWLdGm4";
					$curl_handle = curl_init();
					curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt( $curl_handle, CURLOPT_URL, $url );
					curl_setopt( $curl_handle, CURLOPT_RETURNTRANSFER, true);
					$text = curl_exec( $curl_handle );
					curl_close( $curl_handle ); 
					$obj = json_decode($text, TRUE);
					for ($x = 0; $x <= 10; $x++) {
						$mes = $obj['results'][$x]['place_id']; 
						$url = "https://maps.googleapis.com/maps/api/place/details/json?placeid=$mes&key=AIzaSyBEA0UcZj9m-fYvwGTx0aoITGJxyWLdGm4";
						$curl_handle = curl_init();
						curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt( $curl_handle, CURLOPT_URL, $url );
						curl_setopt( $curl_handle, CURLOPT_RETURNTRANSFER, true);
						$text = curl_exec( $curl_handle );
						curl_close( $curl_handle ); 
						$object = json_decode($text, TRUE);
						$name = $object['result']['name']; 
						$number = $object['result']['formatted_phone_number'];
						$address = $object['result']['formatted_address'];
						$addname .= "->>".$name."\n".$number."\n".$address."\n\n";
					}            
				    // Build message to reply back
					$messages = [
						'type' => 'text',
						'text' => "$addname"
					];
					// Make a POST Request to Messaging API to reply to sender
					$url = 'https://api.line.me/v2/bot/message/reply';
					$data = [
						'replyToken' => $replyToken,
						'messages' => [$messages]
				    	];	   
					break;
									
				default :
					$messages = [
						'type' => 'text',
						'text' => 'กรุณาสอนบอท'
					];
					// Make a POST Request to Messaging API to reply to sender
					$url = 'https://api.line.me/v2/bot/message/reply';
					$data = [
						'replyToken' => $replyToken,
						'messages' => [$messages]
					];
					break;					
			}
		}
		if ($event['type'] == 'message' && $event['message']['type'] == 'sticker'){
			// Get text sent
			$text = $event['message']['sticker'];
			// Get replyToken
	       		$replyToken = $event['replyToken'];
			$random = rand(407,430);
			$messages = [
				'type' => 'sticker',
                         	'packageId' => '1',
                         	'stickerId' => $random
			];
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages]
			];
		}
		$post = json_encode($data);
		$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			
		$result = curl_exec($ch);
		curl_close($ch);
		url_close($ch);
		echo $result . "\r\n";
	}
}
echo "OK";
