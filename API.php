<?php

//PHP CHALLENGE
//PROXIMITY
//AUTHOR: JAIRO CARVAJAL
//October 17 , 2020
//Read the data from the request

if(isset($_GET['key_Word']))
{
    $key_Word= filter_var($_GET['key_Word'], FILTER_SANITIZE_STRING);

    //Load the file and read it
    $fileJson = file_get_contents("keyword.json");
    $jsonResult = json_decode($fileJson, true);
    $arrayResult = array();
    for($i = 0 ;$i< count($jsonResult);$i++) {

        for ($j=0; $j < count($jsonResult[$i]); $i++) { 
        
            $yes = array_search($key_Word,$jsonResult[$i]);

            if($yes != "")
            {
                $result = array(
                    
                    'name' =>$jsonResult[$i]['name'],
                    'city' =>$jsonResult[$i]['city'],
                    'state' =>$jsonResult[$i]['state'],
                );

                array_push($arrayResult,$result);
            }
        }
    }

    header('Content-Type: application/json');
    echo json_encode($arrayResult);
    die;
   
}






