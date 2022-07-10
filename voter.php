<?php
if(!isset($_SESSION)) { 
session_start();
}
include "auth.php";
include "header_voter.php"; 

?>
<h4> Welcome <?php echo $_SESSION['SESS_NAME']; ?> </h4>
<h3>Make a Vote </h3>
<form action="submit_vote.php" name="vote" method="Post" id="myform" >
<center><font size='6'> What is your favorite President? <BR>
<input type="radio" name="candidates" value="Joe Walsh">Joe Walsh<BR>
<input type="radio" name="candidates" value="Bill Weld"> Bill Weld<BR>
<input type="radio" name="candidates" value="Donald John Trump"> Donald Trump<BR>
<input type="radio" name="candidates" value="Andrew Yang"> Andrew Yang<BR>
<img src="img/Vote.png" width="150" height="150" alt=""
</font></center><br>
<?php global $msg; echo $msg; ?>
<?php global $error; echo $error; ?>
<center><input type="submit" value="Submit Vote" name="submit" style="height:30px; width:100px" /></center>
</form>
