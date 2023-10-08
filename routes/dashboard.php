<?php
  session_start();
  if(!isset($_SESSION['userdata'])){
    header("location../");
  }
  $userdata = $_SESSION['userdata'];
  $groupsdata=$_SESSION['groupsdata'];

  if($_SESSION['userdata']['status']==0){
    $status='<b style="color: red">Not Voted</b>';
  }
  else{
    $status='<b style="color: Green">Voted</b>';
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CR Selection System</title>
    <link rel="stylesheet" href="../css/dashboard.css">

</head>
<body>
<div id="mainp">
<div id="header">
    <button id="b1"><a style="text-decoration:none; color:white;" href="../">Back</button></a>
    <button id="b2"><a style="text-decoration:none; color:white;"href="logout.php">Logout</button></a>
    <h1>Class Representive Selection System</h1>
  </div>
  

    <div id="profile">
    <center><h3>Your Profile</h3>
        <img src="../uploads/<?php echo $userdata['photo'] ?>" height="200" widht="200"></center><br>
        <b>Name: </b><?php echo $userdata['name'] ?><br><br>
        <b>Mobile: </b><?php echo $userdata['mobile'] ?><br><br>
        <b>Address: </b><?php echo $userdata['address'] ?><br><br>
        <b>Status: </b><?php echo $status ?><br><br></div>

    </div>
    
    
    <div id="Group">
      <center><h2>Voting Poll</h2></center>
      <?php
      if($_SESSION['groupsdata']){
          for($i=0;$i<count($groupsdata);$i++){
            ?>
          <div class="groupdata">
            <br>
              <img src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="100">
            <b>Candidate Name: </b><?php echo $groupsdata[$i]['name']?><br><br>
            <b>Votes: </b><?php echo $groupsdata[$i]['votes']?><br><br>

            <form action="../api/vote.php" method="POST">
              <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
              <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
              <?php
              if($_SESSION['userdata']['status']==0){
                ?>
                <input type="submit" id="votebtn"name="votebtn" value="Vote">
                <?php

              }
              else{
                ?>
                <button disabled id="Votedd" type="button" name="votebtn" value="Vote">Voted</button>
                <?php
              }
              ?>
              
                  
            </form>
            <br><hr><br>
          
          </div>
            
            
            <?php
          }

      }
      else{

      }
      ?>
    </div>
  </div>
  <div class="footer">&copy;<span> Anshul Mishra | All rights reserved.</span></div>

</body>
</html>