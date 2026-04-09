//Create Regular Expressions
let regex2 = /hello/;
//constructor function
let regex1 = new RegExp("hello");
//Test method
let regex = /hello/;

console.log(regex.test("hello world")); // true
console.log(regex.test("hi"));          // false

//Match method
let str = "hello world";

let result = str.match(/world/);

console.log(result);

//Replace method
let text = "I love Java";

let result2 = text.replace(/Java/, "JS");

console.log(result2);

//Regex Flags
let text2 = "Hello hello";

console.log(text2.match(/hello/gi));

//Common Regex Patterns
//Only Numbers
let regex = /^[0-9]+$/;

console.log(regex.test("12345")); // true

//Only Letters
let regex2 = /^[A-Za-z]+$/;

console.log(regex2.test("Hello")); // true

//Email Validation
let email = "test@gmail.com";

let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

console.log(regex.test(email));

//Alphanumeric
let regex3 = /^[A-Za-z0-9]+$/;

console.log(regex3.test("Hello123")); // true

//Password Validation (at least 8 characters, one uppercase, one lowercase, one number, one special character)
let password = "Manas@123";

let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/;

console.log(regex.test(password));

//Mobile Number Validation (10 digits)
let mobile = "9876543210";

let regex = /^[6-9]\d{9}$/;

console.log(regex.test(mobile));

//Extracting Numbers from a String
let text = "Price is 500 rupees";

let result = text.match(/\d+/g);

console.log(result);

//Removing Extra Spaces
let text = "Hello World";

let result = text.replace(/\s/g, "");

console.log(result);

//Username Validation (alphanumeric, 3-16 characters)
let username = "manas123";

let regex = /^[a-z0-9]{5,10}$/;

console.log(regex.test(username));

//Find all words in a string
let text = "JS is awesome";

console.log(text.match(/\w+/g));

//Replace all digits
let text = "abc123xyz";

console.log(text.replace(/\d/g, "*"));

//Check URL
let url = "https://google.com";

let regex = /^(https?:\/\/)?([\w-]+)\.([a-z]{2,})(\/\S*)?$/;

console.log(regex.test(url));

