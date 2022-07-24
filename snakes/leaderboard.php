<?php
$sql="SELECT * from player_data where winner!=null"
$result = $conn->query($sql);
$rows=mysqli_num_rows($result);
if($rows==1){
$session_data=$result->fetch_assoc();
$winner = $session_data['winner'];
$player1 = $session_data['player1'];
$player2 = $session_data['player2'];

// $_SESSION['player1'] = $player1;
// $_SESSION['player2'] = $player2;
$game_id = $session_data['game_id'];
if($winner == 'player1'){
  $return_arr[] = array(
      "winner"=> $player1
  );
  echo json_encode($return_arr);
}  
if($winner == 'player2'){
    $return_arr[] = array(
        "winner"=> $player2
    );
    echo json_encode($return_arr);
  } 
else{
  $return_msg[] = array('message' => 'error');
  echo json_encode($return_msg);
}
}

?>