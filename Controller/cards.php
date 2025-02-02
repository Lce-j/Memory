<?php
require './Model/cards.php';
?>

<script>
    drawCards(async ()=>{
        const count = document.getElementById('cardCount').value || 5; // Default to 5 cards
        const response = await fetch('./Includes/database.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `count=${count}`,
        });

        if (response.ok) {
            const cards = await response.json();
            displayCards(cards);
        } else {
            alert('Error fetching cards!');
        }
    })

    displayCards((cards)=>{
        const resultDiv = document.getElementById('result');
        resultDiv.innerHTML = "<h3>Randomly drawn cards:</h3>";
        cards.forEach(card => {
            const cardElement = document.createElement('p');
            cardElement.textContent = card;
            resultDiv.appendChild(cardElement);
        });
    })
</script>
<?php
require './View/cards.php';
?>