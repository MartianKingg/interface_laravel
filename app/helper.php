<?php 
// This is helper config page

// helper for checking errors using print_r
if(!function_exists('p')){
    function p($data){
        echo '<pre/>';

        print_r($data);

        echo "<pre/>";
    }

    // helper for formating date into d-m-y

    if(!function_exists('get_formatted_date')){
        function get_formatted_date($date,$format){
            $formattedDate = date($format,strtotime($date));
            return $formattedDate;
        }
    }
}
?>