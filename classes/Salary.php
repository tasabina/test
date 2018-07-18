<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 26/06/2018
 * Time: 11:13 AM
 */

class Salary
{
    public $employee = [];
    public $tax = [];
    public $output = [];


    public function getData($file)
    {
        try {
            if (file_exists($file) && is_readable($file)) {
                $data = file($file);
                for ($i = 0; $i < count($data); $i++) {
                    $tmp = explode(',', $data[$i]);
                    $data[$i] = array(
                        'name' => $tmp[0],
                        'surname' => $tmp[1],
                        'annual salary' => $tmp[2],
                        'rate' => $tmp[3],
                        'date' => $tmp[4],);
                }
            }
        }
        catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $this->employee = $data;
    }


    public function taxLevel($salary) {

        if ($salary >= 18201 && $salary <= 37000){
            $this->tax[] = array(
                'rate' => 0.19,
                'l min' => 18200,
                'l max' => 37000,
                'amount' => 0,
            );

        } elseif ($salary >= 37001 && $salary <= 80000){
            $this->tax[] = array(
                'rate' => 0.325,
                'l min' => 37000,
                'l max' => 80000,
                'amount' => 3572,
            );
        } elseif ($salary >= 80001 && $salary <= 180000){
            $this->tax[] = array(
                'rate' => 0.370,
                'l min' => 80000,
                'l max' => 180000,
                'amount' => 17547,
            );
        }  elseif ($salary >= 180001) {
            $this->tax[] = array(
                'rate' => 0.450,
                'l min' => 180000,
                'l max' => $salary,
                'amount' => 54547,
            );
        }else {
            $this->tax[] = array(
                'rate' => 0,
                'l min' => 0,
                'l max' => 18200,
                'amount' => 0,
            );
        }
    }

    public function taxOutcome($salary, $lMin, $rate, $amount)
    {

        return round (($tax = (($salary - $lMin) * $rate) + $amount )/ 12);
    }

    public function taxIncome($file)
    {
        $data = self::getData($file);
        for ($i = 0; $i < count($data); $i++) {
            $salary = $data[$i]['annual salary'];
            $superRate = str_replace('%', '',$data[$i]['rate']);
            if ($superRate>= 50){
                $superRate = 50;
            }
            $tax = self::taxLevel($salary);
            $taxLevel = $this->tax[$i]['l min'];
            $taxRate = $this->tax[$i]['rate'];
            $taxAmount = $this->tax[$i]['amount'];
            $taxIncom = self::taxOutcome($salary, $taxLevel, $taxRate, $taxAmount);
            $grossIncome = round($salary/12);
            $netIncome = $grossIncome - $taxIncom;
            $superIncome = ($grossIncome/100) * $superRate;
            $this->output[] = array(
                'taxLevel' => $taxLevel,
                'taxAmount' => $taxAmount,
                'taxIncom' => $taxIncom,
                'salary' => $salary,
                'tax' => $tax,
                'grossIncome' => $grossIncome,
                'netIncome' => $netIncome,
                'superIncome' => $superIncome,
            );
//            echo $taxLevel, $taxAmount, $taxIncom, $salary, $tax, $grossIncome, $netIncome, $superIncome;
    }
    }

    public function printData()
    {
        echo '<table class="table"><thead class="thead-dark"><tr><th scope="col">#</th><th scope="col">Name</th>' .
            '<th scope="col">Surname</th>' .
            '<th scope="col">Pay period</th>' .
            '<th scope="col">Gross income</th>' .
            '<th scope="col">Salary</th>' .
            '<th scope="col">Income tax</th>' .
            '<th scope="col">Net Income</th>' .
            '<th scope="col">Super</th>' .
            '</tr></thead><tbody>';
        for ($i = 0; $i < count($this->output); $i++) {
            echo '<tr><th scope="row">#</th>' .
                '<td>' . $this->employee[$i]['name'] . '</td>' .
                '<td>' . $this->employee[$i]['surname'] . '</td>' .
                '<td>' . $this->employee[$i]['date'] . '</td>' .
                '<td>' . $this->output[$i]['grossIncome'] . '</td>' .
                '<td>' . $this->output[$i]['salary'] . '</td>' .
                '<td>' . $this->output[$i]['taxIncom'] . '</td>' .
                '<td>' . $this->output[$i]['netIncome'] . '</td>' .
                '<td>' . $this->output[$i]['superIncome'] . '</td></tr>'; }
                echo '</tbody></table>';
        }

    public function salaryCalc()
    {
        try
        {
            if (isset($_POST['submit'])) {
                $file = fopen('data/data.csv', 'w');
                $inputdata = array($_POST['name'], $_POST['surname'], $_POST['salary'], $_POST['superrate'], date("1 F - t F", strtotime($_POST['timeperiod'])));
                fputcsv($file, $inputdata, ",");
                fclose($file);
                $uploadfile = 'data/' . 'data' . '.' . 'csv';
                move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile);
//                header('Location: payslip.php');
        }
    }
    catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
        }
}