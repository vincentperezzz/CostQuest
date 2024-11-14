// FUNCTION: Make the navigation bar have shadow when scrolling

window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 0) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });

// FUNCTION: Toggle the Alerts when Password do not match on the database
function toggle_Continue_SigningUp(event) {

  var lname = document.querySelector('input[name="lname"]').value;
  var email = document.querySelector('input[name="email"]').value;
  var password = document.querySelector('input[name="password"]').value;
  var confirmPassword = document.querySelector('input[name="confirm-password"]').value;

  if (!lname || !email || !password || !confirmPassword) {
    createAlert('Warning','','All fields are required.','warning',true,true,'pageMessages');
    event.preventDefault();
    return false;
  }

  if (password !== confirmPassword) {
    createAlert('Opps!','','Passwords do not match.','danger',true,true,'pageMessages');
    event.preventDefault();
    return false;
  }

  return true;
}

// FUNCTION: Toggle the Alerts functions and animations
function createAlert(title, summary, details, severity, dismissible, autoDismiss, appendToId) {
  var iconMap = {
    info: "fa fa-info-circle",
    success: "fa fa-thumbs-up",
    warning: "fa fa-exclamation-triangle",
    danger: "fa fa-exclamation-circle"
  };

  var iconAdded = false;

  var alertClasses = ["alert", "animated", "flipInX"];
  alertClasses.push("alert-" + severity.toLowerCase());

  if (dismissible) {
    alertClasses.push("alert-dismissible");
  }

  var msgIcon = $("<i />", {
    "class": iconMap[severity] // you need to quote "class" since it's a reserved keyword
  });

  var msg = $("<div />", {
    "class": alertClasses.join(" ") // you need to quote "class" since it's a reserved keyword
  });

  if (title) {
    var msgTitle = $("<h4 />", {
      html: title
    }).appendTo(msg);
    
    if(!iconAdded){
      msgTitle.prepend(msgIcon);
      iconAdded = true;
    }
  }

  if (summary) {
    var msgSummary = $("<strong />", {
      html: summary
    }).appendTo(msg);
    
    if(!iconAdded){
      msgSummary.prepend(msgIcon);
      iconAdded = true;
    }
  }

  if (details) {
    var msgDetails = $("<p />", {
      html: details
    }).appendTo(msg);
    
    if(!iconAdded){
      msgDetails.prepend(msgIcon);
      iconAdded = true;
    }
  }
  

  if (dismissible) {
    var msgClose = $("<span />", {
      "class": "close", // you need to quote "class" since it's a reserved keyword
      "data-dismiss": "alert",
      html: "<i class='fa fa-times-circle'></i>"
    }).appendTo(msg);
  }
  
  $('#' + appendToId).prepend(msg);
  
  if(autoDismiss){
    setTimeout(function(){
      msg.addClass("flipOutX");
      setTimeout(function(){
        msg.remove();
      },1000);
    }, 5000);
  }
}

// FUNCTION: Toggle the Alerts when Password do not match on the database
document.addEventListener('DOMContentLoaded', function() {
  document.querySelector('.question-mark').addEventListener('click', function() {
    createAlert('Information', '', "Enter the budget amount you can allocate <b> per person </b>. <br><br> This amount will represent each individual's budget and <br> will be used to calculate the total based on the number <br> of people traveling.", 'info', true, false, 'pageMessages');
  });
});

// FUNCTION: Edit Button on the Budget on the Settings to make the Budget editable
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('editButton').addEventListener('click', editBudget);

  function editBudget() {
      const button = document.getElementById('editButton');
      const budgetLimit = document.getElementById('budget-limit');
      const budgetLimitTextbox = document.getElementById('budget-limit-textbox');
  
      if (button.textContent === 'Edit Budget') {
          budgetLimit.style.display = 'none';
          budgetLimitTextbox.style.display = 'block';
          button.textContent = 'Done';
          button.style.backgroundColor = 'green';
      } else {
          const newBudget = budgetLimitTextbox.value.trim();
          if (newBudget === '') {
              resetBudgetEdit();
          } else {
              fetch('php/update_budget.php', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/x-www-form-urlencoded',
                  },
                  body: `budget=${encodeURIComponent(newBudget)}`,
              })
              .then(response => response.text())
              .then(data => {
                  if (data === 'success') {
                      location.reload();
                  } else {
                      resetBudgetEdit();
                  }
              })
              .catch(error => {
                  console.error('Error:', error);
                  resetBudgetEdit();
              });
          }
      }
  
      function resetBudgetEdit() {
          budgetLimit.style.display = 'block';
          budgetLimitTextbox.style.display = 'none';
          button.textContent = 'Edit Budget';
          button.style.backgroundColor = '';
      }
  }
});


// FUNCTION: Update the Budget Percentage on the Settings
function updateBudgetPercentage() {
    var budgetPriceElement = document.querySelector('.budget-price');
    var budgetLimitElement = document.getElementById('budget-limit');
    var budgetPercentageElement = document.getElementById('budget-percentage');
    var progressBarStatusElement = document.getElementById('progress-bar-status');

    if (budgetPriceElement && budgetLimitElement && budgetPercentageElement && progressBarStatusElement) {
        var budgetPrice = parseFloat(budgetPriceElement.innerText.replace('₱', '').replace(',', ''));
        var budgetLimit = parseFloat(budgetLimitElement.innerText.replace('₱', '').replace(',', ''));
        var budgetPercentage = (budgetPrice / budgetLimit) * 100;

        if (budgetPercentage > 100) {
            budgetPercentage = 100;
        } else if (budgetPercentage < 0) {
            budgetPercentage = 0;
        }

        budgetPercentageElement.innerText = budgetPercentage.toFixed(2) + '%';
        progressBarStatusElement.style.width = budgetPercentage + '%';

        if (budgetPercentage === 0) {
            progressBarStatusElement.style.display = 'none';
        } else {
            progressBarStatusElement.style.display = 'block';
        }
    } else {
        console.error('One or more elements not found in the DOM');
    }
}

// FUNCTION: Edit Button on the Account Settings to make the Email and Password editable

function editEmail() {
  const loginBox = document.getElementById('login-box');
  const emailBox = document.getElementById('email-box');
  loginBox.style.display = 'none';
  emailBox.style.display = 'block';
}

function editPassword() {
  const loginBox = document.getElementById('login-box');
  const passwordBox = document.getElementById('password-box');
  loginBox.style.display = 'none';
  passwordBox.style.display = 'block';
}

function editDelete() {
  const loginBox = document.getElementById('login-box');
  const deleteBox = document.getElementById('delete-box');
  loginBox.style.display = 'none';
  deleteBox.style.display = 'block';
}

function cancelEdit() {
  const loginBox = document.getElementById('login-box');
  const emailBox = document.getElementById('email-box');
  const passwordBox = document.getElementById('password-box');
  const deleteBox = document.getElementById('delete-box');
  loginBox.style.display = 'block';
  emailBox.style.display = 'none';
  passwordBox.style.display = 'none';
  deleteBox.style.display = 'none';
}