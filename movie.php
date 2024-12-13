<?php
// if there is no get movieId go back to index.html
if (empty($_GET['movieId'])) {
    
    header('Location: ./');
    die();
}
include "config.php";
include "reactions.php";
include "movies.php";
include "api.php";

$movie_id = $_GET['movieId'];

$movie = Api::getMovieById($movie_id);

$getReactions = Reactions::getReaction($movie_id);

// check if there is post infromation
if (!empty($_POST)){
    // if empty reactions means that it is an movie that isnt in the database yet so we make place it in
    if (!Movies::checkIfMovieInDb($movie_id)) {
        $movieArray = [
            "id"=> $movie_id,
            "title"=> $movie->title,
            "poster_path"=> $movie->poster_path
        ];

        $setVideo = Movies::setMovie($movieArray);
    }

    $commentArray = [
        'movie_id'=> $_POST['movie_id'],
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'message' => $_POST['message']
    ];

    $setReaction = Reactions::setReaction($commentArray);

    // get reactions again to show the new reaction aswell
    $getReactions = Reactions::getReaction($movie_id);
}

// set var to keep in form
$name = empty($_POST['name']) ? '' : $_POST['name'];
$email = empty($_POST['email']) ? '' : $_POST['email'];

if(isset($setReaction['error']) && $setReaction['error'] != ''){
    $message = empty($_POST['message']) ? '' : $_POST['message'];
} else {
    $message = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/movie.css">
    <title>Youtube remake</title>
</head>
<body>
    <div id="movie">
        <?php
        echo "<img class='poster' src='https://image.tmdb.org/t/p/w500$movie->poster_path'>";
        echo "<div id=box2>";
        
            echo "<h1 id='title'>$movie->title</h1>";
            if(isset($setReaction['error']) && $setReaction['error'] != ''){
                echo "<p id='error'>";
                foreach ($setReaction['error'] as $error) {
                    echo $error.", ";
                }
                echo "</p>";
            }
                echo "<form id='comment-form' method='post'>
                    <input type='text' placeholder='name' value='$name' id='name' name='name'>
                    <input type='text' placeholder='email' id='email' value='$email' name='email'>
                    <input type='text' placeholder='comment' value='$message' id='message' name='message'>
                    <input type='hidden' name='movie_id' value='$movie_id'>
                    <button type='submit' value='Submit'>></button>
                </form>";
                echo "<div id='comment-section'>";
                    if (!empty($getReactions)) {
                        foreach ($getReactions as $reaction) {
                            echo "<p>". $reaction['name'] . ": " . $reaction['message'] . "</p>";
                        }
                    } else {
                        echo "<p style='color:gray'> no comments yet</p>";
                    }
                echo "</div>";
            ?>  
        </div>
    </div>
</body>
<script src="assets/js/app.js"></script>
</html>

<?php
$con->close();
?>