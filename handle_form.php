<?php

include("db_connect.php");

// Contact form validation
$name = $email = $subject = $message = $sent = "";
$errors = ["nameErr" => "", "emailErr" => "", "subjectErr" => "", "messageErr" => ""];

if (isset($_POST["contactSubmit"])) {
    // check for name
    if (empty($_POST["name"])) {
        $errors["nameErr"] = "Veuillez saisir votre nom";
    } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-z]{3,}[a-z ]*$/i", $name)) {
            $errors["nameErr"] = "Veuillez écrire un nom valide";
        }
    }

    // check for email
    if (empty($_POST["email"])) {
        $errors["emailErr"] = "Veuillez saisir votre email";
    } else {
        $email = $_POST["email"];
        if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)) {
            $errors["emailErr"] = "Format d'email invalide";
        }
    }


    // check for subject
    if (empty($_POST["subject"])) {
        $errors["subjectErr"] = "Veuillez saisir un sujet";
    } else {
        $subject = $_POST["subject"];
    }

    if (empty($_POST["message"])) {
        $errors["messageErr"] = "Veuillez écrivez votre message";
    } else {
        $message = $_POST["message"];
    }

    // check errors in form
    if (!array_filter($errors)) {
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $subject = mysqli_real_escape_string($conn, $_POST["subject"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $message = mysqli_real_escape_string($conn, $_POST["message"]);

        // create sql
        $sql = "INSERT INTO form(`name`, `email`, `subject`, `message`) 
                    VALUES('$name', '$email', '$subject', '$message')";


        // the message
        // $msg = "First line of text\nSecond line of text";

        // use wordwrap() if lines are longer than 70 characters
        // $msg = wordwrap($msg, 70);

        // send email
        // mail("walid966666@gmail.com", "My subject", $msg);

        $name = $email = $subject = $message =  "";

        if (mysqli_query($conn, $sql) && !array_filter($errors)) {
            $sent = "Votre email a été envoyé";
        } else {
            echo "error: " . mysqli_error($conn);
        }
    }
}  // end form validation

// Admin form
$meal = $food_price = $food_name = $food_description = $name_price_err = $added = "";
$db1 = $db2 = $db3 = "";

if (isset($_POST["adminSubmit"])) {
    $meal = $_POST["meal"];

    if (!empty($_POST["food_name"]) && !empty($_POST["food_price"])) {
        $food_name = $_POST["food_name"];
        $food_price = $_POST["food_price"];
        $food_description = $_POST["food_description"];
    } else {
        $name_price_err =  "ajouter un nom et un prix";
    }

    if ($name_price_err !== "ajouter un nom et un prix") {
        $sql1 = "INSERT INTO breakfast (`food_name`, `food_description`, `food_price`) 
                    VALUES('$food_name', '$food_description', '$food_price')";
        if ($meal === "breakfast") {
            $db1 = mysqli_query($conn, $sql1);
        }

        $sql2 = "INSERT INTO lunch (`food_name`, `food_description`, `food_price`) 
                    VALUES('$food_name', '$food_description', '$food_price')";
        if ($meal === "lunch") {
            $db2 = mysqli_query($conn, $sql2);
        }

        $sql3 = "INSERT INTO dinner (`food_name`, `food_description`, `food_price`) 
                    VALUES('$food_name', '$food_description', '$food_price')";

        if ($meal === "dinner") {
            $db3 = mysqli_query($conn, $sql3);
        }



        if ($db1 or $db2 or $db3) {
            header('location: admin-page.php#grey-menu');
        }
    }
}

// delete from menu
if (isset($_POST["breakDlt"]) or isset($_POST["lunchDlt"]) or isset($_POST["dinnerDlt"])) {
    $id_b = $_POST["b_id"];
    $id_l = $_POST["l_id"];
    $id_d = $_POST["d_id"];

    $deleteB = mysqli_query($conn, "DELETE FROM breakfast WHERE id=$id_b");
    $deleteL = mysqli_query($conn, "DELETE FROM lunch WHERE id=$id_l");
    $deleteD = mysqli_query($conn, "DELETE FROM dinner WHERE id=$id_d");

    if ($deleteB or $deleteL or $deleteD) {
        header('location: admin-page.php');
    }
}

if (isset($GET["breakDlt"])) {
    $id_b = $GET["breakDlt"];

    $deleteB = mysqli_query($conn, "DELETE FROM breakfast WHERE id = '$id_b'");

    if ($deleteB) {
        header('location: admin-page.php#grey-menu');
    }
}

// login form
if (isset($_POST["login-submit"])) {
    // $hashedPwd = password_hash("cafe", PASSWORD_DEFAULT);
    // $sql_insert = "INSERT INTO admin (`email`, `password`) VALUES('cafe', '$hashedPwd')";
    // mysqli_query($conn, $sql_insert);

    $adminErr = "";
    $adminEmail = mysqli_real_escape_string($conn, $_POST["email"]);
    $adminPwd = mysqli_real_escape_string($conn, $_POST["password"]);

    $sql_exe = mysqli_query($conn, "SELECT * FROM admin");
    $result = mysqli_fetch_all($sql_exe, MYSQLI_ASSOC);

    foreach ($result as $row) {
        if ($adminEmail !== $row["email"] || $adminPwd !== "cafe") {
            $adminErr = "Email ou mot de passe incorrect";
        }

        if ($adminEmail === $row["email"] && $adminPwd === "cafe") {
            $_SESSION['username'] = $row["email"];
            $_SESSION['password'] = "cafe";
            header("location: admin-page.php");
        }
    }
}
