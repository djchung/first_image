<?php
$query = $_POST['query'];
$words = explode(" ", $query);
$search_term="";
if(count($words) > 1){
  foreach($words as $x){
    $search_term =$search_term . $x . "+"; 
  }
  $search_term=substr($search_term,0,-1);
}else{
  $search_term = $words[0];
}
$jsrc = "https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=" . "$search_term";
$json = file_get_contents($jsrc);
$jset = json_decode($json, true);
echo json_encode($jset["responseData"]["results"][0]["url"]);
?>