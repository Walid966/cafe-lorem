<?php
session_start();
// coonect to database
include "db_connect.php";

// write query for form_data
$sql_dinner = "SELECT * FROM dinner";
$sql_lunch = "SELECT * FROM lunch";
$sql_breakfast = "SELECT * FROM breakfast";

// make query and get result
$result_dinner = mysqli_query($conn, $sql_dinner);
$result_lunch = mysqli_query($conn, $sql_lunch);
$result_breakfast = mysqli_query($conn, $sql_breakfast);

// fetch the resulting rows as an array
$food_dinner = mysqli_fetch_all($result_dinner, MYSQLI_ASSOC);
$food_lunch = mysqli_fetch_all($result_lunch, MYSQLI_ASSOC);
$food_breakfast = mysqli_fetch_all($result_breakfast, MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result_dinner);
mysqli_free_result($result_lunch);
mysqli_free_result($result_breakfast);

// close connection
mysqli_close($conn);

// form validation
include "handle_form.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="eatWell Cafe restaurant pizzeria - Marjane Berkane" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ba3779d8d2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style.css" />
    <title>eatWell | Sign in</title>
</head>

<html>

<body class="grey admin">
    <div class="container mg-pd-tb">
        <!-- <a href="#home" class="logo">
            <img class="the-logo" src="img/theone.svg" width="290" alt="Restaurant logo" />
        </a> -->

        <h1 class="center">eatWell | Admin</h1>

        <form action="admin.php" method="POST">
            <p class="err-msg">
                <?php echo htmlspecialchars($adminErr); ?>
            </p>
            <input class="name" type="text" name="email" id="email" placeholder="Nom d'utilisateur">
            <input class="name" type="password" name="password" id="password" placeholder="Mot de passe">

            <input class="btn sign" name="login-submit" type="submit" value="Connexion">
        </form>

    </div>

    <script src="js/admin.js"></script>
</body>

</html>