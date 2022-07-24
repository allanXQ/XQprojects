<?php
ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include('db_connect.php');
    session_start();
      $game_id=$_REQUEST['game_id'];
      $turn=$_REQUEST['turn'];
      $player1_pos=$_REQUEST['player1_pos'];
      $player2_pos=$_REQUEST['player2_pos'];
      $winner = $_REQUEST['winner'];
      $sql="UPDATE player_data set turn='$turn',player1_pos='$player1_pos', 
      player2_pos='$player2_pos',winner='$winner' where game_id='$game_id'";
      $result = $conn->query($sql);        

?>