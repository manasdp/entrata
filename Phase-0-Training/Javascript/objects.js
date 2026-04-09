//object literals
let person = {
  name: "John",
  age: 25,
  isStudent: true
};

console.log(person);

//new Object() syntax
let car = new Object();
car.brand = "Toyota";
car.model = "Innova";

console.log(car);

//Accessing object values
// let user = {
//   name: "Manas",
//   age: 22
// };

// Dot notation
console.log(user.name);

// Bracket notation
console.log(user["age"]);

//Updating object values
// let user = {
//   name: "Manas",
//   age: 22
// };

user.age = 23;
console.log(user);

//Adding new properties
let user = {
  name: "Manas"
};

user.city = "Pune";
console.log(user);

//Deleting properties
let user = {
  name: "Manas",
  age: 22
};

delete user.age;
console.log(user);

//Loops with objects
let user = {
  name: "Manas",
  age: 22,
  city: "Pune"
};

for (let key in user) {
  console.log(key, ":", user[key]);
}

//Object methods
let user = {
  name: "Manas",
  greet: function () {
    console.log("Hello " + this.name);
  }
};

user.greet();

//Nested objects
let user = {
  name: "Manas",
  address: {
    city: "Pune",
    pincode: 411001
  }
};

console.log(user.address.city);

//object array
let student = {
  name: "Manas",
  marks: [80, 90, 85]
};

console.log(student.marks[1]);

//array of objects
let users = [
  { name: "A", age: 20 },
  { name: "B", age: 25 },
  { name: "C", age: 30 }
];

for (let u of users) {
  console.log(u.name, u.age);
}

//Object Built-in Methods
let user = { name: "Manas", age: 22 };

console.log(Object.keys(user));
console.log(Object.values(user));
console.log(Object.entries(user));

let userCopy = Object.assign({}, user);
console.log(userCopy);

let userJSON = JSON.stringify(user);
console.log(userJSON);

let userParsed = JSON.parse(userJSON);
console.log(userParsed);

//Copying objects
let user1 = { name: "Manas" };

let user2 = { ...user1 };

console.log(user2);

//const object behavior
const user = {
  name: "Manas"
};

user.name = "Rahul"; // ✅ allowed
// user = {} ❌ not allowed

console.log(user);

//Count Properties
let obj = { a: 1, b: 2, c: 3 };

let count = 0;

for (let key in obj) {
  count++;
}

console.log("Total keys:", count);

//find sum of values
// let obj = { a: 10, b: 20, c: 30 };

let sum = 0;

for (let key in obj) {
  sum += obj[key];
}

console.log("Sum:", sum);

//check property existence
let user = { name: "Manas", age: 22 };

console.log("name" in user); // true
console.log("city" in user); // false

