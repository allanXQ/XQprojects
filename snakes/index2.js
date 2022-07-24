$("#startform").submit(function( event ) {
    var $startform = $( this ),
    player1 = $startform.find('#player1').val(),
    player2 = $startform.find('#player2').val();
    // Stop form from submitting normally
    event.preventDefault();
    data = {
      player1: player1,
      player2: player2
    }
    $.post("gamedata.php",
    data,
    get_response= (response)=>{
      res = JSON.parse(response)
      $("#startform").css({'display':'none'})
      $(".player").css({'display':'block'})
      initial(res)
  }
    )
  
    const initial = (res)=>{
      $player1 = $('<div id="person1">1</div>')
      $player2 = $('<div id="person2">2</div>')
      res.map(val=>{
        turn = val.turn
        $player1_pos = parseInt(val.player1_pos)
        $player2_pos = parseInt(val.player2_pos)
      })
      // $player1_pos = 1 
      // $player2_pos = 1
      $('#person1').css({'position':$(`#${$player1_pos}`).position()})
      $('#person2').css({'position':$(`#${$player2_pos}`).position()})
      startPosition()  
    }
  
    function startPosition () {
      $(`#${$player1_pos}`).append($player1) 
      $(`#${$player2_pos}`).append($player2)
    }
  
    var $roll_dice = $('#roll-dice')
    $roll_dice.on('click', rollDice)
  
    function rollDice(){
      const dice_value = Math.floor(Math.random() * 6)+1 
      var $die = $('#dice-value')
      $die.val(dice_value)
      console.log(dice_value)
      playerTurn(dice_value)
    }
  
    function playerTurn (dice_value) {
      snake1_entry = 28
  snake1_exit = 20
  snake2_entry = 34
  snake2_exit = 22
  ladder1_entry = 19
  ladder1_exit = 33
  ladder2_entry = 21
  ladder2_exit = 31
  // ladder3_entry = 21
  // ladder3_exit = 32
      if (turn == 'player1') {
        $('#player-tag').text('Player 2')
        $player1_pos += dice_value
        $player1.appendTo(`#${$player1_pos}`)
        switch ($player1_pos) {
          case snake1_entry:
            $player1_pos=snake1_exit
            $('myCanvas').css({'display':'flex'})
            break;
          case snake2_entry:
            $player1_pos=snake2_exit
            $('myCanvas').css({'display':'flex'})
            break;
          case ladder1_entry:
            $player1_pos=ladder1_exit
            $('myCanvas').css({'display':'flex'})
            break;
          case ladder2_entry:
            $player1_pos=ladder2_exit
            $('myCanvas').css({'display':'flex'})
            break;
          // case ladder3_entry:
          //   $player1_pos=ladder3_exit
          //   $('myCanvas').css({'display':'flex'})
          //   break;
        
          default:
            break;
        }
        $player1.appendTo(`#${$player1_pos}`)
        nextplayer = 'player2' 
        console.log($player1_pos)
      }
      if (turn == 'player2') {
        $('#player-tag').text('Player 1')
        $player2_pos += dice_value
        if($player2_pos == 4){
          $player2_pos=20
        }
        $player2.appendTo(`#${$player2_pos}`)
        nextplayer = 'player1'
        console.log($player2_pos)
      }
      //console.log(nextplayer)
      haswon()
      dbupdate()
    }
  
    function dbupdate(){
      console.log(res)
  
      res.map(data=>{
        game_id = data.game_id
      })
      data = {
        game_id:game_id,
        turn: nextplayer,
        player1_pos:$player1_pos,
        player2_pos:$player2_pos,
      }
      //console.log(data)
      $.post("gameupdate.php",
      data,
      function(response){
        console.log(response)
        res = JSON.parse(response)
        res.map(val=>{
          turn = val.turn
        })  
      }
     )
    }
  
    function haswon () {
      if ($player1_pos >= 36) {
        res.map(data=>{
          game_id = data.game_id
          $player1 = data.player1
        })
        data = {
          game_id:game_id,
          turn:nextplayer,
          player1_pos:$player1_pos,
          player2_pos:$player2_pos,
          winner:$player1,
        }
        console.log(data)
        $.post("win.php",
        data,
       )
        alert('Player 1 has won!')
      } else if ($player2_pos >= 36) {
        res.map(data=>{
          game_id = data.game_id
          $player2 = data.player2
        })
        data = {
          game_id:game_id,
          turn:nextplayer,
          player1_pos:$player1_pos,
          player2_pos:$player2_pos,
          winner:$player2,
        }
        console.log(data)
        $.post("win.php",
        data,
       )
        alert('Player 2 has won!')
      }
    }
  })
  
  $('#reset').click(resetGame)
  function resetGame () {
    var $die = $('#dice-value')
      $die.val(0)
    $player1_pos = 1
    $player2_pos = 1
    console.log($('#1').position())
    $('#person1').css({'position':$('#1').position()})
    $('#person2').css({'position':$('#1').position()})
    resetPosition($player1, $player2) 
  function resetPosition ($player1, $player2) {
    $('#1').append($player1) 
    $('#1').append($player2)
  }
  res.map(data=>{
    game_id = data.game_id
  })
  data = {
    game_id:game_id
  }
  console.log(data.game_id)
  $.post("gamereset.php",
  data,
  function(response){
    console.log(response)
  }
   )
  }
  
  
  
  
  function createTable () {
    var $board = $('#board')
    var id = 36
    var rowClass = 6
    for (var r = 0; r < 6; r++) {
      var $row = $('<tr>') 
      $row.attr('class', rowClass--) 
  
      for (var c = 0; c < 6; c++) {
        var $column = $('<td>')
        $column.css({ 'width': '800px', 'height': '0px', padding:'20px'})
        $column.attr('id', id--) 
  
        $column.attr('id') % 2 === 0 ? $column.css('backgroundColor', '#ffff00') : $column.css('backgroundColor', 'white') // giving grid bg colors.
  
        $row.each(function() {
          $(this).attr('class') % 2 === 0 ? $row.append($column) : $row.prepend($column)
        })
        $column.html(id + 1).addClass('cell')
      }
      $board.append($row)
    }
  }
  createTable()
  
  
  
  snake1_entry = 28
  snake1_exit = 20
  snake2_entry = 34
  snake2_exit = 22
  ladder1_entry = 19
  ladder1_exit = 33
  ladder2_entry = 21
  ladder2_exit = 31
  // ladder3_entry = 21
  // ladder3_exit = 32
  
  var snake1_entry_pos = $(`#${snake1_entry}`).position()
  var snake1_exit_pos = $(`#${snake1_entry}`).position()
  console.log(snake1_entry_pos)
  
  var canvas = document.getElementById("myCanvas");
  var snake1 = canvas.getContext("2d");
  var snake2 = canvas.getContext("2d");
  var ladder1 = canvas.getContext("2d");
  var ladder2 = canvas.getContext("2d");
  var ladder3 = canvas.getContext("2d");
  snake1.beginPath()
  snake1.moveTo(100,90);
  snake1.lineTo(700,800);
  snake1.strokeStyle = "#fa2b07";
  snake1.stroke();
  
  // snake2.moveTo(20,10);
  // snake2.lineTo(100,1500);
  // snake2.stroke();
  
  // ladder1.moveTo(100,30);
  // ladder1.lineTo(900,800);
  // ladder1.stroke();
  
  // ladder2.moveTo(230,20);
  // ladder2.lineTo(0,200);
  // ladder2.stroke();
  
  clicked = 1
  $('#showlead').click(showleaderboard)
  function showleaderboard(){
    if(clicked%2!=0){
      $('#leaderboard').css({'display':'flex'})
      //return clicked+=1
    }
    else{
      $('#leaderboard').css({'display':'none'})
    }
    return clicked+=1
  
      
    //clicked = false
    //$('#leaderboard').css({'display':'none'})
  
    //clicked = false
  }
  