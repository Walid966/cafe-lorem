<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:admin.php");
}

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
    <title>eatWell | Restaurant</title>
</head>

<html>

<body class="grey">
    <div class="container white mg-pd-tb">
        <!-- <a href="#home" class="logo">
            <img class="the-logo" src="img/theone.svg" width="290" alt="Restaurant logo" />
        </a> -->

        <h1 class="center">eatWell | Admin</h1>
        <a class="logout" href="index.php">Log Out <i class="fas fa-sign-out-alt"></i> </a>
        <nav>
            <ul>
                <!-- <li id="admin-menu">
                    Modifier menu <i class="fas fa-pencil-alt"></i>
                </li> -->
                <!-- <li id="admin-gallery">
                    Modifier galerie <i class="fas fa-pencil-alt"></i>
                </li> -->
            </ul>
        </nav>

        <!-- Menu -->
        <section class="edit">
            <form action="admin-page.php#menu" method="POST">
                <p class="added">
                    <?php echo htmlspecialchars($added); ?>
                </p>
                <p class="name_price">
                    <?php echo htmlspecialchars($name_price_err); ?>
                </p>
                <select name="meal" id="meal" class="meal">
                    <option value="breakfast">Breakfast</option>
                    <option value="lunch">Lunch</option>
                    <option value="dinner">Dinner</option>
                </select>
                <input type="text" name="food_name" id="name" placeholder="Name">
                <input type="text" name="food_price" id="price" placeholder="Price">
                <textarea name="food_description" id="description" cols="30" rows="1" placeholder="description"></textarea>

                <input class="btn" name="adminSubmit" type="submit" value="Ajouter">
            </form>
        </section>

        <article id="grey-menu">
            <div class="container">
                <h2 class="h2-menu center">Menu</h2>
                <section class="grey-menu #grey-menu">
                    <section class="grey-breakfast">
                        <h2 class="center break">Breakfast</h2>
                        <?php foreach ($food_breakfast as $fod) { ?>
                            <form method="POST" action="admin-page.php#grey-menu" class="emenu">
                                <div class="info" name="info">
                                    <div>
                                        <div class="food">
                                            <span class="bold"><?php echo htmlspecialchars("Name: "); ?></span>
                                            <?php echo htmlspecialchars($fod["food_name"]); ?>
                                        </div>
                                        <div class="price">
                                            <span class="bold"><?php echo htmlspecialchars("Price: "); ?></span>
                                            <?php echo htmlspecialchars($fod["food_price"]) . " Dhs"; ?>
                                        </div>
                                    </div>
                                    <p class="food-description">
                                        <span class="bold"><?php echo htmlspecialchars("Description: "); ?></span>
                                        <?php echo htmlspecialchars($fod["food_description"]); ?>
                                    </p>

                                    <input type="hidden" name="b_id" value=" <?php echo $fod['id'] ?>">

                                    <input name="breakDlt" class="btn-d" type="submit" value="Delete">
                                </div>
                            </form>
                        <?php } ?>
                    </section>

                    <section class="grey-dinner">
                        <h2 class="center break">Dinner</h2>
                        <?php foreach ($food_dinner as $fod) { ?>
                            <form method="POST" action="admin-page.php#grey-menu" class="emenu">
                                <div class="info">
                                    <div>
                                        <div class="food">
                                            <span class="bold"><?php echo htmlspecialchars("Name: "); ?></span>
                                            <?php echo htmlspecialchars($fod["food_name"]); ?>
                                        </div>
                                        <div class="price">
                                            <span class="bold"><?php echo htmlspecialchars("Price: "); ?></span>
                                            <?php echo htmlspecialchars($fod["food_price"]) . " Dhs"; ?>
                                        </div>
                                    </div>
                                    <p class="food-description">
                                        <span class="bold"><?php echo htmlspecialchars("Description: "); ?></span>
                                        <?php echo htmlspecialchars($fod["food_description"]); ?>
                                    </p>

                                    <input type="hidden" name="d_id" value=" <?php echo $fod['id'] ?>">
                                    <input name="dinnerDlt" class="btn-d" type="submit" value="Delete">
                                </div>
                            </form>
                        <?php } ?>
                    </section>

                    <section class="grey-lunch">
                        <h2 class="center break">Lunch</h2>
                        <?php foreach ($food_lunch as $fod) { ?>
                            <form method="POST" action="admin-page.php#grey-menu" class="emenu">
                                <div class="info">
                                    <div>
                                        <div class="food">
                                            <span class="bold"><?php echo htmlspecialchars("Name: "); ?></span>
                                            <?php echo htmlspecialchars($fod["food_name"]); ?>
                                        </div>
                                        <div class="price">
                                            <span class="bold"><?php echo htmlspecialchars("Price: "); ?></span>
                                            <?php echo htmlspecialchars($fod["food_price"]) . " Dhs"; ?>
                                        </div>
                                    </div>
                                    <p class="food-description">
                                        <span class="bold"><?php echo htmlspecialchars("Description: "); ?></span>
                                        <?php echo htmlspecialchars($fod["food_description"]); ?>
                                    </p>

                                    <input type="hidden" name="l_id" value=" <?php echo $fod['id'] ?>">
                                    <input name="lunchDlt" class="btn-d" type="submit" value="Delete">
                                </div>
                            </form>
                        <?php } ?>
                    </section>
                </section>
            </div>
        </article>

        <!-- Galerie -->
        <!-- <article class="hide" id="gallery">
            <div class="container">
                <h2 class="gal">Galerie</h2>

                <section class="imgs-container">
                    <section class="imgs">
                        <img src="imgs/chef-cooking-in-kitchen-2544829.jpg" alt="">
                        <img src="imgs/men-wearing-a-black-lapel-in-a-store-2537605.jpg" alt="">

                        <i class="right fas fa-chevron-right"></i>
                        <i class="left fas fa-chevron-left"></i>
                    </section>
                </section>
            </div>
        </article> -->
    </div>

    <script src="js/admin.js"></script>
</body>

</html>