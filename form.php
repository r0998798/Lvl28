<?php
// database connection code

    // $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
    $con = mysqli_connect('localhost', 'root', '', 'lvl28');

    // get the post records
    $txtName = $_POST['voornaam'];
    $txtFamilyName = $_POST['achternaam'];
    $txtEmail = $_POST['email'];
    $txtCompanyName = $_POST['bedrijfsnaam'];
    $txtSelectedAi = $_POST['ai-dropdown'];

    // database insert SQL code
    $sql = "INSERT INTO `tbl_form` (`naam`, `achternaam`, `email`, `bedrijf`, `ai`) 
            VALUES ('$txtName', '$txtFamilyName', '$txtEmail', '$txtCompanyName', '$txtSelectedAi')";

    // insert in database
    $rs = mysqli_query($con, $sql);
    if ($rs) {
        header("Location: http://localhost/lvl28/thanks.html");
    } else {
        echo "Error: " . mysqli_error($con);
    }
?>
