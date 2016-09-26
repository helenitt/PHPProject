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
    
      <h3>Amend Question</h3>

      <form action="amendUpdatedQuestion.php" method="post">
        <fieldset>
          
                          
<?php
$qid = $_POST['record'];
if ($qid == ''  and !is_numeric($qid))
{
echo("You did not complete the insert form correctly <br>");
exit();
} 
else
{
// Connect to the database server
$dbcnx = mysqli_connect("localhost", "root", "", "t");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();
}

$sql = "SELECT * FROM quests WHERE qid = $qid";

$res = mysqli_query($dbcnx, $sql);

if ( !$res ) {
  echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
  exit();
}
    while ($row = mysqli_fetch_array($res)) {
      echo("<br>");  
?>
          <input type="text" name="qid" value="<?php echo $qid; ?>">  <label class="lab" >Please select question level</label>&nbsp;&nbsp;
             <select name="lvl">
               <option selected="selected" value="b">Basic</option>
               <option value="i">Intermediate</option>
               <option value="a">Advanced</option>
             </select>
          <br><br>
              
          <label>Question Text: </label><br>    
          <input type="text" name="qtxt" value="<?php echo $row['qtxt']; ?>" size="60px"> <br><br>
          
          <label>First Answer Text: </label><br>
          <input type="text" name="a1" value="<?php echo $row['a1']; ?>" size="60px"> <br><br>
    
          <label>Second Answer Text: </label><br>
          <input type="text" name="a2" value="<?php echo $row['a2']; ?>" size="60px"> <br><br>
    
          <label>Third Answer Text: </label><br>
          <input type="text" name="a3" value="<?php echo $row['a3']; ?>" size="60px"> <br><br>
    
          <label>Correct Answer: </label><br>
          <input type="text" name="qcorans" value="<?php echo $row['corans']; ?>" size="60px"> <br>

          <br><br>
    
          <input type="Submit" name="updatedetails" value="Update">  <br><br>
        </fieldset>
      </form>
     
<?php
} 
//free results
mysqli_free_result($res);
  
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