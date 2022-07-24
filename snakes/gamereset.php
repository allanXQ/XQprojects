<?php
ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include('db_connect.php');
    session_start();
    $game_id=$_REQUEST['game_id'];
      $sql="UPDATE player_data set player1_pos='1', player2_pos='1', turn='player1',winner=null
       where game_id='$game_id'";
      $result = $conn->query($sql);
      if($result){
        $sql="SELECT * from player_data where game_id='$game_id'";
      $result = $conn->query($sql);
      $rows=mysqli_num_rows($result);
      if($rows==1){
      $session_data=$result->fetch_assoc();
      $winner = $session_data['winner'];
      $game_id = $session_data['game_id'];
      if($winner == null){
        $_SESSION['player1'] = $session_data['player1'];;
        $_SESSION['player2'] = $session_data['player2'];;
        $_SESSION['player1_pos'] = $session_data['player1_pos'];
        $_SESSION['player2_pos'] = $session_data['player2_pos'];
        $_SESSION['turn'] = $session_data['turn'];
        $_SESSION['winner'] = $winner;
        $return_arr[] = array(
            "game_id" => $game_id,
            "player1" => $_SESSION['player1'],
            "player2" => $_SESSION['player2'],
            "turn" => $_SESSION['turn'],
            "player1_pos" => $_SESSION['player1_pos'],
            "player2_pos" => $_SESSION['player2_pos'],
        );
        echo json_encode($return_arr);     
}
      }        
      
    else{
      $sql="SELECT * from player_data where player1='$player1' and player2='$player2'";
      $result = $conn->query($sql);
      $rows=mysqli_num_rows($result);
      if($rows==1){
      $session_data=$result->fetch_assoc();
      $game_id = $session_data['game_id'];
      $winner = $session_data['winner'];
      if($winner == null){
        $_SESSION['player1'] = $player1;
        $_SESSION['player2'] = $player2;
        $_SESSION['player1_pos'] = $session_data['player1_pos'];
        $_SESSION['player2_pos'] = $session_data['player2_pos'];
        $_SESSION['turn'] = $session_data['turn'];

        $return_arr[] = array(
            "game_id" => $game_id,
            "player1" => $_SESSION['player1'],
            "player2" => $_SESSION['player2'],
            "turn" => $_SESSION['turn'],
            "player1_pos" => $_SESSION['player1_pos'],
            "player2_pos" => $_SESSION['player2_pos'],
        );
        echo json_encode($return_arr);
    }
  }      
    }
  }
?>