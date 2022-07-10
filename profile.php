
<?php
if(!isset($_SESSION)) { 
session_start();

}

include "auth.php";
include "header_voter.php";
include "connection.php";


?>
<left>
<h1> Welcome <?php echo $_SESSION['SESS_NAME']; ?> </h1>
</left>
<?php


$username = $_SESSION['SESS_NAME'];
$query = 'SELECT status FROM voters WHERE username="'.$_SESSION['SESS_NAME'].'" AND status = "VOTED"';
if ($result = mysqli_query($con,$query)) {
if (mysqli_num_rows($result) > 0) {
$sql = mysqli_query($con, 'SELECT voted from voters WHERE username="'.$_SESSION['SESS_NAME'].'"');
$row = mysqli_fetch_assoc($sql);

        echo "You have voted for: " . " " . $row['voted'];
    } else {
        echo "You have not voted yet. Please submit your vote!";
            

    }
    
}


?>
<!DOCTYPE html>

            <!-- Right Nav Section -->
            <ul class="right">
            
             
               <li><a href="upload.php" data-reveal-id="uploadModal" data-reveal-ajax="true">Add Photo</a></li>
         
			   
            </ul>
         </section>
      </nav>
      <br/>
     
            <?php
            if(isset($_GET['success'])) {
            if($_GET['success']=="yes"){?>
            <div class="row">
               <div class="small-6 large-6 columns">
                  <div data-alert class="alert-box success radius ">
                     Image "<?= $_GET['title']; ?>" uploaded successfully.
                     <a href="#" class="close">&times;</a>
                  </div>
               </div>
            </div>
            <?php } else {?>
             <div class="row">
               <div class="small-6 large-6 columns">
                  <div data-alert class="alert-box alert radius ">
                     There was a problem uploading the image.
                     <a href="#" class="close">&times;</a>
                  </div>
               </div>
            </div>
            <?php } }?>
            <ul class="clearing-thumbs small-block-grid-1 medium-block-grid-2 large-block-grid-4" data-clearing>
               <?php
               require 'connection.php';
               $stmt = $con->query("SELECT * FROM upload_image ORDER by img_id ASC");
               foreach ($stmt as $img) {
               ?>
               <li>
                  <a href="<?= $img['img_path']; ?>">
                  <img data-caption="<?= $img['img_title']; ?>" src="<?= $img['img_path']; ?>"></a>
               </li>
               <?php } ?>
            </ul>
         </div>
      </div>
      <!--End content-->
      <!--MODALS-->
      <div id="uploadModal" class="reveal-modal tiny" data-reveal></div>
      <!--END MODALS-->
      <div id="footer">
         <hr/>
        
         </div>
      </div>
      </div>
      <script src="js/foundation.min.js"></script>
      <script src="js/sticky-footer.js"></script>
      <script src="js/foundation/foundation.topbar.js"></script>
      <script src="js/foundation/foundation.reveal.js"></script>
      <script src="js/foundation/foundation.abide.js"></script>
      <script>
         $(document).foundation();
      </script>
   </body>
</html>


<?php
 include "footer.php";
 
 ?>
 

 