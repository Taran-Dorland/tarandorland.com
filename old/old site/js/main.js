
function showHeaderDiv() {
  document.getElementById('divDropdown').style.display = "block";
}

function hideHeaderDiv() {
  document.getElementById('divDropdown').style.display = "none";
}

function headerDivAssignments() {
  document.getElementById('dd-button-1').innerHTML = "Assignment 1";
  document.getElementById('dd-button-1').href = "assignment1"
  document.getElementById('dd-button-2').innerHTML = "Assignment 2";
  document.getElementById('dd-button-2').href = "assignment2"
  document.getElementById('dd-button-3').innerHTML = "Assignment 3";
  document.getElementById('dd-button-3').href = "assignment3"
  document.getElementById('dd-button-4').innerHTML = "Assignment 4";
  document.getElementById('dd-button-4').href = "assignment4"
}

function headerDivProjects() {
  document.getElementById('dd-button-1').innerHTML = "This Site";
  document.getElementById('dd-button-1').href = "https://github.com/Taran-Dorland/tarandorland.com"
  document.getElementById('dd-button-2').innerHTML = "placeholder";
  document.getElementById('dd-button-2').href = ""
  document.getElementById('dd-button-3').innerHTML = "placeholder";
  document.getElementById('dd-button-3').href = ""
  document.getElementById('dd-button-4').innerHTML = "placeholder";
  document.getElementById('dd-button-4').href = ""
}
