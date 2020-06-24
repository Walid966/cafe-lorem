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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <title>eatWell | Restauran</title>
</head>

<body>
     <div class="wrap">
          <header>
               <div class="container">
                    <nav>
                         <a href="#home" class="logo">
                              <!-- <img class="the-logo" src="img/theone.svg" width="290" alt="Restaurant logo" /> -->
                              eat<span class="red">Well</span>
                         </a>

                         <ul class="nav-bar" id="nav-bar">
                              <li><a href="#menu" class="nav-links">Menu</a></li>
                              <li><a href="#contact" class="nav-links">Contact</a></li>
                              <li><a href="#gallery" class="nav-links">Galerie</a></li>
                              <li><a class="nav-tel" href="tel:0000000000"><i class="fas fa-phone-alt"></i> 0123456789</a></li>
                              <li><a href="#reservation" class="btn-p">Réservation</a></li>
                              <li class="copy-right">
                                   <p class="copy-right">
                                        <a class="fb" href="https://www.facebook.com" target="_blank">
                                             <i class="fab fa-facebook"></i>
                                        </a>
                                        <br>
                                        &copy;
                                        <script>
                                             document.write(new Date().getFullYear());
                                        </script>
                                        eatWell Tous droits réservés
                                   </p>
                              </li>
                         </ul>
                         <div class="hamburger">
                              <div class="line1"></div>
                              <div class="line2"></div>
                              <div class="line3"></div>
                         </div>
                    </nav>
               </div>
          </header>

          <main id="home">
               <section class="welcome">
                    <h1>
                         Bienvenue chez eatWell!
                    </h1>
                    <p>
                         CAFE - RESTAURANT - PIZZERIA
                    </p>
                    <div class="btns">
                         <a href="#menu" class="btn-p">Menu</a>
                         <a href="#reservation" class="btn-p">Réservation</a>
                    </div>
               </section>

               <!-- Menu -->
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

               <div class="center">
                    <div class="dots"></div>
                    <div class="dots"></div>
                    <div class="dots"></div>
               </div>

               <!-- Gallery -->
               <article id="gallery">
                    <div class="container">
                         <h2 class="gal">Galerie</h2>

                         <section class="imgs-container">
                              <section class="imgs">
                                   <img src="imgs/person-holding-sushi-on-black-plate-1422384.jpg" alt="">
                                   <img src="imgs/vegetable-pizza-3570074.jpg" alt="">
                                   <img src="imgs/selective-focus-photography-of-beef-steak-with-sauce-675951.jpg" alt="">
                                   <img src="imgs/grilled-meat-with-green-ladies-finger-vegetable-on-white-1247677.jpg" alt="">

                                   <i class="right fas fa-chevron-right"></i>
                                   <i class="left fas fa-chevron-left"></i>
                              </section>
                         </section>
                    </div>
               </article>

               <div class="center">
                    <div class="dots"></div>
                    <div class="dots"></div>
                    <div class="dots"></div>
               </div>

               <!-- Reservation -->
               <article id="reservation">
                    <div class="container">
                         <h2 class="center">Réservation</h2>

                         <section class="rsv">
                              <section class="contact-info">
                                   <div>
                                        <i class="fas fa-phone-alt"></i>
                                        <p>
                                             <a href="tel:0000000000">0123456789</a>
                                        </p>
                                   </div>

                                   <div>
                                        <i class="fas fa-envelope"></i>
                                        <p>

                                             <a href="mailto:eatwell@eatwell.com">eatwell@eatwell.com</a>
                                        </p>
                                   </div>

                                   <div>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>
                                             Lorem ipsum dolor sit amet elit.
                                        </p>
                                   </div>
                                   <div class="days">
                                        <p>Ouverte du Lun au Sam 08:30 - 23:30</p>
                                   </div>
                              </section>
                              <img class="rsv-img" src="imgs/table-in-vintage-restaurant-6267.jpg" alt="">
                         </section>
                    </div>
               </article>

               <div class="center">
                    <div class="dots"></div>
                    <div class="dots"></div>
                    <div class="dots"></div>
               </div>

               <article id="contact">
                    <div class="container">
                         <h2 class="h2-contact">Contact</h2>
                         <section class="contact">
                              <section class="map">
                                   <iframe class="mp" frameborder="0" style="border: 0;" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ-ViRHYMjeA0R0BlGWA1h0EE&key=AIzaSyBAjapaahfRN1EpsiIWhRR6GWjISuFqoNw" allowfullscreen>
                                   </iframe>
                              </section>

                              <form action="index.php#contact" method="POST">
                                   <input class="name" type="text" name="name" id="name" placeholder="Nom">
                                   <input class="email" type="text" name="email" id="email" placeholder="Email">
                                   <input class="subject" type="text" name="subject" id="subject" placeholder="Objet">
                                   <textarea class="message" name="message" id="message" cols="30" rows="5" placeholder="Message"></textarea>
                                   <input class="btn-p" type="submit" value="Send Message">
                              </form>
                         </section>
                    </div>
               </article>
          </main>

          <footer>
               <div class="container">
                    <a class="fb" href="https://www.facebook.com" target="_blank">
                         <i class="fab fa-facebook"></i>
                    </a>
                    <p class="copy-right">
                         &copy;
                         <script>
                              document.write(new Date().getFullYear());
                         </script>
                         eatWell Tous droits réservés
                    </p>
                    <p class="dev">Created by <a href="https://walidelahmadi.com" target="_blank">WEA</a></p>
               </div>
          </footer>

          <script src="js/app.js"></script>
     </div>
</body>

</html>