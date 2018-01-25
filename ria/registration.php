<?php include('server.php') ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registration Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
            </div> 
            <div class="col-md-6 ">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form id="donateForm" action="registration.php" method="post">
                          <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required autofocus>
                          </div>

                          <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
                          </div>

                          <div class="form-group">
                            <label for="userName">Name</label>
                            <input type="text" class="form-control" id="userName"  placeholder="Enter name" name="username" required>
                          </div>

                         <div class="form-group">
                            <label for="age">Age:</label>
                            <input type="number" min="1" max="150" class="form-control" id="age" placeholder="Enter Age" name="age" required>
                          </div>

                          <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select class="form-control" name="gender">
                              <option value="1">Male</option>
                              <option value="0">Female</option>
                            </select>
                          </div>

                          
                         
                         <div class="form-group">
                            <label for="contact">Contact</label>
                            <input type="text" class="form-control" id="contact"  placeholder="Enter Contact" name="contact" required>
                          </div>

                          <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address"  placeholder="Enter Address" name="address" required>
                          </div>

                          <div class="form-group">
                            <label for="industry">Industry/Occupational Group</label>
                            <select class="form-control" name="industry">
                              <option value="A">OfficeJob</option>
                              <option value="B">Sales</option>
                              <option value="C">N.A.</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="industry">How they know about this event</label>
                            <select class="form-control" name="event">
                              <option value="1">Website</option>
                              <option value="2">Media</option>
                              <option value="3">Friend</option>
                            </select>
                          </div>

                          <button type="submit" class="btn btn-lg btn-success btn-block" name="reg_user">Submit</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
