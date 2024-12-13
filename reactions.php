<?php
class Reactions
{
    static function setReaction($postArray){
        global $con;
        $array = [];
        if (!empty($postArray)) {

            if (isset($postArray['name']) && $postArray['name'] != '') {
                $name = stripslashes(trim($postArray['name']));
            }else{
                $array['error'][] = "Name not set";
            }
            if (isset($postArray['email']) && filter_var($postArray['email'], FILTER_VALIDATE_EMAIL)) {
                $email = stripslashes(trim($postArray['email']));
            }else{
                $array['error'][] = "Invalid email";
            }

            if (isset($postArray['message']) && $postArray['message'] != '') {
                $message = stripslashes(trim($postArray['message']));
            }else{
                $array['error'][] = "Message not set";
            }

            if (isset($postArray["movie_id"]) && $postArray['movie_id'] != '') {
                $movie_id = stripslashes(trim($postArray['movie_id']));
            } else {
                $array['error'][] = "movie_id not in array";
            }

            if (empty($array['error'])) {

                $srqry = $con->prepare("INSERT INTO reactions (movie_id,name,email,message) VALUES (?,?,?,?);");
                if ($srqry === false) {
                    prettyDump( mysqli_error($con) );
                }
                
                $srqry->bind_param('isss',$movie_id,$name,$email,$message);
                if ($srqry->execute() === false) {
                    prettyDump( mysqli_error($con) );
                }else{
                    $array['succes'] = "Reaction save succesfully";
                }
            
                $srqry->close();
            }

            return $array;
        }
    }
    
    static function getReaction($movieId){
        global $con;
        $array = [];
        $grqry = $con->prepare("SELECT id,name,message FROM reactions WHERE reactions.movie_id = $movieId ORDER BY `reactions`.`date_added` DESC;");
        if($grqry === false) {
            prettyDump( mysqli_error($con) );
        } else{
            $grqry->bind_result($id,$name,$message);
            if($grqry->execute()){
                $grqry->store_result();
                while($grqry->fetch()){
                    $array[] = [
                        'id' => $id,
                        'name' => $name,
                        'message'=> $message
                    ];
                }
            }
            $grqry->close();
        }
        return $array;
    }
}

