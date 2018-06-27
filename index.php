<?php error_reporting();
require_once 'classes/Salary.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Payslip information</title>
</head>
<body>
<div class="header" style="margin-top: 50px"><h2 style="text-align: center">Form for creating you payslip list</h2>
</div>
<main role="main" class="container">
    <div class="jumbotron">
        <h1 class="display-4">Welcome to the input page</h1>
        <p class="lead">This is a simple page with form, which allows you to prepare you payslip list.</p>
        <hr class="my-4">
        <form method="post" action="<?php $salary = new Salary(); $a = $salary ->salaryCalc(); ?> " method="POST" enctype="multipart/form-data" id="uploadfile">

            <h2>Personal information</h2>
            <p>Please, put your information on<br>
                This form allows you to enter data or download * CSV file with data </p>
            <div class="form-group">
                <label for="name">Type your name</label>
                <input type="text" class="form-control" id="name"  placeholder="Your name..." name="name" pattern="\w{2,}">
            </div>
            <div class="form-group">
                <label for="surname">Type your surname</label>
                <input type="text" class="form-control" id="surname" placeholder="Your surname..." name="surname"  pattern="\w{2,}">
            </div>
            <div class="form-group">
                <label for="timeperiod">Type your time period</label>
                <input  type="date" class="form-control" id="timeperiod" placeholder="Your time period..." name="timeperiod">
            </div>
            <div class="form-group"><div></div>
                <label for="salary">Type annual salary</label>
                <input type="text" class="form-control" id="salary" placeholder="An annual salary..." name="salary" pattern="\d{1,}">
            </div>
            <div class="form-group"><div></div>
                <label for="superrate salary">Type you rate percentage </label>
                <input type="text" class="form-control" id="superrate salary" placeholder="An super rate..." name="superrate" pattern="\d*{2}">
            </div>
            <div class="form-group">
                <h2>File</h2>
                <p>Please, upload your file<br>
                    If you have a data file, please download it here</p>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name = "filename">
                    <label class="custom-file-label" for="customFile">Choose file...</label>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary" name="submit">Submit</button>
        </form>
    </div>
</main>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

