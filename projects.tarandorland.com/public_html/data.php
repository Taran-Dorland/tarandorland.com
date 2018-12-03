<?php

header('Content-Type: application/json');

$json = file_get_contents("https://api.warframestat.us/pc");

echo $json;




?>