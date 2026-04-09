//1. Create a Cookie
document.cookie = "username=Manas";
// With Expiry Date
let date = new Date();
date.setTime(date.getTime() + (24 * 60 * 60 * 1000)); // 1 day

document.cookie = "username=Manas; expires=" + date.toUTCString();
//Read Cookies
console.log(document.cookie);
//output
//username=Manas

//Update Cookie
document.cookie = "username=Rahul";

//Delete Cookie
document.cookie = "username=Manas; expires=Thu, 01 Jan 1970 00:00:00 UTC;";

//Cookie Options
document.cookie = "user=Manas; expires=Fri, 31 Dec 2026 12:00:00 UTC; path=/";

//Multiple Cookies
document.cookie = "name=Manas";
document.cookie = "age=22";

console.log(document.cookie);


//Helper Functions
//Set Cookie
function setCookie(name, value, days) {
  let d = new Date();
  d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
  
  document.cookie = name + "=" + value + ";expires=" + d.toUTCString() + ";path=/";
}

//Get Cookie
function getCookie(name) {
  let cookies = document.cookie.split("; ");
  
  for (let c of cookies) {
    let [key, value] = c.split("=");
    if (key === name) return value;
  }
  
  return null;
}

//Delete Cookie
function deleteCookie(name) {
  document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}
//Real Practice Examples
//Save Username
setCookie("user", "Manas", 7);

//Get Username
let user = getCookie("user");
console.log(user);

//Auto Login Check
let user = getCookie("user");

if (user) {
  console.log("Welcome back " + user);
} else {
  console.log("Please login");
}