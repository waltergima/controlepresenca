<?php

//https://stackoverflow.com/questions/6213509/send-json-post-using-php	
//allow_url_fopen = On 

// $data = array(
  // 'userID'      => 'a7664093-502e-4d2b-bf30-25a2b26d6021',
  // 'itemKind'    => 0,
  // 'value'       => 1,
  // 'description' => 'Boa saudaÁ„o.',
  // 'itemID'      => '03e76d0a-8bab-11e0-8250-000c29b481aa'
// );


//opcao 2
//https://stackoverflow.com/questions/21271140/curl-and-php-how-can-i-pass-a-json-through-curl-by-put-post-get


$data = array ('voluntario' => array( 
								'nome'=>'Walter Gima',
								'cidade' => array('@id' => '350330'),
								'dataNascimento' => '15/01/1977',
								'codigoCarteirinha' => '123456789',
								'casaDeOracao'=> array ( '@codigoRelatorio' => '221865'),
								'ministerioCargo' => array('@id' => '36')
					) 
			);

echo json_encode( $data );

$data_json = json_encode($data);
$url = "http://187.121.212.50:8080/CAGEF/servicos/voluntarios/novo";


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response  = curl_exec($ch);
curl_close($ch);

echo $response;

?>