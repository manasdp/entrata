let name = "Manas";
let city = 'Pune';
let msg = `Hello World`;

//String Basic Operations
let str = "Hello";

console.log(str.length);   // length of string
console.log(str[0]);       // first character
console.log(str[str.length - 1]); // last character

//String Concatenation
let first = "Manas";
let last = "Patil";

// using +
console.log(first + " " + last);

// using template literals (best ✅)
console.log(`My name is ${first} ${last}`);

//Change case
let text = "hello world";

console.log(text.toUpperCase());
console.log(text.toLowerCase());

//Trimming
//let text = "   Hello JS   ";

console.log(text.trim());
console.log(text.trimStart());
console.log(text.trimEnd());

//Search Methods
//let text = "JavaScript is awesome";

console.log(text.includes("Script"));
console.log(text.indexOf("is"));
console.log(text.lastIndexOf("o"));
console.log(text.startsWith("Java"));
console.log(text.endsWith("awesome"));

//Extracting Substrings
let text = "JavaScript";

console.log(text.slice(0, 4)); // Java
console.log(text.slice(-6));   // Script
console.log(text.substring(4, 10)); // Script
console.log(text.substr(4, 6)); // Script

//Replacing Substrings
let str = "I love JavaScript";

console.log(str.replace("JavaScript", "JS"));
console.log(str.replace(/a/g, "o")); // Regular expression to replace all 'a' with 'o'

//Splitting and Joining
let csv = "apple,banana,orange";
let fruits = csv.split(",");
console.log(fruits);

let joined = fruits.join(" - ");
console.log(joined);

//String Padding
let num = "5";
console.log(num.padStart(3, "0")); // 005
console.log(num.padEnd(3, "0"));   // 500

//String Repetition
let pattern = "* ";
console.log(pattern.repeat(5)); // * * * * *

//String Comparison
let str1 = "Hello";
let str2 = "hello";

console.log(str1 === str2); // false (case-sensitive)
console.log(str1.toLowerCase() === str2.toLowerCase()); // true (case-insensitive)

//String Immutability
let original = "Hello";
let modified = original.replace("H", "J");

console.log("Original:", original); // Hello
console.log("Modified:", modified); // Jello   

//split string 
let text = "apple,banana,mango";

let arr = text.split(",");
console.log(arr);

//join array to string
let arr = ["Hello", "World"];

console.log(arr.join(" "));

//character methods
let text = "Hello";

console.log(text.charAt(1));
console.log(text.charCodeAt(1));

//Repeat string
let text = "Hi ";

console.log(text.repeat(3));

//String comparison
let a = "apple";
let b = "banana";

console.log(a === b);
console.log(a > b); // alphabetical compare

//Escape characters
let str = "He said, \"Hello!\"";
console.log(str);

let path = "C:\\Users\\Manas\\Documents";
console.log(path);

//Reverse a string
let str = "hello";

let reversed = str.split("").reverse().join("");

console.log(reversed);

//Check if a string is a palindrome
let str = "madam";

let reversed = str.split("").reverse().join("");

if (str === reversed) {
  console.log("Palindrome");
} else {
  console.log("Not Palindrome");
}

//Count vowels
let str = "javascript";
let count = 0;

for (let ch of str) {
  if ("aeiou".includes(ch)) {
    count++;
  }
}

console.log("Vowels:", count);

//Remove spaces
let str = "Hello World";

console.log(str.replaceAll(" ", ""));

//Capitalize first letter
let str = "hello";

let result = str.charAt(0).toUpperCase() + str.slice(1);

console.log(result);