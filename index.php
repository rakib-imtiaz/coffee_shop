<?php
    // Place this at the very top of your file, before any HTML output
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['adminLogin'])) {
            header('Location: /views/admin/admin_login.php');
            exit(); // Ensure the script stops here after the redirect
        }

        if (isset($_POST['customerLogin'])) {
            header('Location: /views/customer/customer_login.php');
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Little Avenue Coffee</title>


    <link rel="stylesheet" href="/assets/css/style.css">
    <link js>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"> <!-- Swiper.js -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/script.js" defer></script>

    <!-- font -->




</head>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


<body>

    <button id="mute-toggle" class="mute-btn" style="
    position: fixed; /* Stick to the viewport */
    bottom: 20px;    /* 20px from the bottom of the screen */
    left: 20px;      /* 20px from the left of the screen */
    background-color: #333;
    color: white;
    border: none;
    padding: 15px;
    cursor: pointer;
    border-radius: 50%;
    z-index: 10000;   /* High z-index to ensure it stays on top of everything */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
">
        <i id="mute-icon" class="fas fa-volume-up" style="font-size: 20px;"></i>
    </button>

    <audio id="background-music" loop autoplay>
        <source src="assets/sound_Track/track_1.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <header id="navbar">
        <div class="navbar">

            <ul>
                <li><a href="#shopping_cart">Bean Shopping Cart</a></li>
                <li><a href="#">Catering</a></li>
                <li><a href="#aboutus">About Us</a></li>


                <li><a href="#review">Review</a></li>
                <li><a href="#contact_us">Contact Us</a></li>
            </ul>



        </div>
    </header>

    <div class="container" style=" display: flex; flex-direction: column;">

        <section class="contact-us" data-aos="fade-up">
        </section>
        <section class="first-section " data-aos="fade-up">
            <div class="header-top">
                <div class="logo" style="text-align: center;">
                    <!-- <img src="assets/images/logo_canva.png" alt="Little Avenue Coffee Logo" style=" -->
                    <img src="assets/images/logo_new.png" alt="Little Avenue Coffee Logo" style="
                         /* Default logo size */
                        transition: transform 0.6s ease; /* Smooth transition for zoom and spin */
                    " onmouseover="this.style.transform='scale(1.4) rotate(360deg)';"
                        onmouseout="this.style.transform='scale(1.1) rotate(0deg)';"> <!-- Zoom and spin effect -->

                    <p id="blinkingText" style="
                        font-size: 45px; /* Large text size */
                        text-align: center;
                        font-style: italic;
                        font-weight: bold;
                        color: #6f4e37; /* Coffee-like color */
                        transition: transform 0.4s ease; /* Smooth transition for size change */
                        animation: blinkColor 1s infinite, changeFont 2s infinite; /* Blinking color and font change animations */
                    " onmouseover="this.style.transform='scale(1.2)';" onmouseout="this.style.transform='scale(1)';">
                        Little Avenue
                    </p>
                    <div style="padding-top: 50px;">

                        <button  id="loginBtn" class="loginBtn"><i class="fas fa-sign-in-alt"></i> Login</button>

                    

                        <button class="signup-btn"><i class="fas fa-user-plus"></i> Signup</button>

                    </div>
                    <button class="special-offer-btn"
                        style="background-color: #ffd700; cursor: pointer; padding: 10px; margin-top: 20px; border-radius: 10px; transition: background-color 0.3s ease, transform 0.3s ease;"
                        onmouseover="this.style.backgroundColor='#ff3737'; this.style.transform='scale(1.1)';"
                        onmouseout="this.style.backgroundColor='#ffd700'; this.style.transform='scale(1)';"><i
                            class="fas fa-gift"></i> Special Offer 25% off</button>
                    </ul>




                </div>
            </div>
        </section>

        <!-- Add the animation CSS inside the <style> tag -->
        <style>
            @keyframes blinkColor {
                0% {
                    color: #6f4e37;
                }

                /* Coffee brown */
                25% {
                    color: #4b3621;
                }

                /* Darker brown */
                50% {
                    color: #a0522d;
                }

                /* Lighter brown */
                75% {
                    color: #d2691e;
                }

                /* Reddish brown */
                100% {
                    color: #6f4e37;
                }

                /* Back to coffee brown */
            }

            @keyframes changeFont {
                0% {
                    font-family: 'Playfair Display', serif;
                }

                /* Default font */
                25% {
                    font-family: 'Cormorant Garamond', serif;
                }

                /* Vintage font 1 */
                50% {
                    font-family: 'Libre Baskerville', serif;
                }

                /* Vintage font 2 */
                75% {
                    font-family: 'Cinzel', serif;
                }

                /* Vintage font 3 */
                100% {
                    font-family: 'Playfair Display', serif;
                }

                /* Back to default */
            }
        </style>


        <section class="content" data-aos="fade-up">
            <div class="content-area"
                style="position: relative; overflow: hidden; width: 100%;border-radius: 10px; text-align: center;">
                <img src="assets/images/section_coffee_image.jpg" alt="Coffee Beans" style="
                        height: auto; 
                        width: 120vh; 
                        opacity: 0.8; 
                        transition: transform 2s ease-in-out, opacity 1s ease-in-out; 
                        transform: scale(1); 
                        box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.2);
                        border-radius: 10px;
                    " onmouseover="this.style.transform='scale(1.3)'; this.style.opacity='1';this.style.border"
                    onmouseout="this.style.transform='scale(1)'; this.style.opacity='0.8';">
            </div>
        </section>


        <!-- Our Premium Coffee Beans Section -->
        <section class="premium-coffee" data-aos="fade-up">
            <h2>Our Premium Coffee Beans</h2>
            <p>Discover the rich and aromatic flavors of our premium coffee beans, carefully selected and roasted to
                perfection. Whether you prefer a bold espresso or a smooth latte, our beans are perfect for any coffee
                lover.</p>
            <div class="cta-buttons">
                <button class="cta-btn">Book a Table</button>
                <button class="cta-btn">Online Order</button>
                <button class="cta-btn">Catering</button>
            </div>
        </section>

        <!-- Bean Guide Section -->
        <section class="bean-guide">
            <h2>Bean Guide</h2>
            <p>Discover the unique characteristics and flavors of our premium coffee beans. Each variety is carefully
                selected to provide a distinct coffee experience.</p>
        </section>



        <!-- Product Section with Vertical Scroll -->
        <h2 style="text-align: center;">Our Coffee Beans</h2>
        <br>
        <section id="shopping_cart" class="product-section">
            <div class="product-container">
                <!-- Product Card 1 -->
                <div class="product-card">
                    <img src="assets/images/DARK ROAST BEANS.jpeg" alt="Dark Roast Beans">
                    <div class="product-info">
                        <h3>Dark Roast Beans</h3>
                        <p>Deep, smoky flavor with a hint of spice.</p>
                        <p class="price">$12.99</p>
                        <button class="add-to-cart-btn">Add to Cart</button>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="product-card">
                    <img src="assets/images/DECAFFEINATED BEANS.jpeg" alt="Decaffeinated Beans">
                    <div class="product-info">
                        <h3>Decaffeinated Beans</h3>
                        <p>Mild, smooth, and full of flavor without the caffeine kick.</p>
                        <p class="price">$14.99</p>
                        <button class="add-to-cart-btn">Add to Cart</button>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="product-card">
                    <img src="assets/images/LIGHT ROAST BEANS.jpeg" alt="Light Roast Beans">
                    <div class="product-info">
                        <h3>Light Roast Beans</h3>
                        <p>Bright, citrusy flavor with a hint of fruit.</p>
                        <p class="price">$11.99</p>
                        <button class="add-to-cart-btn">Add to Cart</button>
                    </div>
                </div>
            </div>
        </section>


        <section class="content">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="assets/images/image1.png" alt="Slide 1"></div>
                    <div class="swiper-slide"><img src="assets/images/image2.png" alt="Slide 2"></div>
                    <div class="swiper-slide"><img src="assets/images/image3.png" alt="Slide 3"></div>
                    <div class="swiper-slide"><img src="assets/images/image4.jpeg" alt="Slide 4"></div>
                    <div class="swiper-slide"><img src="assets/images/image5.jpeg" alt="Slide 5"></div>
                    <div class="swiper-slide"><img src="assets/images/image6.jpeg" alt="Slide 6"></div>
                    <div class="swiper-slide"><img src="assets/images/image20.jpeg" alt="Slide 7"></div>
                    <div class="swiper-slide"><img src="assets/images/image8.jpeg" alt="Slide 8"></div>
                    <div class="swiper-slide"><img src="assets/images/image9.jpeg" alt="Slide 9"></div>
                    <div class="swiper-slide"><img src="assets/images/image19.jpeg" alt="Slide 10"></div>
                    <div class="swiper-slide"><img src="assets/images/image11.jpeg" alt="Slide 11"></div>
                    <div class="swiper-slide"><img src="assets/images/image12.jpeg" alt="Slide 12"></div>
                    <div class="swiper-slide"><img src="assets/images/image13.jpeg" alt="Slide 13"></div>
                    <!-- Add more slides as needed -->
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Navigation buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>
        <h2 style="text-align: center;">What Our Customers Say</h2>
        <br>

        <section id="review" class="reviews-section"
            style="display: flex; justify-content: space-around; padding: 40px; background-color: #ffe1a2; margin-bottom: 50px;">

            <div class="review-card"
                style="background-color: white; border: 2px solid #ccc; border-radius: 10px; padding: 20px; text-align: center; width: 30%; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease-in-out;">
                <img src="assets/images/reviewer.png" alt="Reviewer 1" class="reviewer-img"
                    style="width: 100px; height: 100px; border-radius: 50%; margin-bottom: 20px;">
                <p>Happy reviewer is super excited being part of happy addons family.</p>
                <h3>Evan Rachel</h3>
                <p>Happy Officer</p>
                <div class="star-rating">
                    <i class="fas fa-star" style="color: #f39c12;"></i>
                    <i class="fas fa-star" style="color: #f39c12;"></i>
                    <i class="fas fa-star" style="color: #f39c12;"></i>
                    <i class="fas fa-star-half-alt" style="color: #f39c12;"></i>
                    <i class="far fa-star" style="color: #ccc;"></i>
                </div>
            </div>

            <div class="review-card"
                style="background-color: white; border: 2px solid #ccc; border-radius: 10px; padding: 20px; text-align: center; width: 30%; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease-in-out;">
                <img src="assets/images/reviewer.png" alt="Reviewer 2" class="reviewer-img"
                    style="width: 100px; height: 100px; border-radius: 50%; margin-bottom: 20px;">
                <p>Happy reviewer is super excited being part of happy addons family.</p>
                <h3>Louis Hoffman</h3>
                <p>Happy Officer</p>
                <div class="star-rating">
                    <i class="fas fa-star" style="color: #f39c12;"></i>
                    <i class="fas fa-star" style="color: #f39c12;"></i>
                    <i class="fas fa-star" style="color: #f39c12;"></i>
                    <i class="fas fa-star" style="color: #f39c12;"></i>
                    <i class="far fa-star" style="color: #ccc;"></i>
                </div>
            </div>

            <div class="review-card"
                style="background-color: white; border: 2px solid #ccc; border-radius: 10px; padding: 20px; text-align: center; width: 30%; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease-in-out;">
                <img src="assets/images/reviewer.png" alt="Reviewer 3" class="reviewer-img"
                    style="width: 100px; height: 100px; border-radius: 50%; margin-bottom: 20px;">
                <p>Happy reviewer is super excited being part of happy addons family.</p>
                <h3>Thoma Midleditch</h3>
                <p>Happy Officer</p>
                <div class="star-rating">
                    <i class="fas fa-star" style="color: #f39c12;"></i>
                    <i class="fas fa-star" style="color: #f39c12;"></i>
                    <i class="fas fa-star" style="color: #f39c12;"></i>
                    <i class="fas fa-star" style="color: #f39c12;"></i>
                    <i class="fas fa-star" style="color: #f39c12;"></i>
                </div>
            </div>

        </section>

        <script>
            // Add a hover effect to make the review cards pop out
            const reviewCards = document.querySelectorAll('.review-card');

            reviewCards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'scale(1.12)';
                });
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'scale(1)';
                });
            });
        </script>


        <!-- About Us Section -->
        <section id="aboutus" class="about-us" style="transform: scale(.7);transform-origin: top;">
            <h2>About Us</h2>
            <p>At Little Avenue Des Italians, our passion for coffee began many years ago with a small café in the heart
                of the city. Our founders, inspired by their love for Italian coffee culture, sought to create a place
                where people could come together to enjoy exceptional coffee and warm hospitality. Today, we continue
                this tradition, offering a unique blend of premium coffee, delightful pastries, and a welcoming
                atmosphere. Join us on our journey as we share our love for coffee with the world.</p>
            <h3>Our Story</h3>
            <p>Our journey began in a quaint little café where our founders first discovered their love for coffee. Over
                the years, we've grown and evolved, but our commitment to quality and community remains the same. From
                sourcing the finest beans to perfecting our brewing techniques, we strive to provide an unparalleled
                coffee experience.</p>
            <h3>Our Mission</h3>
            <p>Our mission is to create a space where people can come together to enjoy great coffee and connect with
                one another. We believe that coffee is more than just a drink; it's a way to bring people together and
                foster a sense of community. We are dedicated to sustainability, quality, and customer satisfaction.</p>
            <h3>Meet The Team</h3>
            <p>Our team is made up of passionate coffee lovers who are dedicated to delivering the best coffee
                experience. From our skilled baristas to our friendly staff, everyone at Little Avenue Des Italians is
                committed to making your visit memorable.</p>
        </section>


        <section id="contact_us" class="contact-section">
            <!-- Overlay for low opacity effect -->
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.5); z-index: 1;">
            </div>

            <!-- Content section, ensure it is above the overlay -->
            <div style="position: relative; z-index: 2;">
                <h2 style="font-family: 'Playfair Display', serif; font-size: 36px; color: #333;">Contact Us</h2>
                <p style="font-family: 'Playfair Display', serif; font-size: 18px; color: black; margin-bottom: 40px;">
                    We'd love to hear from you! Reach out to us with any inquiries or just to say hello.
                </p>

                <!-- Contact Details -->
                <div class="contact-details"
                    style="display: flex; justify-content: space-around; align-items: center; margin-bottom: 40px;">
                    <div class="contact-info" style="flex-basis: 40%;">
                        <p style="font-size: 20px; color: #333; font-weight: bold;">Little Avenue Des Italians</p>
                        <p style="font-size: 18px; color: #333; margin-bottom: 10px;">Established 2016</p>
                        <p style="font-size: 18px; color: #333; margin-bottom: 20px;">
                            <i class="fas fa-map-marker-alt"></i> 428 Little Bourke St, Melbourne VIC 3000
                        </p>
                        <p style="font-size: 18px; color: #333; margin-bottom: 20px;">
                            <i class="fas fa-clock"></i> Open Mon - Fri
                        </p>
                        <p style="font-size: 18px; color: #333; margin-bottom: 20px;">
                            <i class="fas fa-envelope"></i> avenuedesitalians@yahoo.com.au
                        </p>

                        <!-- Social Media Links -->
                        <div style="display: flex; justify-content: center; gap: 20px; margin-top: 20px;">
                            <a href="https://www.facebook.com/" target="_blank">
                                <img src="assets/images/facebook.png" alt="Facebook" style="width: 40px; height: 40px;">
                            </a>
                            <a href="https://www.twitter.com/" target="_blank">
                                <img src="assets/images/twitter.png" alt="Twitter" style="width: 40px; height: 40px;">
                            </a>
                            <a href="https://www.instagram.com/" target="_blank">
                                <img src="assets/images/instagram.png" alt="Instagram"
                                    style="width: 40px; height: 40px;">
                            </a>
                        </div>
                    </div>

                    <!-- Mini Google Map -->
                    <div class="google-map" style="flex-basis: 40%; position: relative;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2438.424436434217!2d-1.1442446496544444!3d52.633528979765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48775c5a7c9f2f6d%3A0x9e9faa7a4dbd8c7d!2sLittleavenue%2C%20Raw%20Dykes%20Rd%2C%20Leicester%20LE2%207JU%2C%20United%20Kingdom!5e0!3m2!1sen!2sus!4v1616660832877!5m2!1sen!2sus"
                            width="300" height="200" style="border:0; border-radius: 10px; transition: all 0.3s ease;"
                            allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

                <!-- JavaScript for hover expand -->
                <script>
                    const map = document.querySelector('.google-map iframe');
                    let hoverTimer;

                    map.addEventListener('mouseenter', () => {
                        hoverTimer = setTimeout(() => {
                            map.style.width = '600px';  // Expand width
                            map.style.height = '400px'; // Expand height
                        }, 100); // 3 seconds delay
                    });

                    map.addEventListener('mouseleave', () => {
                        clearTimeout(hoverTimer); // Clear timer if hover stops before 3 seconds
                        map.style.width = '300px';  // Return to original width
                        map.style.height = '200px'; // Return to original height
                    });
                </script>

                <!-- Form Section -->
                <form style="max-width: 600px; margin: 0 auto;">
                    <input type="text" placeholder="Your Name"
                        style="width: 100%; padding: 15px; margin-bottom: 20px; font-size: 16px; border: 1px solid #ccc; border-radius: 8px;">
                    <input type="email" placeholder="Your Email"
                        style="width: 100%; padding: 15px; margin-bottom: 20px; font-size: 16px; border: 1px solid #ccc; border-radius: 8px;">
                    <textarea placeholder="Your Message" rows="5"
                        style="width: 100%; padding: 15px; margin-bottom: 20px; font-size: 16px; border: 1px solid #ccc; border-radius: 8px;"></textarea>
                    <button type="submit"
                        style="background-color: #333; color: white; padding: 15px 30px; font-size: 16px; border: none; border-radius: 8px; cursor: pointer;">Send
                        Message</button>
                </form>


            </div>
        </section>








        <!-- <button id="mute-toggle" class="mute-btn">
            <i id="mute-icon" class="fas fa-volume-up"></i>
        </button> -->



