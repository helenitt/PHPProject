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
<?php
if($_POST['submittest'] == "Submit Test")  
{
$dbcnx = mysqli_connect("localhost", "root", "", "t");

if (mysqli_connect_errno($dbcnx ))
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
exit();
}

$score = $_POST['score']; 

  if(isset($_POST['submittest'])) { 
  $selected_radio = $_POST['Q3']; 
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
    

if($score == 99) {
  $score = 100;
}
      
//Insert question answer into tqs NEEDS tid, qid, ansgiven  
$testid = $_POST['tid'];
$questid = $_POST['qid']; 
                                                 
$sqlinserttestquestion = "INSERT INTO tqs(tid,qid) VALUES($testid,$questid)"; 
            
$resinserttestquestion = mysqli_query($dbcnx, $sqlinserttestquestion);

if ($resinserttestquestion == 0) 
      {
        echo("<p>Error registering Test Question: " . mysqli_error($dbcnx) . "</p>");
      }

//Insert score into tests                                                         
$sqlinserttest = "UPDATE tests SET tscore = $score WHERE tid = $testid";            
$resinserttest = mysqli_query($dbcnx, $sqlinserttest);

$testid = mysqli_insert_id($dbcnx); //To get testid 

if ($resinserttest == 0) 
      {
        echo("<p>Error registering Test: " . mysqli_error($dbcnx) . "</p>");
      }

//mysqli_free_result($resinserttestquestion);
}      
?>
    <div id="content">
    
      <h3>Take Test</h3>
            
      <form name="compiletest" method="post" action="takeTestQ1.php">
        <fieldset>          

            <br><br>      
            
            <label class="lab" ><h3>Your Test Result is:- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo $score; ?>%</h3></label>
            
            <br><br>
            
            <label class="lab" ><h4>To take another test carry on</h4></label>
            
            <br><br>      
            
            <label>Please enter your student ID</label>&nbsp;&nbsp;&nbsp;
            <input type="text" name="studid" autofocus ><br><br>

            
            <label class="lab" >Please select question level</label>&nbsp;&nbsp;
            <select name="lvl">
              <option selected="selected" value="b">Basic</option>
              <option value="i">Intermediate</option>
              <option value="a">Advanced</option>
            </select>               

            <br><br><br>             
            
            <input type="submit" name="compile" value="Compile Test">
            <br><br><br>  
        </fieldset>
        </form>
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