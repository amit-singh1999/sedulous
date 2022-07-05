<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://sedulous.bitrix24.com/rest/44/mcl8m30hl5f0fblb/user.get',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => '{
    "filter":{
        "EMAIL": "' . $_POST['bitrixEmail'] . '"
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Cookie: BITRIX_SM_SALE_UID=0; qmb=.'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$response = json_decode($response, true);
echo count($response['result']) > 0 ? TRUE : '0';
