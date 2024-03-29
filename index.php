<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/main_page.css" />
  <title>FitNation</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script>
    // Get the button element
    const browseButton = document.getElementById('middle-button');

    // Add a click event listener to the button
    browseButton.addEventListener('click', function(event) {
      // Prevent the default behavior of the anchor tag
      event.preventDefault();

      // Get the element to scroll to
      const browseSection = document.getElementById('browse-section');

      // Scroll to the element smoothly
      browseSection.scrollIntoView({
        behavior: 'smooth'
      });
    });
  </script>
</head>

<body>
  <main>
    <nav>
      <div class="navigation-bar">
        <div class="navigation-bar-logo">
          <img src="assets/img/logo.png" alt="logo" />
        </div>
        <ul class="navigation-bar-options">
          <li><a href="">home</a></li>
          <li><a href="about.php">about</a></li>
          <li><a href="fitmotionai.php">challenge</a></li>
          <li><a href="blog.php">blog</a></li>
          <li><a href="worldmap.html">locations</a></li>
          <li><a href="scoreboard.php">score board</a></li>
        </ul>
        <?php
        session_start();
        if (isset($_SESSION['user'])) {
          echo '<a href="logout.php"><button class="sign-in-button">sign out</button></a>';
        } else {
          echo '<a href="login.php"><button class="sign-in-button">sign in</button></a>';
        }
        ?>
        <!-- <a href="login.php">
            <button class="sign-in-button">sign in</button>
          </a> -->
      </div>
    </nav>
    <div>
      <div class="middle-spot">
        <h1 class="middle-text1">Welcome to FitNation</h1>
        <h1 class="middle-text2">Gym Trainer</h1>
        <a href="#browse-section">
          <button id="middle-button" class="middle-button">browse</button>
        </a>
      </div>
    </div>
  </main style="background: url('assets/img/background_image.png');">
  <section id="browse-section" class="training-type">
    <div class="training-type-container">
      <div class="personal">
        <div class="text-overlay">
          <h1>Exercises Section</h1>
          <p>
            Browse different exercises for different body parts using different equipments. Add them to your favorites and access them simultaneously

          </p>
          <div>
            <a href="exercise_page.php">
              <button class="training-button">Browse Exercises</button>
            </a>
          </div>
        </div>
        <img src="assets/img/personal_training.png" alt="" />
      </div>
      <div class="group">
        <div class="text-overlay">
          <h1>Receipes Section</h1>
          <p>
            Browse different receipes using a search engine. Get detailed macros about each receipe.
          </p>
          <div>
            <a href="food_page.php">
              <button class="training-button">Browse Receipes</button>
            </a>
          </div>
        </div>
        <img src="assets/img/food-section-pic.jpg" alt="" />
      </div>
    </div>
  </section>
  <section id="wif">
    <div id="wif-text-section">
      <h1 class="wif-text">what I offer</h1>
    </div>
    <div id="wif-pics-section" class="flex-container">
      <div class="wif-pic-container">
        <div class="wif-pic">
          <img src="assets/img/team1.png" alt="Body Building Image">
        </div>
        <div class="wif-cap">
          <h5>body building</h5>
          <p>Sculpt Your Success - Transform Your Body with Precision and Power!</p>
        </div>
      </div>
      <div class="wif-pic-container">
        <div class="wif-pic">
          <img src="assets/img/team2.png" alt="Muscle Gain Image">
        </div>
        <div class="wif-cap">
          <h5>muscle gain</h5>
          <p>Build Beyond Limits - Unlock Your Muscle Potential, One Rep at a Time!</p>
        </div>
      </div>
      <div class="wif-pic-container">
        <div class="wif-pic">
          <img src="assets/img/team3.png" alt="Weight Loss Image">
        </div>
        <div class="wif-cap">
          <h5>weight Loss</h5>
          <p>Shed, Shape, Shine - Unveil Your Best Self with Every Step Towards Wellness!</p>
        </div>
      </div>
    </div>
  </section>
  <section id="pricing-reach-section">
    <div id="pricing-section">
      <div id="pricing-label">
        <h1>pricing</h1>
      </div>
      <div>
        <div class="pricing">
          <div class="pricing-icon">
            <img src="assets/icons/price.png" alt="">
          </div>
          <div class="pricing-offer">
            <h5>3 month</h5>
            <h6>2200 EGP <sub>(Ninja)</sub></h6>
          </div>
          <div class="pricing-list">
            <ul>
              <li class="yes">Free Riding</li>
              <li class="yes">Unlimited Equipments</li>
              <li class="no">Personal Trainer</li>
              <li class="no">Weight Losing Classes</li>
              <li class="no">Month to Mouth</li>
            </ul>
          </div>
        </div>
        <div class="pricing">
          <div class="pricing-icon">
            <img src="assets/icons/price.png" alt="">
          </div>
          <div class="pricing-offer">
            <h5>6 month</h5>
            <h6>3000 EGP <sub>(Morph)</sub></h6>
          </div>
          <div class="pricing-list">
            <ul>
              <li class="yes">Free Riding</li>
              <li class="yes">Unlimited Equipments</li>
              <li class="no">Personal Trainer</li>
              <li class="yes">Weight Losing Classes</li>
              <li class="no">Month to Mouth</li>
            </ul>
          </div>
        </div>
        <div class="pricing">
          <div class="pricing-icon">
            <img src="assets/icons/price.png" alt="">
          </div>
          <div class="pricing-offer">
            <h5>9 month</h5>
            <h6>5000 EGP <sub>(Tank)</sub></h6>
          </div>
          <div class="pricing-list">
            <ul>
              <li class="yes">Free Riding</li>
              <li class="yes">Unlimited Equipments</li>
              <li class="yes">Personal Trainer</li>
              <li class="yes">Weight Losing Classes</li>
              <li class="yes">Month to Mouth</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="footer">
    <div class="container">
      <div class="body">
        <div class="footer-column">
          <h4>company</h4>
          <ul>
            <li><a href="about.php">about us</a></li>
            <li><a href="worldmap.html">locations</a></li>
          </ul>
        </div>
        <div class="footer-column">
          <h4>get help</h4>
          <ul>
            <li><a target="_blank" href="https://sunnyhealthfitness.com/blogs/health-wellness/top-frequently-asked-fitness-questions-answered" style="text-transform: uppercase;">faq</a></li>
          </ul>
        </div>
        <div class="footer-column">
          <h4>what we offer</h4>
          <ul>
            <li><a href="exercise_page.php">exercises</a></li>
            <li><a href="food_page.php">receipes</a></li>
          </ul>
        </div>
        <div class="footer-column">
          <h4>follow us</h4>
          <div class="social-links">
            <a target="_blank" href="https://www.facebook.com/profile.php?id=61555159465580"><i class="fab fa-facebook-f"></i></a>
            <a target="_blank" href="https://www.instagram.com/fit_nationn_?igsh=OGQ5ZDc2ODk2ZA=="><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--gded-->
  <script>
    window.addEventListener('scroll', function() {
      var navigationBar = document.querySelector('.navigation-bar');
      if (window.scrollY > 0) {
        navigationBar.classList.add('navigation-bar-scrolled');
      } else {
        navigationBar.classList.remove('navigation-bar-scrolled');
      }
    });
  </script>

</body>

</html>