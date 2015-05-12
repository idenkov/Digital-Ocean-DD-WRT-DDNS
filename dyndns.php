<?php

//Lets start by defining some variables
//I might need to put this in a function so I can access them later from the class
$main_domain = "denkov.org";
$sub_domain ="home";
$api_key = file_get_contents('token.txt');
$ipc =  $_SERVER['REMOTE_ADDR'];
$request_uri = "https://api.digitalocean.com/v2/domains/denkov.org/records";
//$request_uri = "https://api.digitalocean.com/v2/domains/digitaloceanisthebombdiggity.com/records"

//DO List all domain records
//curl -X GET -H 'Content-Type: application/json' -H 'Authorization: Bearer b7d03a6947b217efb6f3ec3bd3504582' "https://api.digitalocean.com/v2/domains/digitaloceanisthebombdiggity.com/records"

//I will need to use classes for the variables!
class domain{

}

function create_subdomain(){
  $postdata = array("type" => "CNAME", "name" => "home", "data" => "128.199.44.288");

  $postdata_json = json_encode($postdata);

  $ch = curl_init($request_uri);
  $headers = array(
    'Content-Type:application/json',
    'Authorization: Bearer ' . file_get_contents('token.txt'),
    'Content-Length: ' . strlen($postdata_json)
    );


  $ch = curl_init();                    // initiate curl
  $url = "https://api.digitalocean.com/v2/domains/denkov.org/records"; // where you want to post data
  curl_setopt($ch, CURLOPT_URL,$url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  // tell curl you want to post something
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata_json); // define what you want to post
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $output = curl_exec ($ch); // execute

  curl_close ($ch); // close curl handle

  var_dump($output); // show output

}

    $ch = curl_init($request_uri);
    $headers = array(
      'Content-Type:application/json',
      'Authorization: Bearer '. $api_key  );
      curl_setopt($ch, CURLOPT_TIMEOUT, 5);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      $response = curl_exec($ch);
      curl_close($ch);
      //global $response;
      //echo $response;


      $jsdecode = json_decode($response);
      foreach ($jsdecode->domain_records as $drecord ){
        echo $drecord -> name;
        if ($drecord->name == $sub_domain){
          echo "Success!";
        }
        else{
          echo "No such subdomain";
        }
      }
      create_subdomain();


    //Get the visitor town    //$maxurl = get_option('maxmind_service_url') . "46.10.117.238";
    //Need to check if the town it is within the file!!!
      //global $city;
      //global $country;
      //$city = $mmcity['city']['names']['en'];
      //$country = $mmcity['country'] ['iso_code'];
      //Check if the IP is within the US


            //CLI curl that works
            //curl -X POST -H 'Content-Type: application/json' -H 'Authorization: Bearer b7d03a6947b217efb6f3ec3bd3504582' -d '{"type":"A","name":"customdomainrecord.com","data":"162.10.66.0","priority":null,"port":null,"weight":null}' "https://api.digitalocean.com/v2/domains/digitaloceanisthebombdiggity.com/records"



?>
