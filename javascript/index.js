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
    createAlert(' Warning','','All fields are required.','warning',true,true,'pageMessages');
    event.preventDefault();
    return false;
  }

  if (password !== confirmPassword) {
    createAlert(' Opps!','','Passwords do not match.','danger',true,true,'pageMessages');
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

// FUNCTION: Toggle the Alerts when Info button is clicked on Sign Up Page
function showInformation() {
    createAlert('Information', '', "Enter the budget amount you can allocate <b> per person </b>. <br><br> This amount will represent each individual's budget and <br> will be used to calculate the total based on the number <br> of people traveling.", 'info', true, false, 'pageMessages');
}

// FUNCTION: Edit Button on the Budget on the Settings to make the Budget editable
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

// FUNCTION: Update the number of people in database from settings

document.addEventListener('DOMContentLoaded', function() {
  const numPeopleElement = document.getElementById('num-people');
  if (numPeopleElement) {
    numPeopleElement.addEventListener('change', updateNumberOfPeople);
}});

function updateNumberOfPeople(event) {
  var numPeople = event.target.value;
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'php/update_num_people.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.send('num_people=' + numPeople);
  //reload the page
  location.reload();
}

// FUNCTION: Update the Email in the database from settings
function updateEmail() {
    var oldEmail = document.querySelector('input[name="old-email"]').value;
    var newEmail = document.querySelector('input[name="new-email"]').value;
    var password = document.querySelector('input[name="password"]').value;

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/update_email.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
      if (xhr.status === 200) {
          if (xhr.responseText === 'success') {
            cancelEdit()
            createAlert(' Success!','','Email updated successfully.','success',true,true,'pageMessages'); 
          } else {
            createAlert(' Opps!','','Invalid email or password.','danger',true,true,'pageMessages');
          }
      } else {
          createAlert(' Opps!','','An error occurred while updating the password.','danger',true,true,'pageMessages');
      }
  };

    xhr.send(`old_email=${encodeURIComponent(oldEmail)}&new_email=${encodeURIComponent(newEmail)}&password=${encodeURIComponent(password)}`);
}

// FUNCTION: Update the Password in the database from settings
function updatePassword() {
    var oldPassword = document.querySelector('input[name="old-password"]').value;
    var newPassword = document.querySelector('input[name="new-password"]').value;
    var confirmPassword = document.querySelector('input[name="confirm-new-password"]').value;

    if (newPassword !== confirmPassword) {
        createAlert(' Opps!','','Passwords do not match.','danger',true,true,'pageMessages');
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/update_password.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            if (xhr.responseText === 'success') {
                cancelEdit()
                createAlert(' Success!','','Password updated successfully.','success',true,true,'pageMessages');
            } else {
                createAlert(' Opps!','',xhr.responseText,'danger',true,true,'pageMessages');
            }
        } else {
            createAlert(' Opps!','','An error occurred while updating the password.','danger',true,true,'pageMessages');
        }
    };

    xhr.send(`old_password=${encodeURIComponent(oldPassword)}&new_password=${encodeURIComponent(newPassword)}`);
}

// FUNCTION: Delete the account from settings
function deleteAccount() {
    var password = document.querySelector('input[name="del_password"]').value;
    var confirmPassword = document.querySelector('input[name="del_confirm-password"]').value;

    if (password !== confirmPassword) {
        createAlert(' Opps!','','Passwords do not match.','danger',true,true,'pageMessages');
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/delete_account.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            if (xhr.responseText === 'success') {
                window.location.href = 'index.html';
            } else {
                createAlert(' Opps!','','Invalid password.','danger',true,true,'pageMessages');
            }
        } else {
            createAlert(' Opps!','','An error occurred while deleting the account.','danger',true,true,'pageMessages');
        }
    };

    xhr.send(`password=${encodeURIComponent(password)}`);
}

