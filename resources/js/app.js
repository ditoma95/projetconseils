

var input_problem = document.querySelector("#input_problem");
var all_reponse_buttons = document.querySelectorAll(".gui-reponse-problem");

all_reponse_buttons.forEach(element => {
    element.addEventListener("click", function(e) {
        
        input_problem.value = e.target.dataset.id;

        
    })
});


//Inspired by this pen: https://codepen.io/shannonmoeller/pen/PogPxXa
//I added the jquery part 
//Added the music as well
//Further update of three.js will be included for moving asteroids
//sound using js

window.onload = function() {
    // Alert the user to wait for the sound
  

//_______________________________
//Audio part
    
    // Define the URL of the audio file to be played
    /*
    var url = 'https://dl.dropbox.com/scl/fi/zdt27kfcoodw8i1tf92mn/NASA_-What-does-space-sound-like_.mp3?rlkey=arectai2arxb5bgneii50b3xp&dl=1';

    // Create an AudioContext object, which represents an audio-processing graph built from audio modules
    window.AudioContext = window.AudioContext || window.webkitAudioContext;
    var context = new AudioContext(); // Create an instance of AudioContext

    // Create a buffer source node, which can play audio data
    var source = context.createBufferSource();

    // Connect the buffer source node to the destination, which represents the final destination of the audio signal (speakers)
    source.connect(context.destination);

    // Create an XMLHttpRequest object to retrieve the audio data from the URL
    var request = new XMLHttpRequest();
    request.open('GET', url, true); // Open a GET request to the specified URL asynchronously
    request.responseType = 'arraybuffer'; // Set the response type to array buffer, as the response is an array of binary data

    // Callback function executed when the request is loaded
    request.onload = function() {
        // Decode the audio data from the array buffer
        context.decodeAudioData(request.response, 
            // Success callback function
            function(response) {
                source.buffer = response; // Set the buffer of the buffer source node to the decoded audio data
                source.start(0); // Start playing the audio immediately
                source.loop = true; // Set the audio to loop
            }, 
            // Error callback function
            function () { 
                console.error('The request failed.'); 
            }
        );
    };

    // Send the request to retrieve the audio data
    request.send();
    */

//______________________________________
//jquery part 

    // jQuery function to be executed when the DOM is fully loaded and ready to be manipulated
    $(document).ready(function() {
        // Function to generate a random number between min and max
        function randomNum(min, max) {
            return Math.random() * (max - min) + min;
        }

        // Function to create a star element
        function createStar() {
            const starSize = randomNum(1, 4); // Random size between 1 and 4 pixels
            const star = $('<div class="star"></div>'); // Create a div element with the class "star"
            // Set the CSS properties of the star
            star.css({
                width: starSize + 'px',
                height: starSize + 'px',
                left: randomNum(0, $(window).width()) + 'px', // Random left position within the window width
                top: randomNum(0, $(window).height()) + 'px' // Random top position within the window height
            });
            $('body').append(star); // Append the star element to the body of the HTML document
        }

        // Create stars
        for (let i = 0; i < 100; i++) {
            createStar(); // Call the createStar function 100 times to create 100 stars
        }
    });
}


setTimeout(() => {
    var toast = document.getElementById("toast-success");
    toast.remove();
}, 5000);



import './bootstrap';
document.addEventListener('alpine:init', () => {
    Alpine.data('statsByCategory', () => ({
        items: [{
                'name': 'Project 1',
                'percent': '71',
            },
            {
                'name': 'Project 2',
                'percent': '63',
            },
            {
                'name': 'Project 3',
                'percent': '92',
            },
            {
                'name': 'Project 4',
                'percent': '84',
            },
        ],
        currentItem: {
            'name': 'Project 1',
            'percent': '71',
        }
    }));
});

// Project overview stats
document.addEventListener('alpine:init', () => {
    Alpine.data('productOverviewStats', () => ({
        project: {
            'completed': 149,
            'in_progress': 42,
        }
    }));
});


// start::Chart 1
const labels = [
    'January',
    'February',
    'Mart',
    'April',
    'May',
    'Jun',
    'July'
];

const data_1 = {
    labels: labels,
    datasets: [{
        label: 'My First Dataset',
        data: [65, 59, 80, 81, 56, 55, 40],
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
        ],
        borderWidth: 1
    }]
};

const config_1 = {
    type: 'bar',
    data: data_1,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    },
};

var chart_1 = new Chart(
    document.getElementById('chart_1'),
    config_1
);

// end::Chart 1

// start::Chart 2
const data_2 = {
    labels: [
        'Eating',
        'Drinking',
        'Sleeping',
        'Designing',
        'Coding',
        'Cycling',
        'Running'
    ],
    datasets: [{
        label: 'My First Dataset',
        data: [65, 59, 90, 81, 56, 55, 40],
        fill: true,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgb(255, 99, 132)',
        pointBackgroundColor: 'rgb(255, 99, 132)',
        pointBorderColor: '#fff',
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: 'rgb(255, 99, 132)'
    }, {
        label: 'My Second Dataset',
        data: [28, 48, 40, 19, 96, 27, 100],
        fill: true,
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgb(54, 162, 235)',
        pointBackgroundColor: 'rgb(54, 162, 235)',
        pointBorderColor: '#fff',
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: 'rgb(54, 162, 235)'
    }]
};

const config_2 = {
    type: 'radar',
    data: data_2,
    options: {
        elements: {
            line: {
                borderWidth: 3
            }
        }
    },
};

var chart_2 = new Chart(
    document.getElementById('chart_2'),
    config_2
);




var modal = document.getElementById("myModal");
var btn = document.getElementById("openModalBtn");
var span = document.getElementsByClassName("close")[0];

// Lorsque l'utilisateur clique sur le bouton, ouvrez la modale
btn.onclick = function() {
    modal.style.display = "block";
}

// Lorsque l'utilisateur clique sur <span> (x), fermez la modale
span.onclick = function() {
    modal.style.display = "none";
}

// Lorsque l'utilisateur clique en dehors de la modale, fermez-la
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


