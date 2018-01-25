<?php 
    include('server.php');

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }

/*
if ($_SESSION['roletype'] == '1') : 
    $query = "SELECT * FROM ria_user";
    $results = mysqli_query($db, $query);
    $trList = "";
    
      
    while($row=mysqli_fetch_array($results,MYSQLI_ASSOC)){  

      //$trList = <tr id="tr"$row['id'] ><td>$row['name']</td><td>$row['email']</td><td>$row['age']</td><td>$row['gender']</td>
      //<td><a data-id=$row['id']>edit</a><a data-id=$row['id']>view</a></td></tr>
      $trList .= "<tr id='tr".$row['id']."'><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['age']."</td><td>".$row['gender']."</td>

                  <td><i data-id=".$row['id']." class='fa fa-pencil-square-o editIcon'></i></td></tr>";  
     
   }
 endif
*/
?>

<!DOCTYPE html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Zhao FangLue 163389B</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <!--welcome font-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <!--Desc font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!--SNS icon-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link rel='stylesheet' id='camera-css'  href='css/camera.css' type='text/css' media='all'> 
    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">
    <link href="css/travel.css" rel="stylesheet">
    <link href="css/photoGallery.css" rel="stylesheet">
     <link href="css/footer.css" rel="stylesheet">

    <link href="css/jquery-sakura.css" rel="stylesheet" type="text/css">

<style>
  @font-face{font-family: Words;
  src: url('Pacifico.ttf')
  }
  h4
  {font-family:Words;}

   #map {
        height: 700px;
        width: 100%;
       }
