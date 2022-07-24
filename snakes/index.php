<!DOCTYPE html>
<html lang="en" dir="ltr"> 
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./index.css">
  </head>
  <body>

    <div>
    <div class="grid-container">
      <div id='table-canvas'>
      <table class="grid-item board" id="board"> 
      </table>
      <canvas id="myCanvas" width="500px" height="500px">
        </canvas> 
        </div>
        <button id='showlead'>show leaderboard</button>

      <div class="grid-item player" style='display:none'>
        <h4 id='player-tag'>Player 1</h4>
        <div class="dice"> 
          <button type="button" name="button" id='roll-dice'>Roll Dice</button>
          <button type="button" name="button" id='reset'>Reset</button>
          <input type="text" name="" value="0" id="dice-value">
        </div>
      </div>
      <form  id='startform' method='POST'>
        <input type="text" placeholder='player1' name='player1' id='player1'>
        <input type="text" placeholder='player2' name='player2' id='player2'>
        <input type="submit" value="Start game" name='submit' id='startgame'>
      </form>
    </div>
    <script src="./jquery.min.js"></script>
    <script src='./jquery.line.js'></script>
    <script type="text/javascript" src='./index.js'></script>
</div>

  </body>
</html>