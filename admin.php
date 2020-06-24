<?php

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
        <a href="#home" class="logo">
            <!-- <img class="the-logo" src="img/theone.svg" width="290" alt="Restaurant logo" /> -->
            eatWell | Admin
        </a>

        <nav>
            <ul>
                <li id="admin-menu">
                    Modifier menu <i class="fas fa-pencil-alt"></i>
                </li>
                <li id="admin-gallery">
                    Modifier galerie <i class="fas fa-pencil-alt"></i>
                </li>
            </ul>
        </nav>

        <!-- Menu -->
        <section class="edit">
            <form action="admin.php#menu">
                <input type="text" name="name" id="name" placeholder="Nom">
                <input type="text" name="price" id="price" placeholder="Prix">
                <textarea name="description" id="description" cols="30" rows="1" placeholder="description"></textarea>

                <input class="btn" type="submit" value="Ajouter">
            </form>
        </section>

        <article id="menu">
            <div class="container">

                <h2 class="center">Menu</h2>
                <section class="menu">
                    <div class="bld">
                        <div class="bld-l">
                            <img src="./img/kitchen-spoons.svg" width="30px" alt="Food plate" />
                            <h3 class="h3-lunch">Déjeuner</h3>
                        </div>
                        <div class="bld-b">
                            <img src="./img/hot-tea.svg" width="30px" alt="Tea cup" />
                            <h3 class="h3-clicked h3-breakfast red">Petit déjeuner</h3>
                        </div>
                        <div class="bld-d">
                            <img src="./img/dish-cap-line.svg" width="40px" alt="Dinner" />
                            <h3 class="h3-dinner">Dîner</h3>
                        </div>
                    </div>
                    <section class="breakfast">
                        <div class="first">
                            <?php foreach ($food_breakfast as $fod) { ?>
                                <?php if ($fod["id"] % 2 != 0) { ?>
                                    <div class="info">
                                        <div class="flex">
                                            <div class="food">
                                                <?php echo htmlspecialchars($fod["food_name"]); ?>
                                            </div>
                                            <div class="mid"></div>
                                            <div class="price"><?php echo htmlspecialchars($fod["food_price"]) . " Dhs"; ?> </div>
                                        </div>
                                        <p class="food-description">
                                            <?php echo htmlspecialchars($fod["food_description"]); ?>
                                        </p>
                                    </div>
                                <?php } ?>

                            <?php } ?>
                        </div>
                        <div class="second">
                            <?php foreach ($food_breakfast as $fod) { ?>
                                <?php if ($fod["id"] % 2 == 0) { ?>
                                    <div class="info">
                                        <div class="flex">
                                            <div class="food"><?php echo htmlspecialchars($fod["food_name"]); ?></div>
                                            <div class="mid"></div>
                                            <div class="price"><?php echo htmlspecialchars($fod["food_price"]) . " Dhs"; ?></div>
                                        </div>
                                        <p class="food-description">
                                            <?php echo htmlspecialchars($fod["food_description"]); ?>
                                        </p>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </section>

                    <section class="lunch">
                        <div class="first">
                            <?php foreach ($food_lunch as $fod) { ?>
                                <?php if ($fod["id"] % 2 != 0) { ?>
                                    <div class="info">
                                        <div class="flex">
                                            <div class="food"><?php echo htmlspecialchars($fod["food_name"]); ?></div>
                                            <div class="mid"></div>
                                            <div class="price"><?php echo htmlspecialchars($fod["food_price"]) . " Dhs"; ?></div>
                                        </div>
                                        <p class="food-description">
                                            <?php echo htmlspecialchars($fod["food_description"]); ?>
                                        </p>
                                    </div>
                                <?php } ?>

                            <?php } ?>
                        </div>
                        <div class="second">
                            <?php foreach ($food_lunch as $fod) { ?>
                                <?php if ($fod["id"] % 2 == 0) { ?>
                                    <div class="info">
                                        <div class="flex">
                                            <div class="food"><?php echo htmlspecialchars($fod["food_name"]); ?></div>
                                            <div class="mid"></div>
                                            <div class="price"><?php echo htmlspecialchars($fod["food_price"]) . " Dhs"; ?></div>
                                        </div>
                                        <p class="food-description">
                                            <?php echo htmlspecialchars($fod["food_description"]); ?>
                                        </p>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </section>

                    <section class="dinner">
                        <div class="first">
                            <?php foreach ($food_dinner as $fod) { ?>
                                <?php if ($fod["id"] % 2 != 0) { ?>
                                    <div class="info">
                                        <div class="flex">
                                            <div class="food"><?php echo htmlspecialchars($fod["food_name"]); ?></div>
                                            <div class="mid"></div>
                                            <div class="price"><?php echo htmlspecialchars($fod["food_price"]) . " Dhs"; ?></div>
                                        </div>
                                        <p class="food-description">
                                            <?php echo htmlspecialchars($fod["food_description"]); ?>
                                        </p>
                                    </div>
                                <?php } ?>

                            <?php } ?>
                        </div>
                        <div class="second">
                            <?php foreach ($food_dinner as $fod) { ?>
                                <?php if ($fod["id"] % 2 == 0) { ?>
                                    <div class="info">
                                        <div class="flex">
                                            <div class="food"><?php echo htmlspecialchars($fod["food_name"]); ?></div>
                                            <div class="mid"></div>
                                            <div class="price"><?php echo htmlspecialchars($fod["food_price"]) . " Dhs"; ?></div>
                                        </div>
                                        <p class="food-description">
                                            <?php echo htmlspecialchars($fod["food_description"]); ?>
                                        </p>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </section>
                </section>
            </div>
        </article>

        <!-- Galerie -->
        <article class="hide" id="gallery">
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
        </article>
    </div>

    <script src="js/admin.js"></script>
</body>

</html>