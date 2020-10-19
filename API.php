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


    //FUNCTION TO RETURN THE RESULTS IF THEY MATCH WITH THE KEY WORD
    function array_find($needle, array $haystack, $column = null) {

            foreach ($haystack as $key => $value) { // for normal array
                if (strpos(strtolower($value), strtolower($needle)) !== false) {
                    return $key;
                }
            }
        
        return false;
    } 


    //HERE WE MAKE A LOOP OF THE ARRAY TO GET THE VALUES FROM THE JSON FILE
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






