<?php

  include("dbconfig.php");

  $error = "";

  if (isset($_POST['submit'])) {

      $name = $_POST['name'];
      $password = $_POST['pass'];
      $dob = $_POST['dob'];
      $phone = $_POST['telnumber'];
      $faculty = $_POST['faculty'];
      $email = $_POST['email'];
      $gender = $_POST['gender'];


      $insertQuery = "INSERT INTO register(name,password,dob,telnumber,faculty,email,gender) VALUES ('$name','$password','$dob','$phone','$faculty','$email','$gender')";
      if (mysqli_query($con, $insertQuery)) {
          header("location: index.html");

      }


  }

?>





<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="regStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <title>Register</title>






</head>
<body id="regbody">


  <form name="regForm" method="POST" action="register.php" onsubmit="return validationRegForm()">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1 class="text-center">REGISTER HERE</h1>
                <!--make a row in label and textbox -->

                <div class="form-group row">
                    <label class="InputName col-md-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" >
                    </div>
                </div>

                <div class="form-group row">
                    <label class="InputName col-md-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="InputName col-md-3 col-form-label">Date of Birth</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="dob" id="dateOfBirth" placeholder="Date of Birth">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="InputName col-md-3 col-form-label">Tel.Number</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="telnumber" id="telnumber" placeholder="Tel.Number"  maxlength="10" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="InputName col-md-3 col-form-label">Faculty</label>
                    <div class="col-sm-9">
                        <select id="inputFaculty" name="faculty" class="form-control" >
                            <option selected value="choose" >Choose..</option>
                            <option>Faculty of Computing</option>
                            <option>Faculty of Engineering</option>
                            <option>Faculty of Business</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="InputName col-md-3 col-form-label" >E-mail</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" id="email" placeholder="E-mail" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="InputName col-md-3 col-form-label" required>Gender</label>
                    <div class="col-sm-9">
                        <select id="inputGender" name="gender" class="form-control">
                            <option selected value="choose">Choose..</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-info">Submit</button>
            </div>
        </div>
    </div>
</form>



  <!-- script -->

  <script type="text/javascript">

    function validationRegForm() {
        var name = document.forms["regForm"]["name"].value;
        var pass = document.forms["regForm"]["pass"].value;
        var gender = document.forms["regForm"]["gender"].value;
        var phone = document.forms["regForm"]["telnumber"].value;
        var mail = document.forms["regForm"]["email"].value;
        var faculty = document.forms["regForm"]["faculty"].value;

        if (name === "") {
            alert("Enter a name.");
            return false;
        }else if(!(isPassword(pass,"Password"))){
            return false;
        }else if(!(isDateSelected())){
            return false;
        }else if(faculty === "choose") {
            alert("Select a faculty.");
            return false;
        }else if(gender === "choose"){
            alert("Select a gender.");
            return false;
        }else if(!(isPhoneNumber(phone,"Phone Number "))){
            return false;
        }else return isEmailValid(mail, "Email");



    }


    function isPhoneNumber(elemValue,field) {

        var exp = /^[0-9]+$/;

        if(!isEmpty(elemValue,field))
        {
            if(elemValue.match(exp))
            {
                return true;
            }
            else
            {
                alert("Enter a valid telephone number.");
                return false;
            }


        }
        else {
            return false;
        }
    }

    function isPassword(elemValue,field) {

        var exp = /^(?=.*\d)(?=.*[A-Z])(?!.*[^a-zA-Z0-9@#$^+=])(.{8,})$/;

        if(!isEmpty(elemValue,field))
        {
            if(elemValue.match(exp))
            {
                return true;
            }
            else
            {
                alert("Enter a valid Password.");
                return false;
            }


        }
        else {
            return false;
        }
    }



    function isEmpty(elemValue,field) {

        if(elemValue === null || elemValue === "")
        {
            alert( field + " is empty");
            return true;
        }
        else
        {
            return false;
        }

    }

    function isEmailValid(elemValue,field) {

        if(!isEmpty(elemValue,field))
        {
            var at = elemValue.indexOf("@");
            var dot = elemValue.indexOf(".");

            if(at < 1 || dot + 2 >= elemValue.length || at + 2 > dot)
            {
                alert("Enter a valid email adress.");
                return false;
            }
            else
            {
                return true;
            }


        }
        else
        {
            return false;
        }

    }

    function isDateSelected(){
        var today =new Date();
        var inputDate = new Date(document.regForm.dob.value);
        if (inputDate.value === "" ){
            return false;
        }else{
            return true;
        }
    }




</script>





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
