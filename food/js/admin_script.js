let profile = document.querySelector('.header .flex .profile'); // Select the profile element

// Toggle profile and remove active class from navbar on user button click
document.querySelector('#user-btn').onclick = () => {
   profile.classList.toggle('active');
   navbar.classList.remove('active');
};

let navbar = document.querySelector('.header .flex .navbar'); // Select the navbar element

// Toggle navbar and remove active class from profile on menu button click
document.querySelector('#menu-btn').onclick = () => {
   navbar.classList.toggle('active');
   profile.classList.remove('active');
};

// Remove active class from profile and navbar on window scroll
window.onscroll = () => {
   profile.classList.remove('active');
   navbar.classList.remove('active');
};

subImages = document.querySelectorAll('.update-product .image-container .sub-images img'); // Select sub-images
mainImage = document.querySelector('.update-product .image-container .main-image img'); // Select main image

// Change the main image source when clicking on a sub-image
subImages.forEach(images => {
   images.onclick = () => {
      let src = images.getAttribute('src');
      mainImage.src = src;
   };
});
