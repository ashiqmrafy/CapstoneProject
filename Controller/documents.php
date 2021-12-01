<?php

function insertDocuments($license, $insurance_history, $credit_report, $userid){

    require('./model/automatrixdb.php');
    $q = "INSERT INTO documents VALUES (null, '$license', '$insurance_history', '$credit_report', $userid)";
    echo $q;
    $mysqli->query($q);
}

?>