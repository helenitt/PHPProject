<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>Take Test - Star Software</title>
    <meta charset='utf-8'>
    <meta name='description' content='Star Software, Tralee, Kerry, Ireland, 00 353 66 7112345'>
    <meta name='keywords' content='Software tutorial system, course, assessment test, business training, internal advancement'><!-- tailored for this specific page of website-->
    <meta name='author' content="Helen O'Brien T00183586">
    <meta name='robots' content='all'>
    <meta name='viewport' content='width=device-width'>
    <!-- <meta http-equiv='X-UA-Compatible' content='IE=edge'> -->
    <link rel='stylesheet' href='star.css' type='text/css' />
    <link href="favicon.ico" rel="icon"/> 
    <link href="favicon.ico" rel="shortcut icon"/>

<script type="text/javascript" src="star.js">
    
</script>
  </head>
  <body onload="var changeImages=setInterval('homes()',2000);">

    <div id="header">
      <img src="images/star1.png"  alt="Star Software Logo" title="Star Software Logo" width="146" height="150" />
      <h1>STAR &nbsp;SOFTWARE</h1>
    </div>
       
    <div id="nav">
      <ul>
        <li><a href="index.html" class="active">Star Software</a></li>
        <li><a href="">Business</a></li>
        <li><a href="">Eduction</a></li>
        <li><a href="">Contact Us</a></li>
      </ul>
    </div>
    
    <div id="sidebar" class="hide-mobile">
    
   <!--    <br><br>
      
     <img src="images/slogan1.jpg" alt="Irish Castles and Cottages" title="Irish Castles and Cotteges" />
      
      <br><br>  -->
           
      <br>
      
      <ul class="sidebarlink">
        <li class="sbl">Process Students</li>
          <li>Register Student</li>
          <li>Amend Student</li>
          <li>Delete Student</li>
        <br><br>
        <li class="sbl">Process Questions</li>
          <li><a href="addQuestion.html">Create Question</a></li>   
          <li><a href="amendSearchQuestion.php">Amend Question</a></li>
          <li><a href="delQuestion.php">Delete Question</a></li>
        <br><br>
        <li class="sbl">Manage Tests</li>
          <li><a href="takeTest.html">Take Test</a></li>
          <li>Review Test</li>
          <li>Test Profile</li>
        <br><br>
      </ul>
      
    </div>
    
    <div id="content">
    
      <h3>Take Test</h3>
            
      <form name="taketest" method="post" action="takeTestQ3.php">    
        <fieldset>          

<?php

if($_POST['quetion2'] == "Next Question")  //DO I NEED ISSET UP HERE TO
{
$dbcnx = mysqli_connect("localhost", "root", "", "t");

if (mysqli_connect_errno($dbcnx ))
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
exit();
}
  $score=0;
  if(isset($_POST['quetion2'])) {

  $selected_radio = $_POST['Q1']; 
    if($selected_radio == $_POST['correct']) {        
        $score += 33;
    }    
    else if($selected_radio == $_POST['correct']) {      
        $score += 33;
    }
    else if($selected_radio == $_POST['correct']) {      
        $score += 33;
    }
  }

//Insert question tid, qid into tqs NEEDS , ansgiven  
$testid = $_POST['tid'];
$questid = $_POST['qid']; 
                                                 
$sqlinserttestquestion = "INSERT INTO tqs(tid,qid) VALUES($testid,$questid)"; 
            
$resinserttestquestion = mysqli_query($dbcnx, $sqlinserttestquestion);

if ($resinserttestquestion == 0) 
      {
        echo("<p>Error registering Test Question: " . mysqli_error($dbcnx) . "</p>");
      }


//GENERATE RANDOM NUMBER

//$rand = (int)(rand(24, $res));  // Object of class mysqli_result could not be converted to int in C:\xampp\htdocs\project\takeTest.php on line 98

$rand1 = $_POST['qid']; 
$rand2 = (rand(24, 32));

//REPEAT NUMBERS CHECK
while($rand2 == $rand1) {
  $rand2 = (rand(24, 32));
}

//NEED TO STOP REPEAT NUMBERS 
 
//GET QUESTION
$sqlgetquest = "SELECT * FROM quests WHERE qid = $rand2";

$result = mysqli_query($dbcnx, $sqlgetquest);

if ( !$result ) {
  echo('Query failed ' . $sqlgetquest . ' Error:' . mysqli_error($dbcnx));
  exit();
}
    while ($row = mysqli_fetch_array($result)) {
            
      echo("<br><h4>Question 2</h4>");    

?>
            
            <label><?php echo $row['qtxt']; ?></label><br><br>
            
            <input type="radio" name="Q2" value="<?php echo $row['a1']; ?>">&nbsp;&nbsp;  
            <label><?php echo $row['a1']; ?></label><br>
            
            <input type="radio" name="Q2" value="<?php echo $row['a2']; ?>">&nbsp;&nbsp;  
            <label><?php echo $row['a2']; ?></label><br>
            
            <input type="radio" name="Q2" value="<?php echo $row['a3']; ?>">&nbsp;&nbsp;  
            <label><?php echo $row['a3']; ?></label><br>
            
            <br><br>  
            
            <input type="text" name="correct" value="<?php echo $row['corans']; ?>" hidden="" >&nbsp;&nbsp;
            <input type="text" name="tid" value="<?php echo $testid; ?>" hidden="" >&nbsp;&nbsp;
            <input type="text" name="qid" value="<?php echo $rand2; ?>" hidden="" >&nbsp;&nbsp;
            <input type="text" name="rand1" value="<?php echo $rand1; ?>" hidden="" >&nbsp;&nbsp;            
            <input type="text" name="score" value="<?php echo $score; ?>" hidden="" >
            <br>
            
            <input type="submit" name="question3" value="Next Question" />
                        
            <br><br><br>  
        </fieldset>
        </form>
            
<?php


}
 
//free results
//mysqli_free_result($resinserttestquestion);
mysqli_free_result($result);  
//close connection
mysqli_close($dbcnx);
}
?>

    </div>
    
    <div class="clear"></div>
    
    <div id="footer">
      <ul>
        <li><a href="">Star Software</a></li>
        <li><a href="">Business</a></li>
        <li><a href="">Education</a></li>
        <li><a href="">Contact</a></li>
        <li><a href="">Legal</a></li>
        <li><a href="">Site Map</a></li>
      </ul>        

      <p class="cbv">
      <a href="http://www.clearblueview.net/" target="_blank">Design by Clear Blue View</a>
      </p>
      <br>
    </div>
    
  </body>
</html>