</style>


    </head>
            <style type="text/css">body, a:hover {cursor: url(http://cur.cursors-4u.net/special/spe-3/spe302.ani), url(http://cur.cursors-4u.net/special/spe-3/spe302.png), progress !important;}</style><a href="http://www.cursors-4u.com/cursor/2011/02/19/cute-bow-tie-hearts-blinking-blue-and-pink-pointer.html" target="_blank" title="Cute Bow Tie Hearts Blinking Blue and Pink Pointer"><img src="http://cur.cursors-4u.net/cursor.png" border="0" alt="Cute Bow Tie Hearts Blinking Blue and Pink Pointer" style="position:absolute; top: 0px; right: 0px;" /></a>
   <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav" img src="img/heart.gif">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">

        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/ProfilePic.png" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ol class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#Komorebi">Komorebi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#Gallery">Gallery</a>
          </li>
          <?php  if ($_SESSION['roletype'] == '1') : ?>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#Admin">Admin</a>
            </li>
          <?php  endif ?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#Map">Map</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php?logout='1'">Logout</a>
            <img src="img/heart.gif"/>
          </li>
        </ol>
      </div>
    </nav>

    <div class="container-fluid p-0">


      <section class="resume-section p-3 p-lg-5  d-flex d-column" id="Komorebi">
        <div class="my-auto">
          <section>
            <h1 class="mb-0">Welcome to
              <span class="text-primary">Komorebi</span>
            </h1>
          </section>
              <div class="row">
                <div class="col-md-7">
                  <br><video width="100%" height="85%" poster="img/tn.png" controls>
                    <source src="img/video.mp4" type="video/mp4">
                  </video></br>
               </div>
                <div class="col-md-5">
                  <br><br><br><h3>About Me</h3>
                  <b style="#050404"><p><p><br><p><b style="color:#F660AB;">Welcome to my page everybody . </b></p>I am a student at NYP . My hobby is traveing around the world and taking photos of scenery to keep for myself and share with your guys . Most of this page would be me sharing photos that I've taken .  If you like this page, please consider donating to me .</b>
                    <br></br></p><b style="#000000"><br><ps style="color:#F660AB;">Please follow Hime~Chan on the SNS below. <p><h4 style="color:#F660AB;">Love you~~</h4></p></br></b></p>
                    <li class="list-inline-item">
                      <a href="https://www.facebook.com/KazamiFang" target="_blank">
                        <!--poistion-->
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <!--F icon-->
                          <i class="fa fa-facebook fa-stack-1x fa-inverse"></i> 
                        </span>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="https://twitter.com/LeSir_Derpy" target="_blank">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                        </span>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="https://www.linkedin.com/in/fanglue-zhao-7a9342152/" target="_blank">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i></p>
                        </span>
                      </a>
                    </li>
                  </br></br></br>
                  </ul>
                </div>
              </div>
     
      </section>
	<style>
		    #BGG {
		      border: #ff66a3;
		      background: url(img/Yuno.jpg);
		      background-repeat:no-repeat;
background-size:contain;
background-position:center;
		    }
		    </style>
<section id="BGG">
      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="Gallery">
        <div class="my-auto">
          <h2 class="mb-5">My Speical Gallery</h2>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <!--
                <img id="zoom_01" class="nypFade" height="400px" width="700px" src="vendor/elevatezoom-master/images/small/image1.png" data-zoom-image="vendor/elevatezoom-master/images/large/image1.jpg"/>

                <div id="gal1">
                 
                  <a id="image1Link" href="#" data-image="vendor/elevatezoom-master/images/small/image1.png" data-zoom-image="vendor/elevatezoom-master/images/large/image1.jpg">
                    <img id="zoom_03" class="zoom_03 image1Small" data-index="0" src="vendor/elevatezoom-master/images/thumb/image1.jpg" />
                  </a>

                  <a id="image2Link" href="#" data-image="vendor/elevatezoom-master/images/small/image2.png" data-zoom-image="vendor/elevatezoom-master/images/large/image2.jpg">
                    <img id="zoom_03" class="zoom_03 image2Small" data-index="1" src="vendor/elevatezoom-master/images/thumb/image2.jpg" />
                  </a>

                  <a id="image3Link" href="#" data-image="vendor/elevatezoom-master/images/small/image3.png" data-zoom-image="vendor/elevatezoom-master/images/large/image3.jpg">
                    <img id="zoom_03" class="zoom_03 image3Small" data-index="2" src="vendor/elevatezoom-master/images/thumb/image3.jpg" />
                  </a>

                  <a id="image4Link" href="#" data-image="vendor/elevatezoom-master/images/small/image4.png" data-zoom-image="vendor/elevatezoom-master/images/large/image4.jpg">
                    <img id="zoom_03" class="zoom_03 image4Small" data-index="3" src="vendor/elevatezoom-master/images/thumb/image4.jpg" />
                  </a>
              -->

              <img id="zoom_01" class="nypFade" height="400px" width="700px" src="" data-zoom-image=""/>

                <div id="gal1">
                 
                  <a id="image1Link" href="#" data-image="" data-zoom-image="">
                    <img id="zoom_03" class="zoom_03 image1Small" data-index="0" src="" />
                  </a>

                  <a id="image2Link" href="#" data-image="" data-zoom-image="">
                    <img id="zoom_03" class="zoom_03 image2Small" data-index="1" src="" />
                  </a>

                  <a id="image3Link" href="#" data-image="" data-zoom-image="">
                    <img id="zoom_03" class="zoom_03 image3Small" data-index="2" src="" />
                  </a>

                  <a id="image4Link" href="#" data-image="" data-zoom-image="">
                    <img id="zoom_03" class="zoom_03 image4Small" data-index="3" src="" />
                  </a>
                </div>
              
            </div>

            <div class="resume-date text-md-right">
              <div id="text1"><h2 style="color: #7EC0EE">🗾Japan🗾( Mut Fuji🗻 )</h2><b><h3 id="image1Description" style="color: #1b71d2"></h3></div>
              <div id="text2" class="hidden"><h2 style="color: #7EC0EE">🍁Canada🍁</h2><b><h3 id="image2Description" style="color: #1b71d2"></h3></div>
              <div id="text3" class="hidden"><h2 style="color: #7EC0EE">⛰️Switzerland⛰️</h2><b><h3 id="image3Description"  style="color: #1b71d2"></h3></div>
              <div id="text4" class="hidden"><h2 style="color: #7EC0EE">🎌Korea🎌</h2><b><h3 id="image4Description" style="color: #1b71d2"></h3></div>
            </div>




          </div>
        </div>
      </section>
</section>


 <?php  if ($_SESSION['roletype'] == '1') : ?>
      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="Admin">
        <div class="my-auto">
          <h2 class="mb-5">Admin</h2>

        
              <fieldset class="row">

                <div class="col-md-3">
                    
                  </div>
                  <div class="col-md-6">
                      <input id="searchText" class="form-control" style="display: inline;width:70%;"  placeholder="search" name="searchText">

                      <button id="searchButton" class="btn btn-default btn-success ">Search</button>
                  </div>
                   
              </fieldset>
         

          <h3>User List </h3>
          <div class="table-responsive">
            <table id="userListTable" class="table">
              <thead>
                <tr>
                   <th>NAME</th>
                   <th>EMAIL</th>
                   <th>AGE</th>
                   <th>GENDER</th>
                   <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                 <!--<?php echo $trList;?>  -->
              </tbody>


            </table>
          </div>
          <div id="container" style="height: 400px"></div>
      </section>
 <?php  endif ?>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="Map">
        <div class="my-auto">
          <h2 class="mb-5">Map</h2>

          <div id="map"></div>


         
      </section>

<!--   user detail modal  -->
 <div id="userModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <h3 id="userModalLabel">User Detail</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        
    </div>
    <div class="modal-body">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="emailEditInput" placeholder="Enter Email" name="email" required autofocus>
        </div>

        <div class="form-group">
          <label for="userName">Name</label>
          <input type="text" class="form-control" id="userNameEditInput"  placeholder="Enter name" name="username" required>
        </div>

       <div class="form-group">
          <label for="age">Age:</label>
          <input type="number" min="1" max="150" class="form-control" id="ageEditInput" placeholder="Enter Age" name="age" required>
        </div>

        <div class="form-group">
          <label for="gender">Gender:</label>
          <select class="form-control" name="gender" id="genderEditSelect">
            <option value="1">Male</option>
            <option value="0">Female</option>
          </select>
        </div>
       
       <div class="form-group">
          <label for="contact">Contact</label>
          <input type="text" class="form-control" id="contactEditInput"  placeholder="Enter Contact" name="contact" required>
        </div>

        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="addressEditInput"  placeholder="Enter Address" name="address" required>
        </div>

        <div class="form-group">
          <label for="industry">Industry/Occupational Group</label>
          <select class="form-control" name="industry" id="industryEditSelect">
            <option value="A">OfficeJob</option>
            <option value="B">Sales</option>
            <option value="C">N.A.</option>
          </select>
        </div>

        <div class="form-group">
          <label for="industry">How they know about this event</label>
          <select class="form-control" name="event" id="eventEditSelect">
            <option value="1">Website</option>
            <option value="2">Media</option>
            <option value="3">Friend</option>
          </select>
        </div>

        <input id="hiddenUserId" type="hidden">
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button id="saveButton" class="btn btn-primary">Save changes</button>
    </div>
  </div>
</div>
</div>


	<style>
		    #FPic {
		      border: #ff66a3;
		      background: #ff66a3;
		    }
		    </style>

    <footer id="FPic">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="footer-manu">
              <ul>
              </ul>
            </div>
            <p>Copyright &copy; For a school assignment in <a href="http://www.nyp.edu.sg//">NYP</a> (Done By: FangLue)</p>
          </div>
        </div>
      </div>
    </footer>
            
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/highcharts/code/highcharts.js"></script>
    <script src="vendor/highcharts/code/highcharts-3d.js"></script>
    <script src="vendor/highcharts/code/modules/exporting.js"></script>

    <!-- Photo gallary -->
    <script src="js/travel.js"></script>
     <!-- Custom scripts for this template -->
    <script src="vendor/elevatezoom-master/jquery.elevatezoom.js"></script>

    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
    <script src="js/jquery-sakura.min.js"></script>
    <script src="js/photoGallery.js"></script>
    <script src="js/form.js"></script>
    <script src="js/chart.js"></script>

    
    <script>

         $( document ).ready(function() {
          $('body').sakura({ 
            
            className: 'sakura', // Class name to use
            fallSpeed: 0.5, // Factor for petal fall speed
            maxSize: 15, // Maximum petal size
            minSize: 9, // Minimum petal size
            newOn: 100, // Interval after which a new petal is added
            swayAnimations: ['sway-0', 'sway-1', 'sway-2', 'sway-3', 'sway-4', 'sway-5', 'sway-6', 'sway-7', 'sway-8'] // Swaying animation names
            });
            });
    </script>

    <script>
        function initMap() {
          var uluru = {lat: 1.3801179, lng: 103.8490221};
          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: uluru
          });
          var marker = new google.maps.Marker({
            position: uluru,
            map: map
          });
        }
    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAs2C_eiigY-U2TEDrm6F_bS9heqlL4gh0&callback=initMap">
    </script>
  </body>

</html>
