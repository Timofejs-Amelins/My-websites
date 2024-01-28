// for
/**
 * for (expression1; expression2; expression3)
 * {
 *
 * }
 */

//const cars = [ "Saab", "Volvo", "BMW" ];
//let text = "";

// for (let i = 0; i < cars.length; i++)
// {
//     text += cars[i] + "\n";
// }
// console.log(text)

// for/in

/**
 * for (variable initialiser in iterative)
 *
 */

// const numbers = [45, 4, 9, 16, 25];

// for (let x in numbers)
// {
//     console.log(numbers[x]);
// }

// for/of

// const cars = [ "Saab", "Volvo", "BMW" ];

// for (let x of cars)
// {
//     console.log(x);
// }

// while
// let i = 0;

// while (i < cars.length)
// {
//     text += cars[i] + "\n";
//     i++
// }
// console.log(text)
// do while
const cars = ["Saab", "Volvo", "BMW"];
let text = "";

let i = 0;

// add the list of car models to "text"
do {
  text += cars[i] + "\n";
  i++;
} while (i < cars.length);

console.log(text);

// Ternary Statement

let check = 0 < 3 ? "True" : "False";

// Ternaly Statement with Multiple Conditions

let temp = 15(temp < 0) ? "Freezing" : temp < 20 ? "Cool" : "Hot";
