<!-- public/index.php -->
<?php include './includes/header.php'; ?>

<style>

    main {
        transform: scale(.94);
    }
</style>

<main class="pt-20">

    <!-- Hero Section -->
    <section class="flex items-center justify-center h-screen bg-cover bg-center" style="background-image: url('/assets/images/section_coffee_image.jpg');">
        <div class="text-center text-white" data-aos="fade-up">
            <h1 class="text-5xl font-bold mb-6">Welcome to Little Avenue Coffee</h1>
            <p class="text-lg mb-6">Discover our premium coffee experience</p>
            <div class="flex justify-center space-x-4">
                <a href="#shopping_cart" class="bg-brown-500 text-white px-6 py-3 rounded-full hover:bg-brown-600 transition">Shop Now</a>
                <a href="#bean-guide" class="bg-gray-800 text-white px-6 py-3 rounded-full hover:bg-gray-700 transition">Learn More</a>
            </div>
        </div>
    </section>

    <!-- Premium Coffee Beans Section -->
    <section class="py-16 bg-white" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-brown-700 mb-6">Our Premium Coffee Beans</h2>
            <p class="text-lg text-gray-600 mb-8">Discover the rich and aromatic flavors of our premium coffee beans, carefully selected and roasted to perfection. Whether you prefer a bold espresso or a smooth latte, our beans are perfect for any coffee lover.</p>
            <div class="flex justify-center space-x-4">
                <a href="#" class="bg-gray-800 text-white px-6 py-3 rounded-full hover:bg-gray-700 transition">Book a Table</a>
                <a href="#" class="bg-brown-500 text-white px-6 py-3 rounded-full hover:bg-brown-600 transition">Online Order</a>
                <a href="#" class="bg-brown-500 text-white px-6 py-3 rounded-full hover:bg-brown-600 transition">Catering</a>
            </div>
        </div>
    </section>

    <!-- Bean Guide Section -->
    <section id="bean-guide" class="py-16 bg-gray-100" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-brown-700 mb-6">Bean Guide</h2>
            <p class="text-lg text-gray-600 mb-8">Discover the unique characteristics and flavors of our premium coffee beans. Each variety is carefully selected to provide a distinct coffee experience.</p>
        </div>
    </section>

    <!-- Product Section with Vertical Scroll -->
    <section id="shopping_cart" class="py-16 bg-gray-200" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-brown-700 text-center mb-8">Our Coffee Beans</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 overflow-y-auto h-96 p-4 bg-white rounded-lg shadow-md">
                <!-- Product Card 1 -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden transition transform hover:scale-105">
                    <img src="/assets/images/DARK ROAST BEANS.jpeg" alt="Dark Roast Beans" class="w-full h-48 object-cover lazy-load" loading="lazy">
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-800">Dark Roast Beans</h3>
                        <p class="text-sm text-gray-600">Deep, smoky flavor with a hint of spice.</p>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-xl font-bold text-gray-800">$12.99</span>
                            <button class="bg-brown-500 text-white px-4 py-2 rounded-full hover:bg-brown-600 transition">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden transition transform hover:scale-105">
                    <img src="/assets/images/DECAFFEINATED BEANS.jpeg" alt="Decaffeinated Beans" class="w-full h-48 object-cover lazy-load" loading="lazy">
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-800">Decaffeinated Beans</h3>
                        <p class="text-sm text-gray-600">Mild, smooth, and full of flavor without the caffeine kick.</p>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-xl font-bold text-gray-800">$14.99</span>
                            <button class="bg-brown-500 text-white px-4 py-2 rounded-full hover:bg-brown-600 transition">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden transition transform hover:scale-105">
                    <img src="/assets/Images/DECAFFEINATED BEANS.jpeg" alt="Light Roast Beans" class="w-full h-48 object-cover lazy-load" loading="lazy">
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-800">Light Roast Beans</h3>
                        <p class="text-sm text-gray-600">Bright, citrusy flavor with a hint of fruit.</p>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-xl font-bold text-gray-800">$11.99</span>
                            <button class="bg-brown-500 text-white px-4 py-2 rounded-full hover:bg-brown-600 transition">Add to Cart</button>
                        </div>
                    </div>
                </div>

                <!-- Add more product cards as needed -->
            </div>
        </div>
    </section>

    <!-- Image Slider Section -->
    <section class="py-16 bg-white" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-brown-700 text-center mb-8">Gallery</h2>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="/assets/images/image1.png" alt="Slide 1" class="w-full h-64 object-cover rounded-lg lazy-load" loading="lazy"></div>
                    <div class="swiper-slide"><img src="/assets/images/image2.png" alt="Slide 2" class="w-full h-64 object-cover rounded-lg lazy-load" loading="lazy"></div>
                    <div class="swiper-slide"><img src="/assets/images/image3.png" alt="Slide 3" class="w-full h-64 object-cover rounded-lg lazy-load" loading="lazy"></div>
                    <div class="swiper-slide"><img src="/assets/images/image4.jpeg" alt="Slide 4" class="w-full h-64 object-cover rounded-lg lazy-load" loading="lazy"></div>
                    <div class="swiper-slide"><img src="/assets/images/image5.jpeg" alt="Slide 5" class="w-full h-64 object-cover rounded-lg lazy-load" loading="lazy"></div>
                    <div class="swiper-slide"><img src="/assets/images/image6.jpeg" alt="Slide 6" class="w-full h-64 object-cover rounded-lg lazy-load" loading="lazy"></div>
                    <div class="swiper-slide"><img src="/assets/images/image20.jpeg" alt="Slide 7" class="w-full h-64 object-cover rounded-lg lazy-load" loading="lazy"></div>
                    <div class="swiper-slide"><img src="/assets/images/image8.jpeg" alt="Slide 8" class="w-full h-64 object-cover rounded-lg lazy-load" loading="lazy"></div>
                    <div class="swiper-slide"><img src="/assets/images/image9.jpeg" alt="Slide 9" class="w-full h-64 object-cover rounded-lg lazy-load" loading="lazy"></div>
                    <div class="swiper-slide"><img src="/assets/images/image19.jpeg" alt="Slide 10" class="w-full h-64 object-cover rounded-lg lazy-load" loading="lazy"></div>
                    <div class="swiper-slide"><img src="/assets/images/image11.jpeg" alt="Slide 11" class="w-full h-64 object-cover rounded-lg lazy-load" loading="lazy"></div>
                    <div class="swiper-slide"><img src="/assets/images/image12.jpeg" alt="Slide 12" class="w-full h-64 object-cover rounded-lg lazy-load" loading="lazy"></div>
                    <div class="swiper-slide"><img src="/assets/images/image13.jpeg" alt="Slide 13" class="w-full h-64 object-cover rounded-lg lazy-load" loading="lazy"></div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    <!-- Customer Reviews Section -->
    <section id="review" class="py-16 bg-yellow-100" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-brown-700 text-center mb-8">What Our Customers Say</h2>
            <div class="flex flex-col md:flex-row justify-around items-center space-y-8 md:space-y-0">
                <!-- Review Card 1 -->
                <div class="bg-white shadow-lg rounded-lg p-6 w-full md:w-1/3 transform hover:scale-105 transition">
                    <img src="/assets/images/reviewer.png" alt="Reviewer 1" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <p class="text-gray-700 mb-4">Happy reviewer is super excited being part of happy addons family.</p>
                    <h3 class="text-lg font-semibold text-gray-800">Evan Rachel</h3>
                    <p class="text-sm text-gray-600">Happy Officer</p>
                    <div class="flex justify-center mt-2">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star-half-alt text-yellow-400"></i>
                        <i class="far fa-star text-gray-400"></i>
                    </div>
                </div>

                <!-- Review Card 2 -->
                <div class="bg-white shadow-lg rounded-lg p-6 w-full md:w-1/3 transform hover:scale-105 transition">
                    <img src="/assets/images/reviewer.png" alt="Reviewer 2" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <p class="text-gray-700 mb-4">Happy reviewer is super excited being part of happy addons family.</p>
                    <h3 class="text-lg font-semibold text-gray-800">Louis Hoffman</h3>
                    <p class="text-sm text-gray-600">Happy Officer</p>
                    <div class="flex justify-center mt-2">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="far fa-star text-gray-400"></i>
                    </div>
                </div>

                <!-- Review Card 3 -->
                <div class="bg-white shadow-lg rounded-lg p-6 w-full md:w-1/3 transform hover:scale-105 transition">
                    <img src="/assets/images/reviewer.png" alt="Reviewer 3" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <p class="text-gray-700 mb-4">Happy reviewer is super excited being part of happy addons family.</p>
                    <h3 class="text-lg font-semibold text-gray-800">Thoma Midleditch</h3>
                    <p class="text-sm text-gray-600">Happy Officer</p>
                    <div class="flex justify-center mt-2">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="aboutus" class="py-16 bg-black text-white" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-6">About Us</h2>
            <p class="text-lg mb-6">At Little Avenue Des Italians, our passion for coffee began many years ago with a small café in the heart of the city. Our founders, inspired by their love for Italian coffee culture, sought to create a place where people could come together to enjoy exceptional coffee and warm hospitality. Today, we continue this tradition, offering a unique blend of premium coffee, delightful pastries, and a welcoming atmosphere. Join us on our journey as we share our love for coffee with the world.</p>
            <h3 class="text-2xl font-semibold mb-4">Our Story</h3>
            <p class="text-md mb-6">Our journey began in a quaint little café where our founders first discovered their love for coffee. Over the years, we've grown and evolved, but our commitment to quality and community remains the same. From sourcing the finest beans to perfecting our brewing techniques, we strive to provide an unparalleled coffee experience.</p>
            <h3 class="text-2xl font-semibold mb-4">Our Mission</h3>
            <p class="text-md mb-6">Our mission is to create a space where people can come together to enjoy great coffee and connect with one another. We believe that coffee is more than just a drink; it's a way to bring people together and foster a sense of community. We are dedicated to sustainability, quality, and customer satisfaction.</p>
            <h3 class="text-2xl font-semibold mb-4">Meet The Team</h3>
            <p class="text-md">Our team is made up of passionate coffee lovers who are dedicated to delivering the best coffee experience. From our skilled baristas to our friendly staff, everyone at Little Avenue Des Italians is committed to making your visit memorable.</p>
        </div>
    </section>

    <!-- Contact Us Section -->
    <section id="contact_us" class="py-16 bg-gray-200" data-aos="fade-up">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-brown-700 text-center mb-8">Contact Us</h2>
            <div class="flex flex-col md:flex-row justify-between items-center space-y-8 md:space-y-0">
                <!-- Contact Details -->
                <div class="flex-1 text-center md:text-left">
                    <p class="text-lg text-gray-700 mb-4"><i class="fas fa-map-marker-alt mr-2"></i>428 Little Bourke St, Melbourne VIC 3000</p>
                    <p class="text-lg text-gray-700 mb-4"><i class="fas fa-envelope mr-2"></i>avenuedesitalians@yahoo.com.au</p>
                    <p class="text-lg text-gray-700 mb-4"><i class="fas fa-phone-alt mr-2"></i>+61 555 123 456</p>
                    <!-- Social Media Icons -->
                    <div class="flex justify-center md:justify-start space-x-4 mt-4">
                        <a href="https://www.facebook.com" target="_blank" class="hover:text-gray-400 transition"><i class="fab fa-facebook-f fa-lg"></i></a>
                        <a href="https://www.twitter.com" target="_blank" class="hover:text-gray-400 transition"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="https://www.instagram.com" target="_blank" class="hover:text-gray-400 transition"><i class="fab fa-instagram fa-lg"></i></a>
                    </div>
                </div>

                <!-- Google Map -->
                <div class="flex-1">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2438.424436434217!2d-1.1442446496544444!3d52.633528979765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48775c5a7c9f2f6d%3A0x9e9faa7a4dbd8c7d!2sLittleavenue%2C%20Raw%20Dykes%20Rd%2C%20Leicester%20LE2%207JU%2C%20United%20Kingdom!5e0!3m2!1sen!2sus!4v1616660832877!5m2!1sen!2sus" class="w-full h-64 rounded-lg shadow-lg" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="mt-12">
                <form class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg" action="#" method="POST">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-semibold mb-2">Your Name</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-brown-500">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-semibold mb-2">Your Email</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-brown-500">
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700 font-semibold mb-2">Your Message</label>
                        <textarea id="message" name="message" rows="5" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-brown-500"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-brown-500 text-white px-4 py-2 rounded-lg hover:bg-brown-600 transition">Send Message</button>
                </form>
            </div>
        </div>
    </section>

</main>

<?php include './includes/footer.php'; ?>
