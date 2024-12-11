<?php
if (empty($_GET['movieId'])) {
    
    header('Location: ./');
    die();
}
include("config.php");
include("reactions.php");
include "api.php";

$movieId = $_GET['movieId'];

$movie = getMovie($movieId);

$getReactions = Reactions::getReactions($movieId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Youtube remake</title>
</head>
<body>
    <div id="content">
        <?php
        echo "<img class='poster' src='https://image.tmdb.org/t/p/w500/$movie->poster_path'>";
        echo "<div id=box2>";
            echo "<h1>$movie->title</h1>";
            echo "<div id='comment-section'>";
            foreach ($getReactions as $reaction) {
                echo "<p>". $reaction['name'] . ": " . $reaction['message'] . "</p><br>";
            }
            echo "</div>";
            ?>
            <form method="post">
                <input type="text" id="name" name="name">
                <input type="text" id="email" name="email">
                <input type="text" id="message" name="message">
                <button type="submit" value="Submit">submit</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php 

?>