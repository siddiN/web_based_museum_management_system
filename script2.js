const quizData = [
    {
        question: "What is the oldest artifact in the museum?",
        a: "Ancient Vase",
        b: "Stone Tablet",
        c: "Golden Coin",
        d: "Wooden Sculpture",
        correct: "b"
    },
    {
        question: "Which exhibit features the history of the Renaissance?",
        a: "Art Gallery",
        b: "Medieval Hall",
        c: "Renaissance Exhibit",
        d: "Ancient Egypt",
        correct: "c"
    },
    {
        question: "Who is the founder of the museum?",
        a: "John Doe",
        b: "Jane Smith",
        c: "George Brown",
        d: "Emily White",
        correct: "a"
    }
];

const quiz = document.getElementById('quiz');
const startBtn = document.getElementById('start-btn');
const startScreen = document.getElementById('start-screen');
const answerEls = document.querySelectorAll('.answer');
const questionEl = document.getElementById('question');
const a_text = document.getElementById('a_text');
const b_text = document.getElementById('b_text');
const c_text = document.getElementById('c_text');
const d_text = document.getElementById('d_text');
const submitBtn = document.getElementById('submit');
const timerEl = document.getElementById('timer');
const scoreEl = document.getElementById('score');

let currentQuiz = 0;
let score = 0;
let timeLeft = 30;
let timer;

startBtn.addEventListener('click', () => {
    startScreen.style.display = 'none';
    quiz.style.display = 'block';
    loadQuiz();
    startTimer();
});

function startTimer() {
    timer = setInterval(() => {
        timeLeft--;
        timerEl.textContent = timeLeft;
        if (timeLeft === 0) {
            clearInterval(timer);
            quiz.innerHTML = `
                <h2>Time's up! You lost 😢</h2>
                <button onclick="location.reload()">Try Again</button>
            `;
        }
    }, 1000);
}

function resetTimer() {
    clearInterval(timer);
    timeLeft = 30;
    timerEl.textContent = timeLeft;
    startTimer();
}

function loadQuiz() {
    deselectAnswers();
    resetTimer();

    const currentQuizData = quizData[currentQuiz];

    questionEl.innerText = currentQuizData.question;
    a_text.innerText = currentQuizData.a;
    b_text.innerText = currentQuizData.b;
    c_text.innerText = currentQuizData.c;
    d_text.innerText = currentQuizData.d;
    scoreEl.innerText = `Score: ${score}`;
}

function deselectAnswers() {
    answerEls.forEach(answerEl => answerEl.checked = false);
}

function getSelected() {
    let answer;
    answerEls.forEach(answerEl => {
        if (answerEl.checked) {
            answer = answerEl.id;
        }
    });
    return answer;
}

submitBtn.addEventListener('click', () => {
    const answer = getSelected();
    if (answer) {
        if (answer === quizData[currentQuiz].correct) {
            score++;
        }

        currentQuiz++;

        if (currentQuiz < quizData.length) {
            loadQuiz();
        } else {
            clearInterval(timer);
            quiz.innerHTML = `
                <h2>You answered ${score}/${quizData.length} questions correctly</h2>
                <button onclick="location.reload()">Reload</button>
            `;
        }
    }
});
