
<?php
if(!isset($_SESSION)) { 
session_start();
}
include "auth.php";
include "header_voter.php";
?>

<center><font size='5'><h3> Voting So Far  </h3></center>
<?php
include "connection.php";
$member = mysqli_query($con, 'SELECT * FROM Candidates' );
if (mysqli_num_rows($member)== 0 ) {
	echo '<font color="red">No results found</font>';
}
else {
	echo '<center><table><tr bgcolor="#FF1655">
<td width="120px ">ID</td>		
<td width="120px  ">candidates</td>
<td width="120px  ">ABOUT</td>
<td width="120px ">VOTE</td>
</tr>';
while($mb=mysqli_fetch_object($member))
		{	
			$id=$mb->candidates_id;
			$name=$mb->fullname;
			$about=$mb->about;
			$vote=$mb->votecount;
			echo '<tr bgcolor="#BBBEFF">';
	echo '<td>'.$id.'</td>';		
	echo '<td>'.$name.'</td>';
	echo '<td>'.$about.'</td>';
	echo '<td>'.$vote.'</td>';
	echo "</tr>";
		}
		echo'</table></center>';
	}
?>
<style>
table
{
  border-collapse: collapse;
    width: 600px;
}
th
{

}
tr{

}
td
{
  padding: 10px 20px 10px 20px;
}
    select
    {
        padding: 10px 20px 10px 20px;
        margin: 10px;
        font-size: 18px;
        display: inline-block;
        
    }
    option 
    {
        padding: 10px 20px 10px 20px;
    }
    #ab
    {
        font-size: 18px;
        display: inline-block;
    }
</style>
<script src="jquery.js"></script>
<script>
    $(document).ready(function()
                     {
        $("#fetchval").on('change',function()
                         {
            var keyword = $(this).val();
            $.ajax(
            {
                url:'fetch.php',
                type:'POST',
                data:'request='+keyword,
                
                beforeSend:function()
                {
                    $("#table-container").html('Working...');
                    
                },
                success:function(data)
                {
                    $("#table-container").html(data);
                },
            });
        });
    });
    
</script>
<h3> Filter Table According to votes:</h3>
<div id="ab">Fetch Results that are:</div><select id="fetchval" name="fetchby" >
    <option value="10">less than 10</option>
    <option value="20">less than 20</option>
    <option value="30">less than 30</option>
    <option value="40">less than 40</option>
</select>
<br>
<br>
<div id="table-container">
<?php
  $conn = mysqli_connect('localhost','root','','polltest');
  $query="select * from Candidates Where votecount='$vote'";
  $output=mysqli_query($conn,$query);
echo '<table border="1"';
    echo '<tr>
      <th>ID</th>
      <th>Candidates</th>
      <th>About</th>
      <th>Vote</th>
    </tr>';
    for($i=0;$i<mysqli_num_rows($output);$i++)
    {$fetch = mysqli_fetch_assoc($output);
    
      echo '<tr>';
      echo '<td>'.$fetch['candidates_id'].'</td>';
      echo '<td>'.$fetch['fullname'].'</td>';
      echo '<td>'.$fetch['about'].'</td>';
      echo '<td>'.$fetch['votecount'].'</td>';
      echo '</tr>';
    
  };
echo '</table>';
 ?>

</div>