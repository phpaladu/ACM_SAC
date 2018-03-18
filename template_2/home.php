<?php
require '../open.php';
?>
<!DOCTYPE HTML>
<!--
	Hielo by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
	<?php

$inputyear=$_GET['year'];
$sql="SELECT * FROM Info WHERE year='$inputyear'";
$result = mysqli_query($dbConn,$sql);


$row = mysqli_fetch_array($result);
echo "<title>ACM SAC ".$row['year']."</title>";
?>
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li class="active"><?php echo '<a href="home.php?year='.$inputyear.'">' ?>Home</a></li>
          <li><?php echo '<a href="proceedings.php?year='.$inputyear.'">' ?> Proceedings</a></li>
          <li><?php echo '<a href="track_topics.php?year='.$inputyear.'">' ?>Track Topics</a></li>
          <li><?php echo '<a href="paper_submission.php?year='.$inputyear.'">' ?>Paper Submission</a></li>
          <li><?php echo '<a href="chairs.php?year='.$inputyear.'">' ?>Chairs</a></li>
          <li><?php echo '<a href="program_committee.php?year='.$inputyear.'">' ?>Program Committee</a></li>
          <li><?php echo '<a href="archives.php?year='.$inputyear.'">' ?>Archives</a></li>
				</ul>
			</nav>

		<!-- Banner -->

			<section class="banner full">
				<article>
					<?php
						$sql="SELECT * FROM Back_images WHERE year='$inputyear'";
							$result = mysqli_query($dbConn,$sql);
						$imagename='';
						if($result)
						{
							$imagerow = mysqli_fetch_array($result);
							$imagename=$imagerow['imagename'];
						}

						if(!empty($imagename)){
							echo '<img src="../background_images/'.$imagename.'"  />';
							

      					}
      					else
      					{echo '<img src="images/NIT-Calicut.jpg"  />';
        						
        				} ?> 
					<div class="inner">
						<header>
						<h6 style="font-size: 25px; text-transform: capitalize;">
						<?php 
            $decimal=$row['number']%10;
              
              if($decimal==1){
                $prefix='st';
              }
              elseif ($decimal==2) {
                # code...
                $prefix='nd';
              }
              elseif ($decimal==3) {
                # code...
                $prefix='rd';
              }
              else
              {
                $prefix='th';
              }

            echo '<a  style="color:white;"href="'.$row['url'].'" target="_blank">';
                 echo $row['number'].' '.$prefix;
          ?>
          ACM/ SIGAPP Symposium On Applied Computing</a></h6>
          <h2 ><?php echo '<a href="'.$row['url'].'"target="_blank" >' ?>ACM SAC <?php echo $row['year'];
          ?></a></h2>
          <h6 style="font-size: 25px; text-transform: capitalize;">Track On Cloud Computing</h6>
       
       
          <h6  style="font-size: 25px; text-transform: capitalize;" > <?php echo $row['city'].", ".$row['country'];
          ?></h6>
							<?php $month1 = date('F', strtotime($row['start_date']));
                $month2 = date ('F', strtotime($row['end_date']));
                $date1 = date("d", strtotime($row['start_date']));
                $date2 = date("d", strtotime($row['end_date'])); 
           if($month1==$month2){     
            echo '<h6 style="font-size: 25px; text-transform: capitalize;">'.$month1.' '.$date1.' - '.$date2.', '.$row["year"].'</h6>';
          }
          else
              {
                echo '<h6 style="font-size: 25px; text-transform: capitalize;">'.$month1.' '.$date1.' - '.$month2.' '.$date2.', '.$row["year"].'</h6>';
              }
            ?>
      
						</header>
					</div>
				</article>
				
			</section>

		
			</section>

		<div id="main" class="container" style="color: black">

				<!-- Elements -->
					<h2 id="elements" style="color: black"><b>ACM SAC <?php echo $row['year'];
          ?></b></h2>
					<div class="row 200%">
						<div class="6u 12u$(medium)">
						<?php
        $sql="SELECT * FROM Paras WHERE year='$inputyear' AND type='home'";
          $result = mysqli_query($dbConn,$sql);
          $pararow = mysqli_fetch_array($result);
            echo '<p style="text-align: justify;">'.$pararow['para']."</p>";
          
      ?>
      <?php
          $sql="SELECT * FROM Hosted_by WHERE year='$inputyear'";
          $result = mysqli_query($dbConn,$sql);
          if(mysqli_num_rows($result) > 0) {
           
           echo "<ul>";
           echo  "<p><b>The SRC Program is hosted by</b></p><br>";
          while($hostrow = mysqli_fetch_array($result))
          {
            echo '<li><a href="'.$hostrow['url'].'" target="_blank" >'.$hostrow['university_name'].", ".$hostrow['country']."</a></li>";
          }
          echo  "</ul><br>";
        }
          $sql="SELECT * FROM Sponsored_by WHERE year='$inputyear'";
          $result = mysqli_query($dbConn,$sql);
          if(mysqli_num_rows($result) > 0) {
           echo "<ul>";
            echo "<p><b>The SRC Program is sponsored by</b></p><br>";

          while ($sponrow=mysqli_fetch_array($result)){
              echo '<li><h1 style="font-size: 20px; text-transform: capitalize;">';
              echo '<a href="'.$sponrow['url'].'" target="_blank" >'.$sponrow['sponsor_name'].'</a>';
              echo "</h1></li>";
            }
            echo "</ul><br>";
         } 
