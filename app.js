// Get the category from the URL
const urlParams = new URLSearchParams(window.location.search);
const category = urlParams.get('category');

// Get the quiz data from a PHP file
fetch(`quiz_data.php?category=${category}`)
.then(response => response.json())
.then(data => {
    // Shuffle the questions
    shuffleArray(data.questions);
    // Store the questions in the session storage
    sessionStorage.setItem('questions', JSON.stringify(data.questions));
    // Redirect to quiz page
    window.location.href = 'quiz.php';
})
.catch(error => console.error(error));

// Function to shudffle an array
function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}