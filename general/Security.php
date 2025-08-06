<?php
// Ejecutar: composer require guzzlehttp/guzzle:*
require'vendor/autoload.php';

$headers=array(
'Content-Type'=>'application/x-www-form-urlencoded',
'Accept'=>'application/json',
);

$client= new \GuzzleHttp\Client();

// Define la matriz del cuerpo de la solicitud.
$request_body=array(
     "client"=>"AQUI_SU_CLIENT",
     "key"=>"AQUI_SU_KEY",
     "phone"=>"AQUI_EL_NUMERO_DE_CELULAR",
     "name"=>"AQUI_NOMBRE_CONTACTO",
     "channel"=> "AQUI_CHANNEL_A_BLOQUEAR" // CANALES DISPONIBLES "SMS","CALL","WA"
);

try{
$response=$client->request('POST','https://www.onurix.com/api/v1/block-phone',
array('headers'=>$headers,'form_params'=>$request_body,));
print_r($response->getBody()->getContents());
}
catch(\GuzzleHttp\Exception\BadResponseException $e){
// Manejar excepciones o errores de API
print_r($e->getMessage());
}