<?php

        if (isset($_POST['submit'])){
            $file = fopen('data.csv', 'w');
            $inputdata = array($_POST['name'], $_POST['surname'], $_POST['salary'],$_POST['superrate'],date("j-F", strtotime($_POST['timeperiod'])));
            fputcsv($file, $inputdata, ",");
            fclose($file);
            header('Location: payslip.php');
        }
        if(is_uploaded_file($_FILES["filename"]["tmp_name"])){
            $pathfold = __DIR__.  DIRECTORY_SEPARATOR  . $_FILES["filename"]["name"];
            move_uploaded_file ( $_FILES["filename"]["tmp_name"], $pathfold);
            header('Location: payslip.php');
        } else {
            echo("Error");
    }

