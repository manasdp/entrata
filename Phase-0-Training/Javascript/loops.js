// Basic for loop
for (let i = 1; i <= 5; i++) {
  console.log("Number:", i);
}
//Reverse for loop
for (let i = 5; i >= 1; i--) {
  console.log("Reverse:", i);
}
//Even numbers
for (let i = 1; i <= 10; i++) {
  if (i % 2 === 0) {
    console.log("Even:", i);
  }
}

//While loop
let i = 1;

while (i <= 5) {
  console.log("While:", i);
  i++;
}

//Infinite loop (uncomment to test)
// while (true) {
//   console.log("This will run forever!");
// }

// Do-while loop
let j = 1;

do {
  console.log("Do While:", j);
  j++;
} while (j <= 5);

//For-of loop (iterating over an array)
let fruits = ["Apple", "Banana", "Mango"];

for (let fruit of fruits) {
  console.log("Fruit:", fruit);
}

//For-in loop (iterating over object properties)
let user = {
  name: "Manas",
  age: 22,
  country: "India"
};

for (let key in user) {
  console.log(key + ":", user[key]);
}

//break and continue
for (let i = 1; i <= 10; i++) {
  if (i === 5) {
    break;
  }
  console.log(i);
}

for (let i = 1; i <= 5; i++) {
  if (i === 3) {
    continue;
  }
  console.log(i);
}

//Nested loops
for (let i = 1; i <= 3; i++) {
  for (let j = 1; j <= 3; j++) {
    console.log(i, j);
  }
}

//Square pattern
for (let i = 1; i <= 4; i++) {
  let row = "";
  for (let j = 1; j <= 4; j++) {
    row += "* ";
  }
  console.log(row);
}

//Triangle pattern
for (let i = 1; i <= 4; i++) {
  let row = "";
  for (let j = 1; j <= i; j++) {
    row += "* ";
  }
  console.log(row);
}

//Number pattern
for (let i = 1; i <= 4; i++) {
  let row = "";
  for (let j = 1; j <= i; j++) {
    row += j + " ";
  }
  console.log(row);
}

//Sum of first 5 natural numbers 
let sum = 0;

for (let i = 1; i <= 5; i++) {
  sum += i;
}

console.log("Sum:", sum);

//Factorial of 5
let n = 5;
let fact = 1;

for (let i = 1; i <= n; i++) {
  fact *= i;
}

console.log("Factorial:", fact);

//find largest number in an array
let arr = [10, 45, 22, 89, 5];
let max = arr[0];

for (let i = 1; i < arr.length; i++) {
  if (arr[i] > max) {
    max = arr[i];
  }
}

console.log("Largest:", max);