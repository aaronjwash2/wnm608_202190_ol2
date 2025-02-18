<?php 

include "../lib/php/functions.php";

$notes_object = file_get_json("notes.json");
$users_array = file_get_json("../data/users.json");


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product &ndash; AWesome Stuff</title>
    <?php include "../parts/meta.php"; ?>
</head>
<body>

    <?php include "../parts/navbar.php"; ?>

    <div class="container">
        <div class="card-light">
            <h2>Notes</h2>

            <?php 
            
            for($i=0;$i<count($notes_object->notes);$i++){
                echo "<li>{$notes_object->notes[$i]}</li>";
            }
            
            ?>
        </div>
        <div class="card-light">
            <h2>Users</h2>

            <?php 
            
            for($i=0;$i<count($users_array);$i++){
                echo "<li>
                    <strong>{$users_array[$i]->name}</strong>
                    <span>{$users_array[$i]->type}</span>
                </li>";
            }
            
            ?>
        </div>
    </div>
    
</body>
</html>