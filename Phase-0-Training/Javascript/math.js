console.log(Math.PI);       // 3.14159...
console.log(Math.E);        // Euler's number

//Round, floor, ceil, trunc
let num = 4.7;

console.log(Math.round(num)); // 5
console.log(Math.floor(num)); // 4
console.log(Math.ceil(num));  // 5
console.log(Math.trunc(num)); // 4

//Power and Square Root
console.log(Math.pow(2, 3));  // 8
console.log(Math.sqrt(16));   // 4
console.log(Math.cbrt(27));   // 3

//Absolute value and Sign
console.log(Math.abs(-10)); // 10
console.log(Math.sign(-5)); // -1
console.log(Math.sign(5));  // 1

//Min and Max
console.log(Math.min(1, 5, 2)); // 1
console.log(Math.max(1, 5, 2)); // 5

//Random Number
console.log(Math.random()); // 0 to 1

//random integer between 1 and 10
let rand = Math.floor(Math.random() * 10) + 1;

console.log(rand);

//Logarithmic and Exponential Functions
console.log(Math.log(10));
console.log(Math.log10(100));
console.log(Math.log2(8));

//Trigonometric Functions
console.log(Math.sin(0));
console.log(Math.cos(0));
console.log(Math.tan(0));

//Generate OTP
let otp = Math.floor(1000 + Math.random() * 9000);

console.log("OTP:", otp);

//Dice Roll
let dice = Math.floor(Math.random() * 6) + 1;

console.log("Dice:", dice);

//Find Largest of Three Numbers
let a = 10, b = 20, c = 15;

let max = Math.max(a, b, c);

console.log("Max:", max);

//Round to 2 Decimal Places
let num = 3.4567;

let result = Math.round(num * 100) / 100;

console.log(result);

//Random Color Generator
let color = "#" + Math.floor(Math.random() * 16777215).toString(16);

console.log(color);