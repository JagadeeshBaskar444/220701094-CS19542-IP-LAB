$(document).ready(function() {
    let points = 0;  
    let currentLetter = ''; 

    function getRandomAlphabet() {
        const randomCode = Math.floor(Math.random() * 26) + 65; 
        return String.fromCharCode(randomCode);
    }

    function getRandomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    function createBubble() {
        const bubble = $('<div class="bubble"></div>');
        currentLetter = getRandomAlphabet();  
        const letter = $('<span class="letter"></span>').text(currentLetter);
        const color = getRandomColor();

        bubble.append(letter);  
        bubble.css({
            backgroundColor: color,
            left: Math.random() * ($('#gameArea').width() - 50) + 'px',
            top: Math.random() * ($('#gameArea').height() - 50) + 'px',
        });

        $('#gameArea').append(bubble);
    }

    // Detect keypress
    $(document).on('keydown', function(event) {
        const keyPressed = String.fromCharCode(event.which).toUpperCase();  

        if (keyPressed === currentLetter) {  
            $('.bubble').remove();  
            points++; 
            $('#points').text('Points: ' + points);  
            createBubble();  
        }
    });

    createBubble();
});
