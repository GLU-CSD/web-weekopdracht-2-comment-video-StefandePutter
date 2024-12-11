<?php

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&page=1&sort_by=popularity.desc",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
      "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmMTk3NGU5MGI4NmQ2MmI1MmNkN2E2YWEwM2YxN2I4MSIsIm5iZiI6MTczMzkxNTAzMy42MDQsInN1YiI6IjY3NTk3MTk5MzU5ZGM1ZmM4ODNmMTcxOSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.EOXZZ2nWY7ias62UMBaTw7S4pmiPJLU20UN2_8TxMNc",
      "accept: application/json"
    ],
  ]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    // echo $response;
    $response = json_decode($response);
}


// var_dump($results[0]);
// echo "<br>";

function getMovies() {
  global $response;
  $results = $response->results;
  return $results;
}

function getMovie(int $id){
  global $response;
  $movies = $response->results;
  foreach($movies as $movie) {
    if ($id == $movie->id){
      return $movie;
    }
  }
}
