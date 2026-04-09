//Arithmetic Operators
let a = 10;
let b = 3;

console.log("Addition:", a + b);
console.log("Subtraction:", a - b);
console.log("Multiplication:", a * b);
console.log("Division:", a / b);
console.log("Modulus:", a % b);
console.log("Exponent:", a ** b);

// Comparison Operators
let x = 10;
let y = "10";

console.log("== :", x == y);   // true (value only)
console.log("=== :", x === y); // false (value + type)
console.log("!= :", x != y);
console.log("!== :", x !== y);
console.log("> :", x > 5);
console.log("< :", x < 5);
console.log(">= :", x >= 10);
console.log("<= :", x <= 5);

// Logical Operators
let isLoggedIn = true;
let isAdmin = false;

console.log("AND (&&):", isLoggedIn && isAdmin);
console.log("OR (||):", isLoggedIn || isAdmin);
console.log("NOT (!):", !isLoggedIn);

// Assignment Operators
let num = 10;

num += 5;  // num = num + 5
console.log("+= :", num);

num -= 3;
console.log("-= :", num);

num *= 2;
console.log("*= :", num);

num /= 4;
console.log("/= :", num);

num %= 3;
console.log("%= :", num);

num **= 2;
console.log("**= :", num);

// Increment and Decrement Operators
let count = 5;

console.log("Post Increment:", count++);
console.log("After Post Increment:", count);

console.log("Pre Increment:", ++count);

console.log("Post Decrement:", count--);
console.log("Pre Decrement:", --count);

// Ternary Operator
let score = 85;
let grade = score >= 90 ? "A" : score >= 80 ? "B" : "C";
console.log("Grade:", grade);

// Typeof Operator
console.log("Type of a:", typeof a);
console.log("Type of name:", typeof name);
console.log("Type of isLoggedIn:", typeof isLoggedIn);

let value = "Hello";

console.log("Type of value:", typeof value);

let num1 = 10;
let str1 = "10";

console.log("Strict equal:", num1 === str1);

//Bitwise Operators
let p = 5;  // 0101
let q = 1;  // 0001

console.log("AND (&):", p & q);
console.log("OR (|):", p | q);
console.log("XOR (^):", p ^ q);
console.log("NOT (~):", ~p);
console.log("Left Shift:", p << 1);
console.log("Right Shift:", p >> 1);

//Combined Practical Example
let price = 100;
let discount = 20;

// Apply discount
let finalPrice = price - discount;

// Check condition
let message = (finalPrice < 100) ? "Cheap" : "Expensive";

// Logical check
let available = true;

console.log("Final Price:", finalPrice);
console.log("Category:", message);
console.log("Available && Cheap:", available && (finalPrice < 100));