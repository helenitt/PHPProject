<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>Delete Question - Star Software</title>
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
    
      <h3>Delete Question</h3>
            
      <form name="deleteQuestion" action="deletedconfQuestion.php" method="post">
        <fieldset>          
          <br>
<?php
// Show simple format of the records so person can choose the reference name/number
// this is then passed to the next page, for all details

$dbcnx = mysqli_connect("localhost", "root", "", "t");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}

$sql ="SELECT * FROM quests";

$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
        exit();
    }

	else
	{
  
  if(mysqli_num_rows($res)< 1){
  //there are no questions
  $display_block = "<p><em> No questions saved</em></p>";  }
  else
  {
echo "<table border=1>";
echo "<tr><td><b>&nbsp; Quest Id: &nbsp;</b></td>
<td>&nbsp; Question Text: &nbsp;</td><td>&nbsp; Correct Answer: &nbsp;</td></tr>";

while ($row = mysqli_fetch_array($res)) {

echo ("<tr><td>");
echo $row['qid'];
echo("</td><td>");
echo $row['qtxt'];
echo("</td><td>");
echo $row['corans'];
echo("</td></tr>");
} 
echo "</table>";

}  

 //free results
  mysqli_free_result($res);
  
  //close connection
  mysqli_close($dbcnx);}
?>
         <table width="400" border="0" cellspacing="1" cellpadding="2">
            <tr><br>             
              <td width="100">Question ID</td>
              <td><input type="text" name="qid"></td>
              <td>
              <input type="submit" name="delete" value="Delete"></td><br>
            </tr>
          </table>

         
<?php  
if (isset($_POST['delete']) == "Delete") 
{
if ($_POST['delete'] == "Delete") {
$qid = $_POST['qid'];

if ($qid == '' or !is_numeric($qid))
{
  echo ("You did not complete the delete form correctly <br>");
}
else {
  $dbcnx = mysqli_connect("localhost", "root", "", "t");
  if (mysqli_connect_errno($dbcnx )){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
  $sql = "DELETE from quests WHERE qid = $qid";
  $res = mysqli_query($dbcnx, $sql);
  
  if($res){
		$count = mysqli_affected_rows($dbcnx);
	} 
	if($count>0){
  echo("<meta http-equiv='refresh' content='1'>");
    echo("Question No " . " " . $qid . " " . "has been successfully deleted.");
  }
  else {
    echo "No such record found!";
  }
  mysqli_close($dbcnx);	
}}	
}
?>          
          
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