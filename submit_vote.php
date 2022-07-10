<?php
include "connection.php";
session_start();
if(empty($_POST['candidates'])){
$error="<center><h4><font color='#FF0000'>Please select a Candidates to vote!</h4></center></font>";
include"voter.php";
exit();
}
$candidates = $_POST['candidates'];
$sess = $_SESSION['SESS_NAME'] ;
$candidates = addslashes($_POST['candidates']);
$candidates = mysqli_real_escape_string($con, $candidates);
$sql = mysqli_query($con, 'SELECT * FROM voters WHERE username="'.$_SESSION['SESS_NAME'].'" AND status="VOTED"');
if(mysqli_num_rows($sql) > 0 ) {
	$msg="<center><h4><font color='#FF0000'>You have already been voted, No need to vote again</h4></center></font>";
		include 'voter.php';
		exit();	
}
else{
$sql1 =mysqli_query($con, 'UPDATE candidates SET  votecount=votecount+1 WHERE fullname ="'.$_POST['candidates'].'"');
$sql2 =mysqli_query($con, 'UPDATE voters SET status="VOTED" WHERE username="'.$_SESSION['SESS_NAME'].'"');
$sql3 = mysqli_query($con, 'UPDATE voters SET voted= "'.$_POST['candidates'].'" WHERE username="'.$_SESSION['SESS_NAME'].'"');
	if(!$sql1 && !$sql2){
	die("Error on mysql query".mysqli_error());
	}
	else{
	$msg="<center><h4><font color='#FF0000'>Congratulation, you have made your vote.</h4></center></font>";
	include 'voter.php';
	exit();
	}
}
?>
