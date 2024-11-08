window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 0) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });

  function toggleForms() {
    var loginForm = document.getElementById('login-form');
    var loginForm2 = document.getElementById('login-form-2');
    
    if (loginForm && loginForm2) {
        if (loginForm.style.display === "block" || loginForm.style.display === "") {
            loginForm.style.display = "none";
            loginForm2.style.display = "block";
        } else {
            loginForm.style.display = "block";
            loginForm2.style.display = "none";
        }
    } else {
        console.error('One or both elements not found');
    }
}

function toggle_Continue_SigningUp(event) {
  //console log that the button is working
  console.log('Button clicked');


  var lname = document.querySelector('input[name="lname"]').value;
  var email = document.querySelector('input[name="email"]').value;
  var password = document.querySelector('input[name="password"]').value;
  var confirmPassword = document.querySelector('input[name="confirm-password"]').value;

  if (!lname || !email || !password || !confirmPassword) {
    alert('All fields are required.');
    event.preventDefault();
    return false;
  }

  if (!email.includes('@')) {
    alert('Please enter a valid email address.');
    event.preventDefault();
    return false;
  }

  if (password !== confirmPassword) {
    alert('Passwords do not match.');
    event.preventDefault();
    return false;
  }

  return true;
}