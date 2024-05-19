<?php
$userConnected = $_COOKIE['userEmail'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Living Rooms</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./css/main.css" />
</head>

<body>
  <header class="header">
    <div class="header-top">
      <div class="header-top-left">
        <img class="logo" src="ressources/icons/Logo.png" alt="The logo" />
        <nav class="navbar">
          <ul class="list-items">
            <li class="item">home</li>
            <li class="item">shop</li>
            <li class="item">magazine</li>
          </ul>
        </nav>
      </div>
      <div class="header-top-right">
        <img class="cart-icon icon" src="ressources/icons/Cart_Button.png" alt="The shopping cart icon" />
        <img class="menu-icon icon" src="ressources/icons/menu.png" alt="Menu icon" />
        <!-- Display signup button if user not login -->
        <?php if (!isset($userConnected)) : ?>
          <a class="login" href="./pages/signup.php">Sign up</a>
        <?php endif; ?>
        <!-- Change button depend on user connected or not -->
        <?php if (isset($userConnected)) : ?>
          <div class="logout-profil">
            <img src="./ressources/icons/user.png" alt="" class="icon user-connected">
            <div class="logout-settings">
              <a class="login" href="./pages/logout.php">Logout</a>
              <div class="settings">settings</div>
            </div>
          </div>
        <?php else : ?>
          <a href="./pages/signin.php" class="login">login</a>
        <?php endif; ?>
      </div>
    </div>
    <div class="mobile-login-group">
      <!-- Display signup button if user not login -->
      <?php if (!isset($userConnected)) : ?>
        <a class="login" href="./pages/signup.php">Sign up</a>
      <?php endif; ?>
      <!-- Change button depend on user connected or not -->
      <?php if (isset($userConnected)) : ?>
        <a class="login" href="./pages/logout.php">Logout</a>
      <?php else : ?>
        <a href="./pages/signin.php" class="login">login</a>
      <?php endif; ?>
    </div>
    <div class="header-bottom">
      <div class="search-group">
        <div class="">
          <img src="ressources/icons/Search.png" alt="Search icon" class="search-icon" />
        </div>
        <form action="" method="get" class="search-input">
          <input type="text" name="keywords" class="search-area" placeholder="living room" />
          <br />
        </form>
        <div class="author-infos">
          <div class="author-name">Powerd by Algolia</div>
          <img class="author-logo" src="ressources/icons/Sajari_Logo.png" />
        </div>
      </div>
      <div class="select-group">
        <div class="select-group-for-desktop">
          <select class="select-btn" id="">
            <option value="">Best match</option>
            <option value="">Filters</option>
          </select>
        </div>
        <div class="select-group-top">
          <select class="select-btn" id="">
            <option value="">Best match</option>
            <option value="">Fake data</option>
            <option value="">Fake data</option>
            <option value="">Fake data</option>
          </select>
        </div>
        <div class="select-group-bottom">
          <select class="select-btn" id="">
            <option value="">Filters</option>
            <option value="">Fake data</option>
            <option value="">Fake data</option>
            <option value="">Fake data</option>
          </select>
        </div>
      </div>
    </div>
  </header>
  <main class="main">
    <div class="cards">
      <div class="card-container card-selected-desktop">
        <div class="card-selected-title">Filter by</div>
        <select class="select-btn">
          <option value="">Collection</option>
          <option value="">Fake data</option>
          <option value="">Fake data</option>
          <option value="">Fake data</option>
        </select>
        <select class="select-btn">
          <option value="">Color</option>
          <option value="">Fake data</option>
          <option value="">Fake data</option>
          <option value="">Fake data</option>
        </select>
        <select class="select-btn">
          <option value="">Category</option>
          <option value="">Fake data</option>
          <option value="">Fake data</option>
          <option value="">Fake data</option>
        </select>
        <div class="card-selected-price-range">Price Range</div>
        <div class="range_container">
          <div class="sliders_control">
            <input id="fromSlider" type="range" value="10" min="0" max="100" />
            <input id="toSlider" type="range" value="40" min="0" max="100" />
            <div class="range-values">
              <div class="range-start range">0</div>
              <div class="range range-end">10,0000+</div>
            </div>
          </div>
        </div>
        <!-- <div class="circle-container">
          <div class="circle"></div>
        </div> -->
      </div>
      <div class="card-container">
        <div>
          <img class="card-image" src="ressources/images/first.jpg" alt="" />
        </div>
        <div class="card-product-infos">
          <div class="card-description">
            <div class="card-product-name">Coombes</div>
            <div class="card-product-price">2,600</div>
          </div>
          <div class="card-product-type">amchair</div>
          <div class="card-icons">
            <div class="card-stars">
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star.png" alt="Stars" />
            </div>
            <div class="card-shopping-cart">
              <img class="icon" src="ressources/icons/cart_push.png" alt="" />
            </div>
          </div>
        </div>
      </div>
      <div class="card-container">
        <div>
          <img class="card-image" src="ressources/images/fifth.jpg" alt="" />
        </div>
        <div class="card-product-infos">
          <div class="card-description">
            <div class="card-product-name">nillè</div>
            <div class="card-product-price">5800</div>
          </div>
          <div class="card-product-type">flowers</div>
          <div class="card-icons">
            <div class="card-stars">
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star.png" alt="Stars" />
            </div>
            <div class="card-shopping-cart">
              <img class="icon" src="ressources/icons/cart_push.png" alt="" />
            </div>
          </div>
        </div>
      </div>
      <div class="card-container">
        <div>
          <img class="card-image" src="ressources/images/second.jpg" alt="" />
        </div>
        <div class="card-product-infos">
          <div class="card-description">
            <div class="card-product-name">Coombes</div>
            <div class="card-product-price">700</div>
          </div>
          <div class="card-product-type">chair</div>
          <div class="card-icons">
            <div class="card-stars">
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star.png" alt="Stars" />
            </div>
            <div class="card-shopping-cart">
              <img class="icon" src="ressources/icons/cart_push.png" alt="" />
            </div>
          </div>
        </div>
      </div>
      <div class="card-container">
        <div>
          <img class="card-image" src="ressources/images/third.jpg" alt="" />
        </div>
        <div class="card-product-infos">
          <div class="card-description">
            <div class="card-product-name">keeve set</div>
            <div class="card-product-price">600</div>
          </div>
          <div class="card-product-type">books</div>
          <div class="card-icons">
            <div class="card-stars">
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star.png" alt="Stars" />
            </div>
            <div class="card-shopping-cart">
              <img class="icon" src="ressources/icons/cart_push.png" alt="" />
            </div>
          </div>
        </div>
      </div>
      <div class="card-container">
        <div>
          <img class="card-image" src="ressources/images/fouth.jpg" alt="" />
        </div>
        <div class="card-product-infos">
          <div class="card-description">
            <div class="card-product-name">Coombes</div>
            <div class="card-product-price">2,600</div>
          </div>
          <div class="card-product-type">louange</div>
          <div class="card-icons">
            <div class="card-stars">
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star.png" alt="Stars" />
            </div>
            <div class="card-shopping-cart">
              <img class="icon" src="ressources/icons/cart_push.png" alt="Cart button" />
            </div>
          </div>
        </div>
      </div>
      <div class="card-container image-desktop">
        <div>
          <img class="card-image" src="ressources/images/alexandra-gorn-JIUjvqe2ZHg-unsplash.jpg" alt="" />
        </div>
        <div class="card-product-infos">
          <div class="card-description">
            <div class="card-product-name">Coombes</div>
            <div class="card-product-price">2,600</div>
          </div>
          <div class="card-product-type">louange</div>
          <div class="card-icons">
            <div class="card-stars">
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star.png" alt="Stars" />
            </div>
            <div class="card-shopping-cart">
              <img class="icon" src="ressources/icons/cart_push.png" alt="Cart button" />
            </div>
          </div>
        </div>
      </div>
      <div class="card-container image-desktop">
        <div>
          <img class="card-image" src="ressources/images/christopher-jolly-GqbU78bdJFM-unsplash.jpg" alt="" />
        </div>
        <div class="card-product-infos">
          <div class="card-description">
            <div class="card-product-name">Coombes</div>
            <div class="card-product-price">2,600</div>
          </div>
          <div class="card-product-type">louange</div>
          <div class="card-icons">
            <div class="card-stars">
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star.png" alt="Stars" />
            </div>
            <div class="card-shopping-cart">
              <img class="icon" src="ressources/icons/cart_push.png" alt="Cart button" />
            </div>
          </div>
        </div>
      </div>
      <div class="card-container image-desktop">
        <div>
          <img class="card-image" src="ressources/images/francesca-tosolini-w1RE0lBbREo-unsplash.jpg" alt="" />
        </div>
        <div class="card-product-infos">
          <div class="card-description">
            <div class="card-product-name">Coombes</div>
            <div class="card-product-price">2,600</div>
          </div>
          <div class="card-product-type">louange</div>
          <div class="card-icons">
            <div class="card-stars">
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star.png" alt="Stars" />
            </div>
            <div class="card-shopping-cart">
              <img class="icon" src="ressources/icons/cart_push.png" alt="Cart button" />
            </div>
          </div>
        </div>
      </div>
      <div class="card-container image-desktop">
        <div>
          <img class="card-image" src="ressources/images/lotus-design-n-print-WgkA3CSFrjc-unsplash.jpg" alt="" />
        </div>
        <div class="card-product-infos">
          <div class="card-description">
            <div class="card-product-name">Coombes</div>
            <div class="card-product-price">2,600</div>
          </div>
          <div class="card-product-type">louange</div>
          <div class="card-icons">
            <div class="card-stars">
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star.png" alt="Stars" />
            </div>
            <div class="card-shopping-cart">
              <img class="icon" src="ressources/icons/cart_push.png" alt="Cart button" />
            </div>
          </div>
        </div>
      </div>
      <div class="card-container image-desktop">
        <div>
          <img class="card-image" src="ressources/images/michael-oxendine-GHCVUtBECuY-unsplash.jpg" alt="" />
        </div>
        <div class="card-product-infos">
          <div class="card-description">
            <div class="card-product-name">Coombes</div>
            <div class="card-product-price">2,600</div>
          </div>
          <div class="card-product-type">louange</div>
          <div class="card-icons">
            <div class="card-stars">
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star.png" alt="Stars" />
            </div>
            <div class="card-shopping-cart">
              <img class="icon" src="ressources/icons/cart_push.png" alt="Cart button" />
            </div>
          </div>
        </div>
      </div>
      <div class="card-container image-desktop">
        <div>
          <img class="card-image" src="ressources/images/norbert-levajsics-oTJ92KUXHls-unsplash.jpg" alt="" />
        </div>
        <div class="card-product-infos">
          <div class="card-description">
            <div class="card-product-name">Coombes</div>
            <div class="card-product-price">2,600</div>
          </div>
          <div class="card-product-type">louange</div>
          <div class="card-icons">
            <div class="card-stars">
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star.png" alt="Stars" />
            </div>
            <div class="card-shopping-cart">
              <img class="icon" src="ressources/icons/cart_push.png" alt="Cart button" />
            </div>
          </div>
        </div>
      </div>
      <div class="card-container image-desktop">
        <div>
          <img class="card-image" src="ressources/images/roberto-nickson-rEJxpBskj3Q-unsplash.jpg" alt="" />
        </div>
        <div class="card-product-infos">
          <div class="card-description">
            <div class="card-product-name">Coombes</div>
            <div class="card-product-price">2,600</div>
          </div>
          <div class="card-product-type">louange</div>
          <div class="card-icons">
            <div class="card-stars">
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star.png" alt="Stars" />
            </div>
            <div class="card-shopping-cart">
              <img class="icon" src="ressources/icons/cart_push.png" alt="Cart button" />
            </div>
          </div>
        </div>
      </div>
      <div class="card-container image-desktop">
        <div>
          <img class="card-image" src="ressources/images/spacejoy-IH7wPsjwomc-unsplash.jpg" alt="" />
        </div>
        <div class="card-product-infos">
          <div class="card-description">
            <div class="card-product-name">Coombes</div>
            <div class="card-product-price">2,600</div>
          </div>
          <div class="card-product-type">louange</div>
          <div class="card-icons">
            <div class="card-stars">
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star_On.png" alt="Stars" />
              <img src="ressources/icons/Star.png" alt="Stars" />
            </div>
            <div class="card-shopping-cart">
              <img class="icon" src="ressources/icons/cart_push.png" alt="Cart button" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer class="footer">
    <div class="footer-container">
      <div class="pagination-btn first">1</div>
      <div class="pagination-btn">2</div>
      <div class="pagination-btn">3</div>
      <div class="pagination-btn">4</div>
      <div class="pagination-btn desktop-btn">5</div>
      <div class="pagination-btn desktop-btn">6</div>
      <div class="pagination-btn desktop-btn">7</div>
      <div class="pagination-btn desktop-btn">8</div>
      <div class="pagination-btn desktop-btn">9</div>
      <div class="pagination-btn desktop-btn">10</div>
      <div class="pagination-btn">></div>
    </div>
  </footer>
  <script type="text/javascript" defer>
    <?php include_once "./js/app.js" ?>
  </script>
</body>

</html>