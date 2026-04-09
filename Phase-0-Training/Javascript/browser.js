console.log(window);

alert("Hello");          // popup
confirm("Are you sure?"); // true/false
prompt("Enter name");     // input from user

//DOM Manipulation
document.body.style.background = "lightblue";

document.getElementById("id");
document.querySelector(".class");
document.querySelectorAll("p");

//location object
console.log("Current URL:", window.location.href);
console.log("Hostname:", window.location.hostname);
console.log("Pathname:", window.location.pathname);

//Navigator object
console.log("Browser Name:", navigator.appName);
console.log("Browser Version:", navigator.appVersion);
console.log("User Agent:", navigator.userAgent);

//Screen object
console.log("Screen Width:", screen.width);
console.log("Screen Height:", screen.height);
console.log("Color Depth:", screen.colorDepth);

//Redirecting to another page
location.href = "https://google.com";

//History object
console.log("History Length:", history.length);
history.back();
history.forward();

//Navigator object
console.log(navigator.userAgent);
console.log(navigator.onLine);

//Timers
setTimeout(function () {
  console.log("This will run after 2 seconds");
}, 2000);

let intervalId = setInterval(function () {
  console.log("This will run every 3 seconds");
}, 3000);

let id = setInterval(() => {
  console.log("Running...");
}, 1000);

clearInterval(id);

//cookies
document.cookie = "username=Manas; expires=Fri, 31 Dec 2024 23:59:59 GMT; path=/";

console.log("Cookies:", document.cookie);

//Local Storage
localStorage.setItem("name", "Manas");
console.log("Local Storage:", localStorage.getItem("name"));

// Removing an item from Local Storage
localStorage.removeItem("name");
console.log("Local Storage after removal:", localStorage.getItem("name"));

//Session Storage
sessionStorage.setItem("sessionName", "Manas");
console.log("Session Storage:", sessionStorage.getItem("sessionName"));

//Alert on Button Click
<button onclick="showAlert()">Click</button>

<script>
function showAlert() {
  alert("Hello User!");
}
</script>

//Save username in local storage 
let username = "Manas";

localStorage.setItem("user", username);

//Check Internet Connection
if (navigator.onLine) {
  console.log("Online");
} else {
  console.log("Offline");
}