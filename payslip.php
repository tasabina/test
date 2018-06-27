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

<div class="container">
    <div><h1 style="text-align: center;">Payslip information list</h1></div>
        <?php
        $salary = new Salary();
        $sal = $salary ->taxIncome('data/data.csv');
        $sal = $salary ->getData('data/data.csv');
        $print = $salary -> printData()
        ;?>
</div>