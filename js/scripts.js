// add class navbarDark on navbar scroll
window.onscroll = function()
 {
  myFunction()}; 
  var navbar = document.getElementsByTagName("nav"); 
  var sticky = navbar.offsetTop; function myFunction() 
  {
     if (window.pageYOffset >= sticky)
      {
        navbar.classList.add("sticky")}
         else {navbar.classList.remove("sticky"); 
        } 
   } 
  //  login validation
  document.addEventListener('DOMContentLoaded', function () {
    var emailInput = document.getElementById('email');
    emailInput.addEventListener('input', function () {
      var email = emailInput.value.trim();
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      var badgeAlert = document.getElementById('badge-alert');

      if (emailRegex.test(email)) {
        displayBadgeAlert('success', 'Valid email address', badgeAlert);
      } else {
        displayBadgeAlert('danger', 'Please enter a valid email address', badgeAlert);
      }
    });
  });

  function displayBadgeAlert(type, message, element) {
    element.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
      message +
      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
      '<span aria-hidden="true">&times;</span></button></div>';
  }

  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('emailForm').addEventListener('submit', function (event) {
      event.preventDefault(); // Prevent the form from submitting normally
      
      // Perform any necessary validation
      

    
      // Assuming login is successful
      // You can replace this with your actual login logic
      var email = document.getElementById('email').value;
      var password = document.getElementById('floatingPassword').value;
      // Example condition for successful login
      if (email !== '' && password !== '') {
        alert('Login successful!');
      } else {
        alert('Login failed. Please check your credentials.');
      }
    });
  });

  document.addEventListener("DOMContentLoaded", function() {
    const sidebar = document.querySelector(".sidebar");
    const sidebarToggleButton = document.querySelector(".checkbtn");
    const footer = document.querySelector("footer");
  
    document.addEventListener("DOMContentLoaded", function() {
      const sidebar = document.querySelector(".sidebar");
      const footer = document.querySelector("footer");
      const toggleButton = document.querySelector(".checkbtn");
      const container = document.querySelector(".container");
    
      toggleButton.addEventListener("click", function() {
        container.classList.toggle("active"); // Toggle 'active' class on container
        if (container.classList.contains("active")) {
          // Move sidebar content to footer
          footer.querySelector(".sidebar-content").appendChild(sidebar.querySelector("ul"));
        } else {
          // Move sidebar content back to sidebar
          sidebar.appendChild(footer.querySelector(".sidebar-content").querySelector("ul"));
        }
      });
    });
      
    