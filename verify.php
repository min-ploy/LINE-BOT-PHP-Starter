<?php


$access_token = 'X0Q8gObz71IhgU25g93t/uwaDe8ExgB9p2bs4pY2iZ0hiRffj0kDiIia+Dj5AlMB3NII5Nx4CpoD1KdlI0Pjld0HOXLOSzH16/DU0ocf9YMAq/7JeY8nqIMxAo1+Rm8qtU9v8SkXhP6DU3vxpc9pHAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);


$result = curl_exec($ch);
curl_close($ch);

echo $result;
