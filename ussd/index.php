<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="index.php" method='post'>
        <input type="text" placeholder='sessionId' name='sessionId'>
        <input type="text" placeholder='servicecode' name='serviceCode'>
        <input type="text" placeholder='phonenumber' name='phoneNumber'>
        <input type="text" placeholder='text' name='text'>
        <input type="submit" name='submit'>
    </form>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('conn.php');
//fetch all presidents
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];
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


//fetch voter
$voted=[];
$vote = "SELECT * FROM voters where phone='$phoneNumber'";
$result = $con->query($vote);
$rows=$result->fetch_assoc();
$data= $rows['voted'];
echo($data);





//for first connection
if ($text == ""){
$response="CON Welcome.Enter 1 to vote $phoneNumber l \n";
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
}   }

else if($text == "1*1") {
    $response = "CON you have chosen $categories[0] \n";
    $response .= "1. $catpresident[0] \n";
    $response .= "2. $catpresident[1] \n";
    $response .= "3. $catpresident[2] \n";
    $response .= "4. $catpresident[3] \n";
}
else if($text == "1*1*1") {
    $response = "END You have voted for $catpresident[0]";
}
else if($text == "1*1*2") {
    $response = "END You have voted for $catpresident[1]";
}
else if($text == "1*1*3") {
    $response = "END You have voted for $catpresident[2]";
}
else if($text == "1*1*4") {
    $response = "END You have voted for $catpresident[3]";
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
}
else if($text == "1*2*2") {
    $response = "END You have voted for $catgovernor[1]";
}
else if($text == "1*2*3") {
    $response = "END You have voted for $catgovernor[2]";
}
else if($text == "1*2*4") {
    $response = "END You have voted for $catgovernor[3]";
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
}
else if($text == "1*3*2") {
    $response = "END You have voted for $catsenator[1]";
}
else if($text == "1*3*3") {
    $response = "END You have voted for $catsenator[2]";
}
else if($text == "1*3*4") {
    $response = "END You have voted for $catsenator[3]";
$updatedb = "UPDATE voters SET voted ='True' where phone='$phoneNumber'";
$upresult = $con->query($updatedb);
}

//header('Content-type: text/plain');
echo $response;

?>
  </body>
</html>
