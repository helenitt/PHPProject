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
    alert('Hhgi');
function recordValues(option) {
    var ansGiven = option;
    alert('Hi');
    document.takeTest.ansgiven.value =  ansGiven;
}   
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
            
      <form name="taketest" method="post" action="takeTestQ2.php">    
        <fieldset>          

<?php

if($_POST['compile'] == "Compile Test")  
{
$dbcnx = mysqli_connect("localhost", "root", "", "t");

if (mysqli_connect_errno($dbcnx ))
{
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();
}
//From previous page - takeTest.html
$studid = $_POST['studid'];
$lvl = $_POST['lvl'];
//Create Test for Id and Date Taken

$dttaken = date("Y-m-d"); 

//This is for counting the number of rows in order to know what range to generate the random number - not being used at the moment
$sqlcountq = "SELECT COUNT(*) FROM quests";

$rescountq = mysqli_query($dbcnx, $sqlcountq);

if ( !$rescountq ) {
  echo('Query failed ' . $sqlcountq . ' Error:' . mysqli_error($dbcnx)); 
  exit();
}

//Insert date taken and student id                                                          
$sqlinserttest = "INSERT INTO tests(dttaken, sid) VALUES('$dttaken', $studid)"; 
            
$resinserttest = mysqli_query($dbcnx, $sqlinserttest);

$testid = mysqli_insert_id($dbcnx); //To get testid 

if ($resinserttest == 0) 
      {
        echo("<p>Error registering Test: " . mysqli_error($dbcnx) . "</p>");
      }

//GENERATE RANDOM NUMBER

//$rand = (int)(rand(24, $res));  // Object of class mysqli_result could not be converted to int in C:\xampp\htdocs\project\takeTest.php on line 98

$rand1 = (rand(24, 32));
              
              
//GET QUESTION
$sqlgetquest = "SELECT * FROM quests WHERE qid = $rand1";

$result = mysqli_query($dbcnx, $sqlgetquest);

if ( !$result ) {
  echo('Query failed ' . $sqlgetquest . ' Error:' . mysqli_error($dbcnx));
  exit();
}
  while ($row = mysqli_fetch_array($result)) {            
    echo("<br><h4>Question 1</h4>");    

?>
          
            <label><?php echo $row['qtxt']; ?></label><br><br>
            
            <input type="radio" name="Q1" id="q1a1" value="<?php echo $row['a1']; ?>" onclick="recordValues(Q1A1)" >&nbsp;&nbsp;  
            <label><?php echo $row['a1']; ?></label><br>
            
            <input type="radio" name="Q1" id="q1a2" value="<?php echo $row['a2']; ?>" onclick="recordValues(Q1A2)">&nbsp;&nbsp;  
            <label><?php echo $row['a2']; ?></label><br>
            
            <input type="radio" name="Q1" id="q1a3" value="<?php echo $row['a3']; ?>" onclick="recordValues(Q1A3)" >&nbsp;&nbsp;  
            <label><?php echo $row['a3']; ?></label><br>
            
            <br><br>
            
            <input type="text" name="correct" value="<?php echo $row['corans']; ?>" hidden="" >&nbsp;&nbsp;
            <input type="text" name="tid" value="<?php echo $testid; ?>" hidden="" >&nbsp;&nbsp;
            <input type="text" name="qid" value="<?php echo $rand1; ?>" hidden="" >&nbsp;&nbsp;
            <input type="text" name="ansgiven" id="ansgiven" value=""  >&nbsp;&nbsp;
            <br>  
            
            <input type="submit" name="quetion2" value="Next Question" />
                        
            <br><br><br>  
        </fieldset>
        </form>
<?php
}
 
//free results

mysqli_free_result($rescountq);
mysqli_free_result($result);
//mysqli_free_result($resinserttest);
  
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