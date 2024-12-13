<?php
include "config.php";
include "reactions.php";
include "movies.php";
include "api.php";

$getDbMovies = Movies::getMovies();
$getPopulairMovies = Api::getMovies();

// sort by title
$marks = array_column($getPopulairMovies, 'title');
array_multisort($marks, SORT_ASC, $getPopulairMovies);
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
    <h1 id="page-title">Stefan's movie comments</h1>
    <div id="content">
        <form class="movieForm" action="movie.php" method="get">
            <h1>Populair movies right now</h1>
                <div class="movies">
                <?php
                // get first movie to make it checked
                $firstMovie = array_shift($getPopulairMovies);
                echo "<div class='movie'><input type='radio' id='$firstMovie->id' value='$firstMovie->id' name='movieId' checked>
                        <label for='$firstMovie->id' class='container'>$firstMovie->title</label></div>";

                // display other movies
                foreach ($getPopulairMovies as $movie) {
                    echo "<div class='movie'><input type='radio' id='$movie->id' value='$movie->id' name='movieId'>
                            <label for='$movie->id' class='container'>$movie->title</label></div>";
                }
                ?>
                </div>
            <button type="submit" value="Submit">Go to movie</button>
        </form>
        <form class="movieForm" action="movie.php" method="get">
            <h1>Most active movies</h1>
            <div class="movies">
                <?php
                // get first movie to make it checked
                $firstMovie = array_shift($getDbMovies);
                $id = $firstMovie["id"];
                $title = $firstMovie["title"];

                echo "<div class='movie'><input type='radio' id='R$id' value='$id' name='movieId' checked>
                        <label for='R$id' class='container'>$title</label></div>";

                // display other movies
                foreach ($getDbMovies as $movie) {
                    $id = $movie['id'];
                    $title = $movie['title'];
                    echo "<div class='movie'><input type='radio' id='R$id' value='$id' name='movieId'>
                            <label for='R$id' class='container'>$title</label></div>";
                }
                ?>
            </div>
            <button type="submit" value="Submit">Go to movie</button>
        </form>
    </div>
</body>
</html>

<?php
$con->close();
?>