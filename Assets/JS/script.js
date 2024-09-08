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

// Select the navbar element
const navbar = document.getElementById('navbar');

let lastScrollTop = 0;
let timerId = null;
window.addEventListener('scroll', function() {
  let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
  
  console.log('Current Scroll:', currentScroll);  // Log the current scroll position

  if (currentScroll > lastScrollTop || currentScroll === 0) {
    // User is scrolling down or at the top of the website
    console.log('Scrolling down or at the top');  // Log for scrolling down or at the top

    // Set a timer to hide the navbar after 2-3 seconds
    if (timerId) {
      clearTimeout(timerId);
    }
    timerId = setTimeout(function() {
      navbar.style.top = '-100px';
    }, 2000);
  } else {
    // User is scrolling up - show the navbar immediately
    console.log('Scrolling up');  // Log for scrolling up
    navbar.style.top = '0';
  }

  // Update lastScrollTop with the new scroll position
  lastScrollTop = currentScroll;
});

