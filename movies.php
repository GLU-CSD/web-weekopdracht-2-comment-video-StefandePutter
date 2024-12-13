<?php
class Movies {
    static function setMovie($postArray): array{
        global $con;
        $array = [];

        if (isset($postArray['id']) && $postArray['id'] != '') {
            $id = stripslashes(trim($postArray['id']));
        }else{
            $array['error'][] = "Id not set in array";
        }
        if (isset($postArray['title']) && $postArray['title'] != '') {
            $title = stripslashes(trim($postArray['title']));
        }else{
            $array['error'][] = "Title not set in array";
        }
        if (isset($postArray["poster_path"]) && $postArray["poster_path"] != "") 
        {
            $url = stripslashes(trim($postArray["poster_path"]));
        } else{
            $array["error"][] = "poster_path is not set";
        }

        if (empty($array['error'])) {
            $smqry = $con->prepare('INSERT INTO movies (id,title,poster_path) VALUES (?,?,?);');
            if ($smqry === false) {
                prettyDump( mysqli_error($con) );
            }

            $smqry->bind_param('iss',$id,$title,$url);
            if ($smqry->execute() === false) {
                prettyDump( mysqli_error($con) );
            }else{
                $array['succes'] = "Reaction save succesfully";
            }

            $smqry->close();
        }

        return $array;
    }

    static function getMovies(): array {
        global $con;
        $array = [];
        // get movies ordered by most comments
        $gmqry = $con->prepare("SELECT movies.id,movies.title,COUNT(reactions.id) as amount FROM movies INNER JOIN reactions ON reactions.movie_id=movies.id GROUP BY movies.id ORDER BY amount DESC, movies.title ASC;");
        if($gmqry === false) {
            prettyDump( mysqli_error($con) );
        } else{
            $gmqry->bind_result($id,$title,$url);
            if($gmqry->execute()){
                $gmqry->store_result();
                while($gmqry->fetch()){
                    $array[] = [
                        'id' => $id,
                        'title'=> $title,
                        'url'=> $url
                    ];
                }
            }
            $gmqry->close();
        }
        return $array;
    }

    static function checkIfMovieInDb($id):bool {
        global $con;
        $gmqry = $con->prepare("SELECT COUNT(*) as amountOfRecords FROM movies WHERE id=$id");
        if($gmqry === false) {
            prettyDump( mysqli_error($con) );
        } else{
            $gmqry->bind_result($amountOfRecords);
            if ($gmqry->execute()){
                $gmqry->store_result();
                while($gmqry->fetch()){
                    if ($amountOfRecords > 0){
                        return true;
                    }
                }
            }
            $gmqry->close();
        }
        return false;
    }
}