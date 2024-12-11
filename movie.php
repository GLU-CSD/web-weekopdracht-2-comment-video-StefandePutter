<?php

include("config.php");
include("reactions.php");
include "api.php";

if (empty($_POST)) {
    
    // header('Location: ./');
    // die();
}
$getReactions = Reactions::getReactions(1);
$movies = $results;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube remake</title>
</head>
<body>

    <?php
        foreach ($getReactions as $reaction) {
            echo "<p>". $reaction['name'] . ": " . $reaction['message'] . "</p>";
        }
    ?>

</body>
</html>

<?php 

?>