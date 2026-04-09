//Current Date and Time
let currentDate = new Date();
console.log("Current Date and Time:", currentDate);

//Specific Date
let specificDate = new Date("2026-04-08");
console.log("Specific Date:", specificDate);

//Using Numbers
let date2 = new Date(2026, 3, 8); // month is 0-based (3 = April)
console.log(date2);

//Get Date Components
let now = new Date();

console.log("Year:", now.getFullYear());
console.log("Month:", now.getMonth()); // 0-11
console.log("Date:", now.getDate());
console.log("Day:", now.getDay()); // 0 = Sunday
console.log("Hours:", now.getHours());
console.log("Minutes:", now.getMinutes());
console.log("Seconds:", now.getSeconds());

//Set Date Components
let d = new Date();

d.setFullYear(2030);
d.setMonth(11); // December
d.setDate(25);

console.log(d);

//Timestamp
let now = new Date();

console.log(now.getTime()); // milliseconds since 1970

//Format Date
let now = new Date();

console.log(now.toDateString());
console.log(now.toLocaleDateString());
console.log(now.toLocaleTimeString());

//Date Calculations
//Add Days
let d = new Date();

d.setDate(d.getDate() + 5);

console.log(d);
//Difference in Days
let d1 = new Date("2026-04-01");
let d2 = new Date("2026-04-08");

let diff = d2 - d1;

let days = diff / (1000 * 60 * 60 * 24);

console.log("Days:", days);

//Get current date format
let d = new Date();

let day = d.getDate();
let month = d.getMonth() + 1;
let year = d.getFullYear();

console.log(`${day}-${month}-${year}`);

//Digital Clock
setInterval(() => {
  let now = new Date();

  let time = now.toLocaleTimeString();

  console.log(time);
}, 1000);

//Calculate age
let birthYear = 2004;

let currentYear = new Date().getFullYear();

let age = currentYear - birthYear;

console.log("Age:", age);

//Check weekend
let today = new Date().getDay();

if (today === 0 || today === 6) {
  console.log("Weekend");
} else {
  console.log("Weekday");
}

//Countdown Timer
let target = new Date("2026-12-31");

let now = new Date();

let diff = target - now;

let days = Math.floor(diff / (1000 * 60 * 60 * 24));

console.log("Days left:", days);