<?php


$access_token = 'jlMoaDCsiy7kbz0JIpj/aFDVojwOc6V+jHZweM8HW4eaFzWVKTUF0UyNToc8RYq93NII5Nx4CpoD1KdlI0Pjld0HOXLOSzH16/DU0ocf9YNr8nRRt1CL8dClQqmQb98sdSdjOulzdZ+UGQfYfNgn0wdB04t89/1O/w1cDnyilFU=';

$jsonString = file_get_contents('php://input');
error_log($jsonString);
$jsonObj = json_decode($jsonString);

$message = $jsonObj->{"events"}[0]->{"message"};
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};

if ($message->{"text"} == 'ร้านอาหาร') {
	$url = "https://maps.googleapis.com/maps/api/place/radarsearch/json?language=th&location=13.825699,100.516154&radius=500&type=restaurant&key=AIzaSyBEA0UcZj9m-fYvwGTx0aoITGJxyWLdGm4";
	$curl_handle = curl_init();
	curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt( $curl_handle, CURLOPT_URL, $url );
	curl_setopt( $curl_handle, CURLOPT_RETURNTRANSFER, true);
	$text = curl_exec( $curl_handle );
	curl_close( $curl_handle ); 
	$obj = json_decode($text, TRUE);
	$name = array();
	$number = array();
	$address = array();
	$urll = array();
	for ($x = 0; $x < 5; $x++) {
		$mes = $obj['results'][$x]['place_id']; 
		$url = "https://maps.googleapis.com/maps/api/place/details/json?placeid=$mes&key=AIzaSyBEA0UcZj9m-fYvwGTx0aoITGJxyWLdGm4";
		$curl_handle = curl_init();
		curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt( $curl_handle, CURLOPT_URL, $url );
		curl_setopt( $curl_handle, CURLOPT_RETURNTRANSFER, true);
		$text = curl_exec( $curl_handle );
		curl_close( $curl_handle ); 
		$object = json_decode($text, TRUE);
		array_push($name, $object['result']['name']);
		array_push($number, $object['result']['formatted_phone_number']);
		array_push($address, $object['result']['vicinity']);
		array_push($urll, $object['result']['urll']);
		//$addname .= "->>".$name."\n".$number."\n".$address."\n\n";
	}           
	$messageData = [
		'type' => 'template',
		'altText' => 'carousel',
		'template' => [
			'type' => 'carousel',
			'columns' => [
				[
					'title' => "$name[0]",
					'text' => "$address[0]",
					'actions' => [
						[
							'type' => 'postback',
							'label' => "$number[0]",
							'data' => 'เบอร์โทร'
						],[
							'type' => 'uri',
							'label' => 'Google Map',
                                			'uri' => "$urll[0]"
						]
					]
                    		],[
                        		'title' => "$name[1]",
                        		'text' => "$address[1]",
                        		'actions' => [
                            			[
							'type' => 'postback',
							'label' => 'ไม่มีเบอร์ติดต่อ',
							'data' => 'เบอร์โทร'
						],[
                                			'type' => 'uri',
                                			'label' => 'Google',
                                			'uri' => 'http://google.com'
						]
					]
				],[
					'title' => "$name[2]",
					'text' => "$address[2]",
					'actions' => [
						[
							'type' => 'postback',
							'label' => "$number[2]",
							'data' => 'เบอร์โทร'
						],[
							'type' => 'uri',
							'label' => 'Google',
                                			'uri' => 'http://google.com'
						]
					]
                    		],[
					'title' => "$name[3]",
					'text' => "$address[3]",
					'actions' => [
						[
							'type' => 'postback',
							'label' => 'ไม่มีเบอร์ติดต่อ',
							'data' => 'เบอร์โทร'
						],[
							'type' => 'uri',
							'label' => 'Google',
                                			'uri' => 'http://google.com'
						]
					]
                    		],[
					'title' => "$name[4]",
					'text' => "$address[4]",
					'actions' => [
						[
							'type' => 'postback',
							'label' => "$number[4]",
							'data' => 'เบอร์โทร'
						],[
							'type' => 'uri',
							'label' => 'Google',
                                			'uri' => 'http://google.com'
						]
					]
                    		]
			]
		]
	];
	$response = [
	'replyToken' => $replyToken,
	'messages' => [$messageData]
	];
	
	
    
} else {

    $messageData = [
        'type' => 'text',
        'text' => $message->{"text"}
    ];
    $response = [
    'replyToken' => $replyToken,
    'messages' => [$messageData]
    ];
}



error_log(json_encode($response));
$post = json_encode($response);
$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
$ch = curl_init('https://api.line.me/v2/bot/message/reply');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
url_close($ch);
error_log($result);
curl_close($ch);	
