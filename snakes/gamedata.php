<?php
ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include('db_connect.php');
    session_start();
    $player1=$_REQUEST['player1'];
    $player2=$_REQUEST['player2'];
      $sql="SELECT * from player_data where player1='$player1' and player2='$player2'";
      $result = $conn->query($sql);
      $rows=mysqli_num_rows($result);
      if($rows==1){
      $session_data=$result->fetch_assoc();
      $winner = $session_data['winner'];
      $game_id = $session_data['game_id'];
      if($winner == null){
        $_SESSION['player1'] = $player1;
        $_SESSION['player2'] = $player2;
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
            "winner"=> $winner
        );
        echo json_encode($return_arr);
    }  
    else{
        $return_msg[] = array('message' => 'game completed');
        echo json_encode($return_msg);
    }

      }
    else{
        $sql="INSERT INTO `player_data` (`game_id`, `player1`, `player2`, `player1_pos`, `player2_pos`, `winner`) VALUES
         (NULL, '$player1', '$player2', '1', '1', NULL);";
        $result = $conn->query($sql);
        if($result){
            $sql="SELECT * from player_data where player1='$player1' and player2='$player2'";
            $result = $conn->query($sql);
            $rows=mysqli_num_rows($result);
            if($rows==1){
            $session_data=$result->fetch_assoc();
            $game_id = $session_data['game_id'];
            $_SESSION['player1'] = $player1;
            $_SESSION['player2'] = $player2;
            $_SESSION['player1_pos'] = $session_data['player1_pos'];
            $_SESSION['player2_pos'] = $session_data['player2_pos'];
            $_SESSION['turn'] = $session_data['turn'];
            $_SESSION['winner'] = $session_data['winner'];
            $return_arr[] = array(
            "game_id" => $game_id,
            "player1" => $_SESSION['player1'],
            "player2" => $_SESSION['player2'],
            "turn" => $_SESSION['turn'],
            "player1_pos" => $_SESSION['player1_pos'],
            "player2_pos" => $_SESSION['player2_pos'],
            "winner"=> $_SESSION['winner']

        );
        echo json_encode($return_arr);
        }

    else{
        echo 'failed';
    }
    }  
    }
?>