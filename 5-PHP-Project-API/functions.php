<?php 


function convertJsonToArray($path){
    $data_json = file_get_contents($path);
    $data_array = json_decode($data_json, true);
    return $data_array;
}