?>
						</div>
						<div class="6u 12u$(medium)">
						<h3><b>Quick Links</b></h3>
								<div class="row">
									<div >
									
									<?php
      								$sql="SELECT * FROM Gallery WHERE year='$inputyear'";
      								$result = mysqli_query($dbConn,$sql);
      								if(mysqli_num_rows($result)>0){
            								echo '<dl>';
											echo '<h4><b>Gallery</b></h4>';
											echo '<dd>';
											echo '<p>Photos of conference are availiable <a href="gallery.php?year='.$inputyear.'">here</a>.</p>';
											echo '</dd>';
											echo '</dl>';
            							}
										
          								$sql="SELECT * FROM Important_dates WHERE year='$inputyear'";
          								$result = mysqli_query($dbConn,$sql);
          								if($result && mysqli_num_rows($result)>0){
          									echo '<h4><b>Important dates</b></h4>';
          									echo '<ul class="alt">';
											date_default_timezone_set('Asia/Kolkata');
										$today=new DateTime('');
          								while($datesrow = mysqli_fetch_array($result))
          								{
          									$notfdate=new DateTime($datesrow['start_date']);
          									
                                  if($today->format('Y-m-d')>$notfdate->format('Y-m-d'))
                                  {	
                                  echo '<li>'.$datesrow['activity'].' : <strike>'.$datesrow['start_date'].'</strike></li>';
                              		}
                              		else
                              		{
                              			echo '<li>'.$datesrow['activity'].' : '.$datesrow['start_date'].'</li>';
                              			
                              		}
           								 
          								}
          									echo '</ul>';
      									}
										?>
										<h4 ><b>Call for Papers</b></h4>
   <?php
    $sql="SELECT * FROM Files_table WHERE year='$inputyear'";
          $result = mysqli_query($dbConn,$sql);
          $filerow=mysqli_fetch_array($result);
          $pdflink="../pdf/".$filerow['pdf_name'];
   ?>
   <a href="<?php echo $pdflink; ?>" ><i class="fa fa-file-pdf-o" style="font-size:36px; "></i></a>	<br><br>
   			<h4 ><b>Venue</b></p>
   			<ul class="alt">
   			<li style="color: black">The conference will be held in - <br>
    <b> <?php echo $row['city'].", ".$row['country'];?> </b></li>
    </ul>
									</div>
									
								</div>
						</div>
					</div>
		</div>		


		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					
				</div>
				<div class="copyright">
					
				</div>
			</footer>
<?php
require '../close.php';
?>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>