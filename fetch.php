<?php
  
  $conn = mysqli_connect('localhost','root','','polltest1');
  $request=$_POST['request'];
  $query="Select * from candidates where votecount<'$request'";
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