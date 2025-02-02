<script>
        async function fetchScoreboard() {
            const response = await fetch('scoreboard.php');
            const scoreboard = await response.json();
            renderScoreboard(scoreboard);
        }

        async function addPlayer() {
            const playerName = document.getElementById('playerName').value.trim();
            if (playerName) {
                const formData = new FormData();
                formData.append('action', 'addPlayer');
                formData.append('playerName', playerName);

                await fetch('scoreboard.php', { method: 'POST', body: formData });
                fetchScoreboard();
                document.getElementById('playerName').value = '';
            }
        }

        async function updateScore(playerName, score) {
            const formData = new FormData();
            formData.append('action', 'updateScore');
            formData.append('playerName', playerName);
            formData.append('score', score);

            await fetch('scoreboard.php', { method: 'POST', body: formData });
            fetchScoreboard();
        }

        async function resetScoreboard() {
            const formData = new FormData();
            formData.append('action', 'reset');

            await fetch('scoreboard.php', { method: 'POST', body: formData });
            fetchScoreboard();
        }

        function renderScoreboard(scoreboard) {
            const scoreboardDiv = document.getElementById('scoreboard');
            scoreboardDiv.innerHTML = '';

            Object.entries(scoreboard).forEach(([player, score]) => {
                const playerDiv = document.createElement('div');
                playerDiv.className = 'player';
                playerDiv.innerHTML = `
                    <strong>${player}</strong>: ${score}
                    <button onclick="updateScore('${player}', 1)">+1</button>
                    <button onclick="updateScore('${player}', -1)">-1</button>
                `;
                scoreboardDiv.appendChild(playerDiv);
            });
        }

        document.addEventListener('DOMContentLoaded', fetchScoreboard);
    </script>