// FUNCTION: Calculate total cost based on selected number of people and days for each destination
function updateTotalCost(id) {
  // Get the values from the selected options for the number of people and days
  const numPeople = parseInt(document.getElementById('num-people-' + id).value) || 1; // Default to 1 if no value
  const numDays = parseInt(document.getElementById('num-days-' + id).value) || 1; // Default to 1 if no value

  // Get prices and fees from destinations data
  const destinationContainer = document.getElementById('destination-' + id);
  const daytourPrice = parseFloat(destinationContainer.getAttribute('data-daytour-price')) || 0; // Default to 0 if not set
  const overnightPrice = parseFloat(destinationContainer.getAttribute('data-overnight-price')) || 0; // Default to 0 if not set
  const environmentalFee = parseFloat(destinationContainer.getAttribute('data-environmental-fee')) || 0; // Default to 0 if not set
  const otherFees = parseFloat(destinationContainer.getAttribute('data-other-fees')) || 0; // Default to 0 if not set

  // Calculate total cost
  let totalCost = 0;

  // Calculate cost for daytour (1 day)
  if (numDays === 1) {
      // Calculate base cost for two people, then add extra for additional people
      let baseCost = daytourPrice;
      if (numPeople > 2) {
          const extraPeople = numPeople - 2; // Number of people beyond the first 2
          baseCost += (daytourPrice / 2) * Math.ceil(extraPeople / 2); // Add extra cost for each additional person
      }
      totalCost = baseCost * Math.ceil(numPeople / 2) + environmentalFee + otherFees;
  } else {
      // For overnight (multiple days), calculate cost per two pax (same logic for extra people)
      const numOvernights = numDays - 1; // Subtract 1 day for overnight calculation
      let baseCost = overnightPrice;
      if (numPeople > 2) {
          const extraPeople = numPeople - 2; // Number of people beyond the first 2
          baseCost += (overnightPrice / 2) * Math.ceil(extraPeople / 2); // Add extra cost for each additional person
      }
      totalCost = baseCost * numOvernights + environmentalFee + otherFees * numPeople;
  }

  // Update the displayed total cost in the price overlay
  document.getElementById('total-cost-' + id).textContent = "₱ " + totalCost.toFixed(2);
  // Update the displayed total cost in the price text
  document.getElementById('price-text-' + id).textContent = "₱ " + totalCost.toFixed(2)
}

// FUNCTION: Update daytour or overnight text based on selected days for each destination
function updateDaytourText(id) {
  const numDays = document.getElementById(`num-days-${id}`).value;
  const daytourText = document.getElementById(`daytour-text-${id}`);
  const locationType = document.getElementById(`destination-${id}`).dataset.locationType;

  if (locationType === 'adventure') {
      daytourText.value = "Daytour";  // Keep "Daytour" for adventure type
  } else {
      // For other location types, update the label based on days selected
      if (numDays == 1) {
          daytourText.value = "Daytour";
      } else if (numDays > 1) {
          daytourText.value = "Overnight";
      } else {
          daytourText.value = "";
      }
  }
}

// FUNCTION: Calculate cost based on selected options for each destination 
function calculateCost(id) {
    editItineraryCard(id);
    // Get values dynamically from the destination data
    const numPeople = document.getElementById('num-people-' + id).value;
    const numDays = document.getElementById('num-days-' + id).value;
    const locationType = document.getElementById('destination-' + id).dataset.locationType;
    const daytourPrice = parseFloat(document.getElementById('destination-' + id).dataset.daytourPrice);
    const overnightPrice = parseFloat(document.getElementById('destination-' + id).dataset.overnightPrice);
    const environmentalFee = parseFloat(document.getElementById('destination-' + id).dataset.environmentalFee);
    const otherFees = parseFloat(document.getElementById('destination-' + id).dataset.otherFees);

    let totalCost = 0;

    // Check if the location type is 'adventure'
    if (locationType === 'adventure') {
        // For adventure, multiply the daytour price by the number of people and days
        totalCost = daytourPrice * numPeople * numDays + environmentalFee + otherFees;
    } 
    // Check if the location type is 'spot'
    else if (locationType === 'spot') {
        // For spot, only allow a daytour calculation (1 day)
        totalCost = daytourPrice * numPeople + environmentalFee + otherFees;
    }
    // For other locations, use the standard daytour/overnight calculation
    else {
        // Daytour Calculation
        if (numDays == 1) {
            let baseCost = daytourPrice;
            if (numPeople > 2) {
                const extraPeople = numPeople - 2;
                baseCost += extraPeople * (daytourPrice / 2); // Adding extra cost for each person beyond 2
            }
            totalCost = baseCost + environmentalFee + otherFees;
        } 
        // Overnight Calculation
        else {
            let baseCost = overnightPrice * (numDays - 1); // Subtract one day for overnight calculation
            if (numPeople > 2) {
                const extraPeople = numPeople - 2;
                baseCost += extraPeople * (overnightPrice / 2) * (numDays - 1); // Extra cost for overnight stays
            }
            totalCost = baseCost + environmentalFee + otherFees;
        }
    }
    // Update the displayed total cost
    document.getElementById('total-cost-' + id).textContent = "₱ " + totalCost.toFixed(2);
}

