document.addEventListener("DOMContentLoaded", function() {
    // Initialize Swiper
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    // Background Music Controls
    var audio = document.getElementById('background-music');
    var muteToggle = document.getElementById('mute-toggle');
    var muteIcon = document.getElementById('mute-icon');

    // Start playing the music automatically
    audio.play();

    muteToggle.addEventListener('click', function() {
        if (audio.muted) {
            audio.muted = false;
            muteIcon.classList.remove('fa-volume-mute');
            muteIcon.classList.add('fa-volume-up');
        } else {
            audio.muted = true;
            muteIcon.classList.remove('fa-volume-up');
            muteIcon.classList.add('fa-volume-mute');
        }
    });
});

// // Select the navbar element
// const navbar = document.getElementById('navbar');
// let lastScrollTop = 0;
// let isHovering = false;
// let hideNavbarTimeout;

// // Function to hide the navbar
// const hideNavbar = () => {
//     navbar.style.top = '-100px';
// };

// // Detect mouse hover on the navbar
// navbar.addEventListener('mouseenter', () => {
//     isHovering = true;
//     clearTimeout(hideNavbarTimeout); // Clear the timeout to prevent hiding when hovering
//     navbar.style.top = '0'; // Ensure the navbar is visible when hovered
// });

// navbar.addEventListener('mouseleave', () => {
//     isHovering = false;
//     // Start a 3-second timer to hide the navbar if not hovering
//     hideNavbarTimeout = setTimeout(() => {
//         if (!isHovering) {
//             hideNavbar();
//         }
//     }, 1000); // 3 seconds
// });

// // Scroll event listener
// window.addEventListener('scroll', function () {
//     let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

//     if (currentScroll > lastScrollTop && !isHovering) {
//         // User is scrolling down and not hovering - hide the navbar immediately
//         hideNavbar();
//     } else {
//         // User is scrolling up or hovering - show the navbar
//         navbar.style.top = '0';
//     }

//     // Update lastScrollTop with the new scroll position
//     lastScrollTop = currentScroll;
// });



// login modal
   // Get modal elements
   var modal = document.getElementById('loginModal');
   var loginBtn = document.getElementById('loginBtn');
   var adminLogin = document.getElementById('adminLogin');
   var customerLogin = document.getElementById('customerLogin');

   // When the user clicks the login button, show the modal
   loginBtn.onclick = function() {
       modal.style.display = 'block';
   }

   // Admin login click handler
   adminLogin.onclick = function() {
       window.location.href = 'admin_login.php'; // Redirect to admin login page
   }

   // Customer login click handler
   customerLogin.onclick = function() {
       window.location.href = 'customer_login.php'; // Redirect to customer login page
   }

   // Close the modal when clicking outside of it
   window.onclick = function(event) {
       if (event.target == modal) {
           modal.style.display = 'none';
       }
   }
