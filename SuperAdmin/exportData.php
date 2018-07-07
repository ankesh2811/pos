<?php
//include database configuration file
include '../config.php';

//get records from database
$query = "SELECT * FROM orders ORDER BY id DESC";
$a = mysqli_query($connection,$query);
$row = mysqli_fetch_array($a);

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "members_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('Invoive No.', 'Table Number', 'Contact Number', 'Amount', 'Taxes', 'Delivery', 'Date', 'Time');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        $status = ($row['status'] == '1')?'Active':'Inactive';
        $lineData = array($row['invoice'], $row['table_number'], $row['contact_number'], $row['amount'], $row['taxes'], $row['delivery'], $row['date'], $row['time']);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>