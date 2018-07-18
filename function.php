<?php
$errors = array();
$missing = array();
if (isset($_POST['submit'])) {
    $file = fopen('data/data.csv', 'w');
    $inputdata = array($_POST['name'], $_POST['surname'], $_POST['salary'], $_POST['superrate'], date("1 F - t F", strtotime($_POST['timeperiod'])));
    fputcsv($file, $inputdata, ",");
    fclose($file);
    $uploadfile = 'data/' . 'data' . '.' . 'csv';
    $upfile = move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile);
    $expected = array('name', 'surname', 'email', 'timeperiod', 'salary', 'superrate');
    $required = array('name', 'surname', 'email', 'salary', 'superrate');
    require ('required.php');
    if ($upfile == NULL) {
        $expected = array('name', 'surname', 'email', 'timeperiod', 'salary', 'superrate');
        $required = array('name', 'surname', 'email', 'salary', 'superrate');
        require ('required.php');
        if (empty($missing)) {
            redirect('payslip.php');
        }
    } else {
        redirect('payslip.php');
    }
}
function redirect($http = false){
    if($http){
        $redirect = $http;
    }else{
        $redirect = isset($_SESSION['HTTP_REFERER']) ? $_SESSION['HTTP_REFERER'] : ' ';
    }
    header("Location: $redirect");
    exit;
}
