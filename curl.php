<?php

$url = "https://dog.ceo/api/breeds/image/random";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($curl);
curl_close($curl);
// check response
$data = json_decode($response);

if(curl_errno($curl)){
    echo "Error fetching data from Dog API: ". curl_errno($curl);
}else{
    ?>
    <img src="<?php echo $data->message; ?>" alt="">
    <?php
}
?>

