<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('conn.php');
//fetch all presidents
$catpresident = [];
        $president = "SELECT * FROM candidates where category='president'";
          $presult = $con->query($president);
              while($prows=$presult->fetch_assoc()){
                //echo($prows['firsname']);
                array_push($catpresident, $prows['lastname']);
              }

//fetch all categories
$categories = [];
  $sql='select * from categories';
  $result = $con->query($sql);
      while($rows=$result->fetch_assoc()){
        //echo($rows['name']);
        array_push($categories, $rows['name']);
      }

//fetch all governors
$catgovernor = [];
   $governor = "SELECT * FROM candidates where category='governor'";
   $gresult = $con->query($governor);
          while($grows=$gresult->fetch_assoc()){
                //echo($prows['firsname']);
                array_push($catgovernor, $grows['lastname']);
              }

//fetch all senators
$catsenator = [];
  $senator = "SELECT * FROM candidates where category='senator'";
  $sresult = $con->query($senator);
          while($srows=$sresult->fetch_assoc()){
                //echo($prows['firsname']);
                array_push($catsenator, $srows['lastname']);
              }


$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text = $_POST["text"];

//$vote = "SELECT * FROM voters where phone='$phoneNumber'";
$vote = "SELECT * FROM voters where phone='$phoneNumber'";
$resv = $con->query($vote);
if($resv->num_rows == 0) {
  $response="END User not found";
}
else {
$rowsv=$resv->fetch_assoc();
$vpresident= $rowsv['president'];
$vgovernor= $rowsv['governor'];
$vsenator= $rowsv['senator'];
if($vpresident== 'noone' || $vgovernor== 'noone' || $vsenator == 'noone'){
  $voted='False';

}
else {
  $voted='True';
}
}


if ($text == ""){
$response="CON Welcome.Enter 1 to vote \n";
$response .= "1.Vote";
}

elseif ($text == "1"){
  if($voted=='True'){
     $response = "END You cannot vote twice";
}


else{
$response="CON Choose a category \n";
$response .= "1. $categories[0] \n";
$response .= "2. $categories[1] \n";
$response .= "3. $categories[2] \n";
} }

else if($text == "1*1") {
    $response = "CON you have chosen $categories[0] \n";
    $response .= "1. $catpresident[0] \n";
    $response .= "2. $catpresident[1] \n";
    $response .= "3. $catpresident[2] \n";
    $response .= "4. $catpresident[3] \n";
}

else if($text == "1*1*1") {
    $response = "END You have voted for $catpresident[0]";
$updatedb = "UPDATE voters SET president='$catpresident[0]' where phone='$phoneNumber'";
$upresult = $con->query($updatedb);
}
else if($text == "1*1*2") {
    $response = "END You have voted for $catpresident[1]";
    $updatedb = "UPDATE voters SET president='$catpresident[1]' where phone='$phoneNumber'";
$upresult = $con->query($updatedb);
}
else if($text == "1*1*3") {
    $response = "END You have voted for $catpresident[2]";
    $updatedb = "UPDATE voters SET president='$catpresident[2]' where phone='$phoneNumber'";
$upresult = $con->query($updatedb);
}
else if($text == "1*1*4") {
    $response = "END You have voted for $catpresident[3]";
    $updatedb = "UPDATE voters SET president='$catpresident[3]' where phone='$phoneNumber'";
$upresult = $con->query($updatedb);
}

//for option two in the first menu
else if($text == "1*2") {
    $response = "CON you have chosen $categories[1] \n";

    $response .= "1. $catgovernor[0] \n";
    $response .= "2. $catgovernor[1] \n";
    $response .= "3. $catgovernor[2] \n";
    $response .= "4. $catgovernor[3] \n";
}
else if($text == "1*2*1") {
    $response = "END You have voted for $catgovernor[0]";
    $updatedb = "UPDATE voters SET governor='$catgovernor[0]' where phone='$phoneNumber'";
$upresult = $con->query($updatedb);
}
else if($text == "1*2*2") {
    $response = "END You have voted for $catgovernor[1]";
    $updatedb = "UPDATE voters SET governor='$catgovernor[1]' where phone='$phoneNumber'";
$upresult = $con->query($updatedb);
}
else if($text == "1*2*3") {
    $response = "END You have voted for $catgovernor[2]";
    $updatedb = "UPDATE voters SET governor='$catgovernor[2]' where phone='$phoneNumber'";
$upresult = $con->query($updatedb);
}
else if($text == "1*2*4") {
    $response = "END You have voted for $catgovernor[3]";
    $updatedb = "UPDATE voters SET governor='$catgovernor[3]' where phone='$phoneNumber'";
$upresult = $con->query($updatedb);
}

//for option 3 in the first menu
else if($text == "1*3") {
    $response = "CON you have chosen $categories[2] \n";

    $response .= "1. $catsenator[0] \n";
    $response .= "2. $catsenator[1] \n";
    $response .= "3. $catsenator[2] \n";
    $response .= "4. $catsenator[3] \n";
}
else if($text == "1*3*1") {
    $response = "END You have voted for $catsenator[0]";
    $updatedb = "UPDATE voters SET senator='$catsenator[0]' where phone='$phoneNumber'";
$upresult = $con->query($updatedb);
}
else if($text == "1*3*2") {
    $response = "END You have voted for $catsenator[1]";
    $updatedb = "UPDATE voters SET senator='$catsenator[1]' where phone='$phoneNumber'";
$upresult = $con->query($updatedb);
}
else if($text == "1*3*3") {
    $response = "END You have voted for $catsenator[2]";
    $updatedb = "UPDATE voters SET senator='$catsenator[2]' where phone='$phoneNumber'";
$upresult = $con->query($updatedb);
}
else if($text == "1*3*4") {
    $response = "END You have voted for $catsenator[3]";
    $updatedb = "UPDATE voters SET senator='$catsenator[3]' where phone='$phoneNumber'";
$upresult = $con->query($updatedb);
}

header('Content-type: text/plain');
echo $response;
