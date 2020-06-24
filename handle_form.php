<?php

include("db_connect.php");

// form validation
$name = $date = $time = $guests = $res = "";
$errors = ["nameErr" => "", "dateErr" => "", "timeErr" => "", "guestsErr" => ""];

if (isset($_POST["submit"])) {
    // check for name
    if (empty($_POST["name"])) {
        $errors["nameErr"] = "S'il vous plaît entrez votre nom";
    } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-z]{3,}[a-z ]*$/i", $name)) {
            $errors["nameErr"] = "S'il vous plaît entrez votre nom";
        }
    }

    // check for date
    if (empty($_POST["date"])) {
        $errors["dateErr"] = "Veuillez choisir une date";
    } else {
        $date = $_POST["date"];
    }

    // check for guests
    if (empty($_POST["guests"])) {
        $errors["guestsErr"] = "Veuillez choisir le nombre d'invités";
    } else {
        $guests = $_POST["guests"];
    }

    // check for guests
    if (empty($_POST["time"])) {
        $errors["timeErr"] = "Veuillez choisir une heure";
    } else {
        $time = $_POST["time"];
    }

    // check errors in form
    if (!array_filter($errors)) {
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $date = mysqli_real_escape_string($conn, $_POST["date"]);
        $guests = mysqli_real_escape_string($conn, $_POST["guests"]);
        $time = mysqli_real_escape_string($conn, $_POST["time"]);

        // create sql
        $sql = "INSERT INTO form(`name`, `date`, `guests`, `time`) 
                    VALUES('$name', '$date', '$guests', '$time')";


        // the message
        // $msg = "First line of text\nSecond line of text";

        // use wordwrap() if lines are longer than 70 characters
        // $msg = wordwrap($msg, 70);

        // send email
        // mail("walid966666@gmail.com", "My subject", $msg);

        $name = $date = $time = $guests =  "";

        if (mysqli_query($conn, $sql) && !array_filter($errors)) {
            $res = "Merci d'avoir réservé une table";
        }
    }
}  // end form validation
