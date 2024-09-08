<?php include('includes/header.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Little Avenue Coffee</title>
        <link rel="stylesheet" href="style.css">
        <link js>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"> <!-- Swiper.js -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="script.js"></script>

        <!-- font -->
         



    </head>
    
</head>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<body>
    <audio id="background-music" loop autoplay>
        <source src="Assets/sound_Track/track_1.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    
    <header>
        <div class="navbar">
            <div class="nav-left">
                <ul>
                    <li><a href="#">Bean Shopping Cart</a></li>
                    <!-- <li><a href="#">Shopping</a></li> -->
                    <li><a href="#">Catering</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
            </div>
            <!-- <div class="nav-center">
                <a href="#" class="logo"><img src="Assets/Images/logo_canva.png" alt="Little Avenue Coffee Logo"></a>
            </div> -->
            <div class="nav-right">
                <ul>
                    <li><a href="#">Review</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <!-- <li><a href="#">Location</a></li> -->
                    <li><button class="login-btn"><i class="fas fa-sign-in-alt"></i> Login</button></li>
                    <li><button class="signup-btn"><i class="fas fa-user-plus"></i> Signup</button></li>
                </ul>
            </div>
        </div>
    </header>
    
    <div class="container">

     

        <section class="first-section">
            <div class="header-top">
                <div class="special-offer">
                    <!-- <button style="background-color: rgb(185, 185, 185);" class="special-offer-btn">Check Out Our Special Offer</button> -->
                </div>
                <!-- <div class="auth-buttons">
                    <button class="login-btn"><i class="fas fa-sign-in-alt"></i> Login</button>
                    <button class="signup-btn"><i class="fas fa-user-plus"></i> Signup</button>
                </div> -->
                
            </div>
            
            <div class="logo">
                <img src="Assets/Images/logo_canva.png" alt="Little Avenue Coffee Logo">
            </div>
            <p style="font-size: 35px;text-align: center;font-style: italic;">Little Avenue</p>

        </section>

      


        <section class="content" data-aos="fade-up">
            <div class="content-area">
                <img style=" height: 50vh; width: 120vh; opacity: 80%;" src="Assets/Images/section_coffee_image.jpg" alt="Coffee Beans">
            </div>
        </section>

        <!-- Our Premium Coffee Beans Section -->
        <section class="premium-coffee" data-aos="fade-up">
            <h2>Our Premium Coffee Beans</h2>
            <p>Discover the rich and aromatic flavors of our premium coffee beans, carefully selected and roasted to perfection. Whether you prefer a bold espresso or a smooth latte, our beans are perfect for any coffee lover.</p>
            <div class="cta-buttons">
                <button class="cta-btn">Book a Table</button>
                <button class="cta-btn">Online Order</button>
                <button class="cta-btn">Catering</button>
            </div>
        </section>

        <!-- Bean Guide Section -->
        <section class="bean-guide" data-aos="fade-up">
            <h2>Bean Guide</h2>
            <p>Discover the unique characteristics and flavors of our premium coffee beans. Each variety is carefully selected to provide a distinct coffee experience.</p>
        </section>

        <!-- Arabica Section -->
        <section class="arabica-section" data-aos="fade-up">
            <h2>Arabica</h2>
            <p>Arabica beans are celebrated for their smooth, sweet flavor profile and high acidity. These beans often exhibit notes of fruit and sugar, complemented by hints of chocolate and nuts. Ideal for a sophisticated and flavorful coffee experience.</p>
            <div class="arabica-info">
                <p><strong>Origin:</strong> Ethiopia</p>
                <p><strong>Tasting Notes:</strong> Fruity, Sugary, Chocolate, Nuts</p>
                <p><strong>Brewing Tips:</strong> Use a pour-over or drip coffee maker to enhance the delicate flavors.</p>
            </div>
        </section>

     <section class="content" data-aos="fade-up">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="Assets/Images/image1.png" alt="Slide 1"></div>
            <div class="swiper-slide"><img src="Assets/Images/image2.png" alt="Slide 2"></div>
            <div class="swiper-slide"><img src="Assets/Images/image3.png" alt="Slide 3"></div>
            <!-- Add more slides as needed -->
        </div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Navigation buttons -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>


        <!-- About Us Section -->
        <section class="about-us" data-aos="fade-up">
            <h2>About Us</h2>
            <p>At Little Avenue Des Italians, our passion for coffee began many years ago with a small café in the heart of the city. Our founders, inspired by their love for Italian coffee culture, sought to create a place where people could come together to enjoy exceptional coffee and warm hospitality. Today, we continue this tradition, offering a unique blend of premium coffee, delightful pastries, and a welcoming atmosphere. Join us on our journey as we share our love for coffee with the world.</p>
            <h3>Our Story</h3>
            <p>Our journey began in a quaint little café where our founders first discovered their love for coffee. Over the years, we've grown and evolved, but our commitment to quality and community remains the same. From sourcing the finest beans to perfecting our brewing techniques, we strive to provide an unparalleled coffee experience.</p>
            <h3>Our Mission</h3>
            <p>Our mission is to create a space where people can come together to enjoy great coffee and connect with one another. We believe that coffee is more than just a drink; it's a way to bring people together and foster a sense of community. We are dedicated to sustainability, quality, and customer satisfaction.</p>
            <h3>Meet The Team</h3>
            <p>Our team is made up of passionate coffee lovers who are dedicated to delivering the best coffee experience. From our skilled baristas to our friendly staff, everyone at Little Avenue Des Italians is committed to making your visit memorable.</p>
        </section>
    </div>


     <!-- Mute/Unmute Button -->
     <button id="mute-toggle" class="mute-btn">
        <i id="mute-icon" class="fas fa-volume-up"></i>
    </button>


    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
<?php include('includes/footer.php'); ?>
