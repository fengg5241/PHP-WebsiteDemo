<?php
session_start();
// variable declaration
$username = "";
$email    = "";
$errors = array(); 
$_SESSION['success'] = "";

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'ria_admin');
// $db = mysqli_connect('localhost', 'root', 'X623pSumBK6G', 'ria_admin');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $email = mysqli_real_escape_string($db, $_POST['email']);

  $age = mysqli_real_escape_string($db, $_POST['age']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $contact = mysqli_real_escape_string($db, $_POST['contact']);

  $address = mysqli_real_escape_string($db, $_POST['address']);
  $industry = mysqli_real_escape_string($db, $_POST['industry']);
  $event = mysqli_real_escape_string($db, $_POST['event']);

  // form validation: ensure that the form is correctly filled
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }

  // register user if there are no errors in the form
  if (count($errors) == 0) {
  	
  	$password = md5($password);//encrypt the password before saving in the database
  	$query = "INSERT INTO ria_user (name, pass, age, gender, email, contact, address, industry, event) 
  			  VALUES('$username', '$password', '$age','$gender','$email','$contact ','$address ','$industry','$event')";
  	mysqli_query($db, $query);
	

  	$_SESSION['username'] = $username;
  	$_SESSION['roletype'] = '2';
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }

}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM ria_user WHERE email='$email' AND pass='$password'";
  	$results = mysqli_query($db, $query);



  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;

  	  $row=mysqli_fetch_array($results,MYSQLI_ASSOC);
  	  $_SESSION['roletype'] = $row["role_type"];

  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  	  array_push($errors, "Wrong username/password combination");
  	}
  }
}

// SEARCH PHOTO
if (isset($_POST['searchPhoto'])) {
  
  $query = "SELECT * FROM ria_photo";
  $results = mysqli_query($db, $query);

  $photos = array();
  while ($row = mysqli_fetch_assoc($results)){
  $photo = array(
      "bImage"=>$row["b_photo"],
      "sImage"=>$row["s_photo"],
      "description"=>$row["description"],
  );
  array_push($photos,$photo);
  }
  header('Content-Type: application/json');
  echo json_encode($photos);
}

// SEARCH USER
if (isset($_POST['action'])) {
    $action = mysqli_real_escape_string($db, $_POST['action']);
    if($action == "search"){
        // receive all input values from the form
        $searchText = mysqli_real_escape_string($db, $_POST['searchText']);
        //$query = "SELECT * FROM ria_user WHERE name='$searchText' or age='$searchText' or email='$searchText'";
        $query = "SELECT * FROM ria_user WHERE name like BINARY '%$searchText%' or age like BINARY '%$searchText%' or email like BINARY '%$searchText%'";
        $results = mysqli_query($db, $query);
        $users = array();
        while ($row = mysqli_fetch_assoc($results)){
        $user = array(
            "id"=>$row["id"],
            "name"=>$row["name"],
            "age"=>$row["age"],
            "email"=>$row["email"],
            "gender"=>$row["gender"]

        );
        array_push($users,$user);
        }
        header('Content-Type: application/json');
        echo json_encode($users);
    }


    if($action == "searchById"){
        $id = mysqli_real_escape_string($db, $_POST['id']);
        $query = "SELECT * FROM ria_user where id='$id'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        $user =array(
            "id"=>$row["id"],
            "name"=>$row["name"],
            "age"=>$row["age"],
            "email"=>$row["email"],
            "gender"=>$row["gender"],
            "event"=>$row["event"],
            "contact"=>$row["contact"],
            "address"=>$row["address"],
            "industry"=>$row["industry"],
        );
        header('Content-Type: application/json');
        echo json_encode($user);
    }

    if($action == "edit"){
        $id = mysqli_real_escape_string($db, $_POST['id']);
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $age = mysqli_real_escape_string($db, $_POST['age']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $gender = mysqli_real_escape_string($db, $_POST['gender']);
        $event = mysqli_real_escape_string($db, $_POST['event']);
        $industry = mysqli_real_escape_string($db, $_POST['industry']);
        $contact = mysqli_real_escape_string($db, $_POST['contact']);
        $address = mysqli_real_escape_string($db, $_POST['address']);


        $query = "UPDATE ria_user SET name='$name',age='$age',email='$email',gender='$gender',event='$event',industry='$industry',contact='$contact',address='$address' where id='$id'";
        $result = mysqli_query($db, $query);
        if(mysqli_affected_rows($db) == 1 ){ // Successful
           echo("successful");
        }
        else{
            echo("fail");
        }
    }
}


 ?>