function checkNumDays(id, button) {
    const numDaysElement = document.getElementById('num-days-' + id);
    if (!numDaysElement.value) {
        numDaysElement.setAttribute('required', 'required');
        createAlert('Warning', '', 'Please select the number of <b>days to stay.</b>', 'warning', true, true, 'pageMessages');
    } else {
        addToItinerary(id, button);
    }
}

// FUNCTION: Add the selected destination to the itinerary and database
function addToItinerary(id, button) {
    document.getElementById('add-itinerary-btn-' + id).style.display = 'none';
    document.getElementById('remove-itinerary-btn-' + id).style.display = 'inline-block';

    const numPeople = document.querySelector(`#num-people-${id}`).value;
    const daysToStay = document.querySelector(`#num-days-${id}`).value;
    const totalAmountText = document.querySelector(`#total-cost-${id}`).textContent;
    const totalAmount = parseFloat(totalAmountText.replace(/[^\d.-]/g, ''));

    const data = {
        id: id,
        num_people: numPeople,
        days_to_stay: daysToStay,
        total_amount: totalAmount
    };

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/add_to_itinerary.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log(xhr.responseText); // Log the raw response
            if (xhr.responseText === 'success') {
                createAlert(' Success!', '', 'New itinerary added successfully', 'success', true, true, 'pageMessages');
            } else {
                createAlert(' Oops!', '', 'Error adding itinerary.', 'danger', true, true, 'pageMessages');
            }
        } else {
            createAlert(' Oops!', '', 'Error adding itinerary.', 'danger', true, true, 'pageMessages');
        }
    };

    xhr.send(JSON.stringify(data));
}

// FUNCTION: Makes the button added and disabled if the itinerary item is already added
function updateItineraryButtons() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'php/already_in_itinerary.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onload = function() {
        if (xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);

            data.forEach(item => {
                const button = document.getElementById(`add-itinerary-btn-${item.id}`);
                if (button) {
                    document.getElementById('add-itinerary-btn-' + item.id).style.display = 'none';
                    document.getElementById('remove-itinerary-btn-' + item.id).style.display = 'inline-block';
                }

                // Update num_of_people, days_to_stay, and total_amount
                const numOfPeopleElement = document.getElementById(`num-people-${item.id}`);
                const daysToStayElement = document.getElementById(`num-days-${item.id}`);
                const totalAmountElement = document.getElementById(`total-cost-${item.id}`);

                if (numOfPeopleElement) {
                    numOfPeopleElement.value = item.num_of_people;
                }
                if (daysToStayElement) {
                    daysToStayElement.value = item.days_to_stay;
                }
                if (totalAmountElement) {
                    totalAmountElement.value = item.total_amount;
                }
            });
        } else {
            console.error('Error fetching itinerary data:', xhr.statusText);
        }
    };

    xhr.onerror = function() {
        console.error('Request error');
    };

    xhr.send();
}

document.addEventListener('DOMContentLoaded', function() {
    updateItineraryButtons();
});

// FUNCTION: Remove the selected destination from the itinerary and database
function removeFromItinerary(id, button) {
    document.getElementById('remove-itinerary-btn-' + id).style.display = 'none';
    document.getElementById('add-itinerary-btn-' + id).style.display = 'inline-block';

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/remove_from_itinerary.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log(xhr.responseText); // Log the raw response
            if (xhr.responseText === 'success') {
                createAlert(' Success!', '', 'Itinerary removed successfully', 'success', true, true, 'pageMessages');
            } else {
                createAlert(' Oops!', '', 'Error removing itinerary.', 'danger', true, true, 'pageMessages');
            }
        } else {
            createAlert(' Oops!', '', 'Error removing itinerary.', 'danger', true, true, 'pageMessages');
        }
    };

    const data = { id: id };
    xhr.send(JSON.stringify(data));
}

