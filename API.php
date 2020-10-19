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


    function array_find($needle, array $haystack, $column = null) {

        if(is_array($haystack[0]) === true) { // check for multidimentional array
    
            foreach (array_column($haystack, $column) as $key => $value) {
                if (strpos(strtolower($value), strtolower($needle)) !== false) {
                    return $key;
                }
            }
    
        } else {
            foreach ($haystack as $key => $value) { // for normal array
                if (strpos(strtolower($value), strtolower($needle)) !== false) {
                    return $key;
                }
            }
        }
        return false;
    } 

    foreach ($jsonResult as $value)
    {
        
            //$yes =  array_search(strtolower($key_Word), array_map('strtolower', $value));
            $yes = array_find($key_Word, $value); // returns - key is - 0 
            if($yes!="")
            {
                $result = array(
                    
                    'name' =>$value['name'],
                    'city' =>$value['city'],
                    'state' =>$value['state'],
                );

                array_push($arrayResult,$result);
            }
       
    }

        header('Content-Type: application/json');
        echo json_encode($arrayResult);
        die;

    
}






