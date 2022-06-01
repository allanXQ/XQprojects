<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title></title>
    <style media="screen">
      td{margin-right: 10px;}
    </style>
  </head>
  <body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include('conn.php');

  $sql = "SELECT * FROM voters";
$result = $con->query($sql);
$con->close();
?>
  <table class='table table-bordered'>
    <thead>
      <tr>
        <th>Phone</th>
        <th>president</th>
        <th>governor</th>
        <th>Senator</th>
      </tr>
    </thead>
    <tbody>
      <!-- PHP CODE TO FETCH DATA FROM ROWS-->
      <?php   // LOOP TILL END OF DATA
          while($rows=$result->fetch_assoc())
          {
            ?>

      <tr>
          <!--FETCHING DATA FROM EACH
              ROW OF EVERY COLUMN-->
          <td ><?php echo $rows['phone'];?></td>
          <td><?php echo $rows['president']; ?></td>
          <td><?php echo $rows['governor'];?></td>
          <td><?php echo $rows['senator'];?></td>

      </tr>
      <?php
          }
       ?>
    </tbody>
  </table>
</div>
  </body>
</html>
