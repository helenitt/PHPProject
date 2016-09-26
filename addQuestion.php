<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>Add Question - Star Software</title>
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
        <li><a href="" class="active">Star Software</a></li>
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
  
      <h3>Create Question</h3>
            
      <form name="addQuestion" method="post" action="addQuestion.php">
        <fieldset> 
        
            <br><br>
        
            <label class="lab" >Please select question level</label>&nbsp;&nbsp;
            <select name="lvl">
              <option selected="selected" value="b">Basic</option>
              <option value="i">Intermediate</option>
              <option value="a">Advanced</option>
            </select>               

            <br><br>      
                        
            <label for="qtxt">Questoin Text:-</label>&nbsp;&nbsp;&nbsp;
            <input type="text" name="qtxt" ><br><br>
            
            <label for="a1">First Answer Text:-</label>&nbsp;&nbsp;&nbsp;
            <input type="text" name="a1"><br><br>
            
            <label for="a2">Second Answer Text:-</label>&nbsp;&nbsp;&nbsp;
            <input type="text" name="a2"><br><br>
            
            <label for="a3">Third Answer Text:-</label>&nbsp;&nbsp;&nbsp;
            <input type="text" name="a3"><br><br>
            
            <label for="corans">Correct Answer:-</label>&nbsp;&nbsp;&nbsp;
            <input type="text" name="corans"><br><br>

            <input type="submit" name="submitdetails" value="Submit" /><br><br>


<?php
if ($_POST['submitdetails'] == "Submit") 
{
$qlvl = $_POST['lvl'];      // Comes fron dropdown box
$qtxt = trim($_POST['qtxt']);
$qa1 = trim($_POST['a1']);                
$qa2 = trim($_POST['a2']);
$qa3 = trim($_POST['a3']);
$qcorans = trim($_POST['corans']);
$qcreated = date("Y-m-d");  

if ($qlvl == '' or $qtxt == '' or $qa1 == '' or $qa2 == '' or $qa3 == '' or $qcorans == '')    
{
echo ("<h3>You did not complete the insert form correctly</h3><br>");
exit();
} 
else
{
$dbcnx = mysqli_connect("localhost", "root", "", "t");

// Check connection
if (mysqli_connect_errno($dbcnx ))
{
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();
}
// Escape variables for security
$qlvl = mysqli_real_escape_string($dbcnx, $qlvl);   
$qtxt = mysqli_real_escape_string($dbcnx, $qtxt);   
$qa1 = mysqli_real_escape_string($dbcnx, $qa1);
$qa2 = mysqli_real_escape_string($dbcnx, $qa2);
$qa3 = mysqli_real_escape_string($dbcnx, $qa3);
$qcorans = mysqli_real_escape_string($dbcnx, $qcorans);
                                                                    

$sql = "INSERT INTO quests(lvl,qtxt,a1,a2,a3,corans,qcreated ) 
VALUES('$qlvl','$qtxt','$qa1','$qa2','$qa3','$qcorans','$qcreated' )";   
$res = mysqli_query($dbcnx, $sql);

if ($res == 0) 
      {
        echo("<p>Error registering: " . mysqli_error() . "</p>");
      }
else
      {
  echo("<h3>Your Question has been successfully created</h3>");    
      
      }
}mysqli_close($dbcnx);}	
?>             

        <br><br>
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