<!-- Modal for selecting Login type -->
<div id="loginModal" class="modal">
  <div class="modal-content">
    <h3>Login As:</h3>
    <!-- Wrap buttons in a form -->
    <form method="POST">
      <button class="login-option-btn" name="adminLogin">Admin</button>
      <button class="login-option-btn" name="customerLogin">Customer</button>
    </form>
  </div>
</div>



        <!-- Footer Section -->
        <footer
            style="background-color: #333; color: white; padding: 40px 0; text-align: center; position: relative; font-family: 'Playfair Display', serif;">
            <div class="footer-container"
                style="max-width: 1200px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: flex-start; padding: 0 20px;">

                <!-- About Section -->
                <div class="footer-about" style="flex-basis: 30%; margin-bottom: 20px;">
                    <h3 style="font-size: 24px; font-weight: bold; margin-bottom: 15px;">Little Avenue Des Italians</h3>
                    <p style="font-size: 16px; line-height: 1.6;">Established About Us
                        in 2016, Little Avenue Des Italians is a
                        passion-driven café offering the finest coffee experiences in Melbourne. Join us to enjoy
                        delightful coffee and warm hospitality.</p>
                </div>

                <!-- Quick Links Section -->
                <div class="footer-links" style="flex-basis: 20%; margin-bottom: 20px;">
                    <h3 style="font-size: 24px; font-weight: bold; margin-bottom: 15px;">Quick Links</h3>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="#"
                                style="color: white; text-decoration: none; font-size: 16px; margin-bottom: 10px; display: block;">Home</a>
                        </li>
                        <li><a href="#"
                                style="color: white; text-decoration: none; font-size: 16px; margin-bottom: 10px; display: block;">Menu</a>
                        </li>
                        <li><a href="#"
                                style="color: white; text-decoration: none; font-size: 16px; margin-bottom: 10px; display: block;">Contact
                                Us</a></li>
                        <li><a href="#"
                                style="color: white; text-decoration: none; font-size: 16px; margin-bottom: 10px; display: block;">About
                                Us</a></li>
                    </ul>
                </div>

                <!-- Contact Info Section -->
                <div class="footer-contact" style="flex-basis: 30%; margin-bottom: 20px;">
                    <h3 style="font-size: 24px; font-weight: bold; margin-bottom: 15px;">Contact Us</h3>
                    <p style="font-size: 16px; margin-bottom: 10px;"><i class="fas fa-map-marker-alt"></i> 428 Little
                        Bourke St, Melbourne VIC 3000</p>
                    <p style="font-size: 16px; margin-bottom: 10px;"><i class="fas fa-envelope"></i>
                        avenuedesitalians@yahoo.com.au</p>
                    <p style="font-size: 16px; margin-bottom: 10px;"><i class="fas fa-phone-alt"></i> +61 555 123 456
                    </p>
                </div>

                <!-- Social Media Links -->
                <div class="footer-social" style="flex-basis: 100%; margin-top: 20px;">
                    <h3 style="font-size: 24px; font-weight: bold; margin-bottom: 15px;">Follow Us</h3>
                    <div style="display: flex; justify-content: center; gap: 20px;">
                        <a href="https://www.facebook.com" target="_blank">
                            <img src="assets/images/facebook.png" alt="Facebook" style="width: 40px; height: 40px;">
                        </a>
                        <a href="https://www.twitter.com" target="_blank">
                            <img src="assets/images/twitter.png" alt="Twitter" style="width: 40px; height: 40px;">
                        </a>
                        <a href="https://www.instagram.com" target="_blank">
                            <img src="assets/images/instagram.png" alt="Instagram" style="width: 40px; height: 40px;">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div style="margin-top: 30px; font-size: 14px; color: #ccc;">
                &copy; 2024 Little Avenue Des Italians. All Rights Reserved.
            </div>
        </footer>


        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
</body>

</html>