// FUNCTION: Update the number of people and days to stay in the itinerary cart page
document.addEventListener('DOMContentLoaded', function() {
    fetch('php/already_in_itinerary.php')
        .then(response => response.json())
        .then(data => {
            data.forEach(item => {
                const numPeopleElement = document.getElementById(`num-people-${item.id}`);
                const numDaysElement = document.getElementById(`num-days-${item.id}`);
                const priceTextElement = document.getElementById(`price-text-${item.id}`);

                if (numPeopleElement) {
                    numPeopleElement.value = item.num_of_people;
                }
                if (numDaysElement) {
                    numDaysElement.value = item.days_to_stay;
                }
                if (priceTextElement) {
                    priceTextElement.textContent = `₱ ${parseFloat(item.total_amount).toFixed(2)}`;
                }
            });
        })
        .catch(error => console.error('Error fetching itinerary data:', error));
});

// FUNCTION: Scrolling effect on View Details from Itinerary Cart Page
window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const scrollToId = urlParams.get('scrollTo');
    if (scrollToId) {
        setTimeout(() => {
            const element = document.getElementById(scrollToId);
            if (element) {
                const offset = -250;
                const y = element.getBoundingClientRect().top + window.scrollY + offset;
                window.scrollTo({ top: y, behavior: 'smooth' });
            }
        }, 100); 
    }
};

// FUNCTION: Save or Cancel changes to the itinerary card

function editItineraryCard(id) {
    const viewButton = document.getElementById(`view-itinerary-btn-${id}`);
    const removeButton = document.getElementById(`remove-itinerary-btn-${id}`);
    const saveButton = document.getElementById(`save-itinerary-btn-${id}`);
    const cancelButton = document.getElementById(`cancel-itinerary-btn-${id}`);

    if (viewButton) viewButton.style.display = 'none';
    if (removeButton) removeButton.style.display = 'none';
    if (saveButton) saveButton.style.display = 'inline-block';
    if (cancelButton) cancelButton.style.display = 'inline-block';
}

function saveItineraryCardChanges(id, button) {
    const viewButton = document.getElementById(`view-itinerary-btn-${id}`);
    const removeButton = document.getElementById(`remove-itinerary-btn-${id}`);
    const saveButton = document.getElementById(`save-itinerary-btn-${id}`);
    const cancelButton = document.getElementById(`cancel-itinerary-btn-${id}`);

    if (viewButton) viewButton.style.display = 'inline-block';
    if (removeButton) removeButton.style.display = 'inline-block';
    if (saveButton) saveButton.style.display = 'none';
    if (cancelButton) cancelButton.style.display = 'none';

    const numPeople = document.querySelector(`#num-people-${id}`).value;
    const daysToStay = document.querySelector(`#num-days-${id}`).value;
    const totalAmountText = document.querySelector(`#total-cost-${id}`).textContent;
    const totalAmount = parseFloat(totalAmountText.replace(/[^\d.-]/g, ''));

    const data = {
        id: id,
        num_people: numPeople,
        days_to_stay: daysToStay,
        total_amount: totalAmount
    };

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/add_to_itinerary.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log(xhr.responseText); // Log the raw response
            if (xhr.responseText === 'success') {
                createAlert(' Success!', '', 'New itinerary added successfully', 'success', true, true, 'pageMessages');
            } else {
                createAlert(' Oops!', '', 'Error adding itinerary.', 'danger', true, true, 'pageMessages');
            }
        } else {
            createAlert(' Oops!', '', 'Error adding itinerary.', 'danger', true, true, 'pageMessages');
        }
    };

    xhr.send(JSON.stringify(data));
}

function cancelItineraryCardChanges(id) {
    const viewButton = document.getElementById(`view-itinerary-btn-${id}`);
    const removeButton = document.getElementById(`remove-itinerary-btn-${id}`);
    const saveButton = document.getElementById(`save-itinerary-btn-${id}`);
    const cancelButton = document.getElementById(`cancel-itinerary-btn-${id}`);

    if (viewButton) viewButton.style.display = 'inline-block';
    if (removeButton) removeButton.style.display = 'inline-block';
    if (saveButton) saveButton.style.display = 'none';
    if (cancelButton) cancelButton.style.display = 'none';

    //reload
    location.reload();
}