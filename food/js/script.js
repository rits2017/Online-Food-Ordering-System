navbar = document.querySelector('.header .flex .navbar'); // Select the navbar element

// Toggle navbar and remove active class from profile on menu button click
document.querySelector('#menu-btn').onclick = () => {
   navbar.classList.toggle('active');
   profile.classList.remove('active');
};

profile = document.querySelector('.header .flex .profile'); // Select the profile element

// Toggle profile and remove active class from navbar on user button click
document.querySelector('#user-btn').onclick = () => {
   profile.classList.toggle('active');
   navbar.classList.remove('active');
};

// Remove active class from navbar and profile on window scroll
window.onscroll = () => {
   navbar.classList.remove('active');
   profile.classList.remove('active');
};

// Restrict the input length for number input fields to their maximum length
document.querySelectorAll('input[type="number"]').forEach(numberInput => {
   numberInput.oninput = () => {
      if (numberInput.value.length > numberInput.maxLength) numberInput.value = numberInput.value.slice(0, numberInput.maxLength);
   };
});
