

<?php include "header.php";
session_start();
if (isset($_SESSION['SESS_NAME'])!="") {
	header("Location: voter.php");
}
?>
<?php global $msg; echo $msg;?>


<p><center><legend><font color='black' size='18'>This system allows all registered users to vote for their favorite President.</p>
<img src="img/vote.png" width="150" height="150" alt="">
<p>In order to make a vote you have to register first and then login.</font></legend></center>
    <p>&nbsp;&nbsp;</p>
<?php include "footer.php";?>

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
