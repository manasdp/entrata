//basic form validation
<form onsubmit="return validateForm()">
  <input type="text" id="name" placeholder="Enter name">
  <button type="submit">Submit</button>
</form>

<script>
function validateForm() {
  let name = document.getElementById("name").value;

  if (name === "") {
    alert("Name is required");
    return false;
  }

  return true;
}
</script>

//required fields
let value = "";

if (!value) {
  console.log("Field is required");
}

//email validation
let email = "test@gmail.com";

let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

if (!regex.test(email)) {
  console.log("Invalid Email");
}

//Password validation
let password = "Manas@123";

let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/;

if (!regex.test(password)) {
  console.log("Weak Password");
}

//Mobile number validation
let mobile = "9922468220";

let regex = /^[6-9]\d{9}$/;

if (!regex.test(mobile)) {
  console.log("Invalid Mobile Number");
}

//Number validation 
let num = "123";

if (isNaN(num)) {
  console.log("Not a number");
}

//Confirm Password
let pass1 = "1234";
let pass2 = "1234";

if (pass1 !== pass2) {
  console.log("Passwords do not match");
}

//Length validation
let username = "manas";

if (username.length < 5) {
  console.log("Too short");
}

//Complete form validation
<form onsubmit="return validateForm()">
  <input type="text" id="name" placeholder="Name"><br>
  <input type="email" id="email" placeholder="Email"><br>
  <input type="password" id="password" placeholder="Password"><br>
  <button type="submit">Submit</button>
</form>

<script>
function validateForm() {
  let name = document.getElementById("name").value;
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;

  // Name check
  if (!name) {
    alert("Name required");
    return false;
  }

  // Email check
  let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    alert("Invalid email");
    return false;
  }

  // Password check
  if (password.length < 6) {
    alert("Password too short");
    return false;
  }

  return true;
}
</script>

