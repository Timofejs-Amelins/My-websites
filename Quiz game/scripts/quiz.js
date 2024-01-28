let questionNumber = 0;
let score = 0;
let completedQuestions = []

const questionContainer = document.getElementById("question"); // question

const scoreCotainer = document.getElementById("score"); // score
const answerButtons = document.querySelectorAll(".radio");
const answerLabels = document.querySelectorAll(".label") // answer container
const confirmButton = document.getElementById("confirm-answer")
const submitButton = document.getElementById("sumbit")


const questions = [
    {
        q : "What is the capital of Poland",
        a : [
            {text: "Warsaw", iscorrect : true},
            {text: "London", iscorrect : false},
            {text: "Washington", iscorrect : false},
            {text: "Alaska", iscorrect : false}
        ]
    },
    {
        q : "What does CSS stand for?",
        a : [
            {
                text: "Computer Science Study", iscorrect : false
            },
            {
                text: "Cascading Style Sheets", iscorrect : true
            },
            {
                text: "Conventional Set Study", iscorrect : false
            },
            {
                text: "Competition Style Sheets", iscorrect : false
            }
        ]
    },
    {
        q : "What does HTML stand for?",
        a : [
            {
                text: "Hacking to Make Linux", iscorrect : false
            },
            {
                text: "Hypertext Markup Language", iscorrect : false
            },
            {
                text: "Hyperphoto Make Link", iscorrect : false
            },
            {
                text: "HyperText Markup Language", iscorrect : true
            }
        ]
    }
] //container of questions

function DisplayQuestion() {
    questionContainer.innerHTML = `<h2>${questions[questionNumber].q}</h2>`; // get the first question and insert it into the question
    scoreCotainer.innerText = `${score} of ${questions.length} Correct`; // insert text indicating how many out of the question length the user got correct

    Randomize() // randomise the answers
    
    let index = 0
    answerButtons.forEach( (item) => {

        let answer = questions[questionNumber].a[index].text // just get the answer text

        item.setAttribute("id", answer)
        // insert the item 
        
        index++; // add 1 to the index to get a new question
    })
    index = 0
    answerLabels.forEach( (item) => {

        let answer = questions[questionNumber].a[index].text // just get the answer text

        item.setAttribute("for", answer)
        item.innerText = answer
        // insert the item 
        
        index++; // add 1 to the index to get a new question
    })
}

function Randomize() {
    myAnswers = questions[questionNumber].a; // get one question at a time

    for (let index = 0; index < myAnswers.length; index++) { // increase index by 1 until index is 4
        
        let rand = Math.floor(Math.random() * 4); // get a random value between 0 and 3
        
        let first = questions[questionNumber].a[index]; // store an answer getting index 0 then 1 then 2 then 3 in a variable
        let move = questions[questionNumber].a[rand]; // store a random answer in another variable

        questions[questionNumber].a[index] = move; // put random answer in index 0 then 1 then 2 then 3
        questions[questionNumber].a[rand] = first // put answer that was originally in index 0 then 1 then 2 then 3 in that random index
    }
    
    

}

function CheckAnswer() {
    for (let answer of answerButtons) {
        if (answer.checked) {
            submittedAnswer = answer.id
            console.log(submittedAnswer) 
        }
    }
    for (let answer of questions[questionNumber].a) {
        console.log(answer)
        if (submittedAnswer == answer.text && answer.iscorrect) {
            score++
            scoreCotainer.innerText = `${score} of ${questions.length} Correct`;
        }
    }
    completedQuestions.push(questions[questionNumber])
    confirmButton.disabled = true
    if (questionNumber <= 0+3-2) {
    submitButton.disabled = false
    }
}

function NextQuestion() {
    confirmButton.disabled = false
    submitButton.disabled = true
    questionNumber++
    DisplayQuestion()
}

function Restart() {
    questionNumber = 0
    score = 0
    scoreCotainer.innerText = `${score} of ${questions.length} Correct`
    confirmButton.disabled = false
    submitButton.disabled = true
    DisplayQuestion()
}
DisplayQuestion()



