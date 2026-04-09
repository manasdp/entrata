//Create arrays
let fruits = ["Apple", "Banana", "Mango"];
console.log(fruits);

//Accessing array elements
let fruits = ["Apple", "Banana", "Mango"];

console.log(fruits[0]); // Apple
console.log(fruits[2]); // Mango

//Updating array elements
let arr = [10, 20, 30];

arr[1] = 50;

console.log(arr);

//Adding elements to an array
let arr = [1, 2];

// add at end
arr.push(3);

// add at start
arr.unshift(0);

console.log(arr);

//Removing elements from an array
let arr = [1, 2, 3, 4];

// remove last
arr.pop();

// remove first
arr.shift();

console.log(arr);

//Looping through an array
let arr = [10, 20, 30];

for (let i = 0; i < arr.length; i++) {
  console.log(arr[i]);
}

//Using for...of loop
for (let value of arr) {
  console.log(value);
}

//Array methods
let arr = [1, 2, 3];

let result = arr.map(x => x * 2);

console.log(result);

let arr = [1, 2, 3, 4, 5];

let even = arr.filter(x => x % 2 === 0);

console.log(even);

let arr = [1, 2, 3, 4];

let sum = arr.reduce((acc, val) => acc + val, 0);

console.log(sum);

let arr = [10, 20, 30];

let value = arr.find(x => x > 15);

console.log(value);

let arr = [1, 2, 3];

console.log(arr.includes(2));

//Sorting an array
let arr = [5, 2, 9, 1];

arr.sort((a, b) => a - b);

console.log(arr);

//Reverse an array
let arr = [1, 2, 3];

arr.reverse();

console.log(arr);

//Join and split arrays
let arr = ["Hello", "World"];

let str = arr.join(" ");
console.log(str);

//Slice and splice
let arr = [1, 2, 3, 4];

console.log(arr.slice(1, 3));

let arr = [1, 2, 3, 4];

arr.splice(1, 2);

console.log(arr);

//Multidimensional arrays
let matrix = [
  [1, 2],
  [3, 4]
];

console.log(matrix[1][0]); // 3

//Sum of Array Elements
let arr = [10, 20, 30];

let sum = 0;

for (let num of arr) {
  sum += num;
}

console.log(sum);

//Find the largest number in an array
let arr = [10, 50, 20];

let max = arr[0];

for (let num of arr) {
  if (num > max) {
    max = num;
  }
}

console.log(max);

//Remove duplicates from an array
let arr = [1, 2, 2, 3, 4, 4];

let unique = [...new Set(arr)];

console.log(unique);

//Reverse an array
let arr = [1, 2, 3];
let reversed = [];

for (let i = arr.length - 1; i >= 0; i--) {
  reversed.push(arr[i]);
}

console.log(reversed);

//count even and odd numbers in an array
let arr = [1, 2, 3, 4, 5];

let even = 0, odd = 0;

for (let num of arr) {
  if (num % 2 === 0) even++;
  else odd++;
}

console.log("Even:", even, "Odd:", odd);
