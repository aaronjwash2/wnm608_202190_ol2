<?php

include_once "../lib/php/functions.php";

$output = [];

// php input is a temporary text file that's generated when the page is loaded
$data = json_decode(file_get_contents("php://input"));

//print_p($data);

switch($data->type) {
    case "Everything":
        $output['result'] = makeQuery(makeConn(),"SELECT * 
            FROM `products` 
            ORDER BY `date_create` DESC 
            LIMIT 12");
        break;

    case "product_search":
        $output['result'] = makeQuery(makeConn(),"SELECT * 
            FROM `products` 
            WHERE 
                `name` LIKE '%$data->search%' OR
                `description` LIKE '%$data->search%' OR
                `type` LIKE '%$data->search%' OR
                `category` LIKE '%$data->search%'
            ORDER BY `date_create` DESC 
            LIMIT 12");
        break;

    case "product_filter_category":
        $output['result'] = makeQuery(makeConn(),"SELECT * 
            FROM `products` 
            WHERE `category` LIKE '$data->column'
            ORDER BY `date_create` DESC 
            LIMIT 12");
        break;  

    case "product_filter_type":
        $output['result'] = makeQuery(makeConn(),"SELECT * 
            FROM `products` 
            WHERE `type` LIKE '$data->column'
            ORDER BY `date_create` DESC 
            LIMIT 12");
        break; 
        
    case "product_sort":
        $output['result'] = makeQuery(makeConn(),"SELECT * 
            FROM `products` 
            ORDER BY `$data->column` $data->dir
            LIMIT 12");
        break;  

    default: $output['error'] = "No Valid Type";
}

echo json_encode($output,JSON_NUMERIC_CHECK|JSON_UNESCAPED_UNICODE);