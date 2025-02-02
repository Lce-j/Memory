<?php
session_start();

// Initialize scoreboard in session if not set
if (!isset($_SESSION['scoreboard'])) {
    $_SESSION['scoreboard'] = [];
}

// Handle incoming actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'addPlayer') {
        $playerName = $_POST['playerName'] ?? '';
        if (!empty($playerName) && !isset($_SESSION['scoreboard'][$playerName])) {
            $_SESSION['scoreboard'][$playerName] = 0; // Start with 0 score
        }
    } elseif ($action === 'updateScore') {
        $playerName = $_POST['playerName'] ?? '';
        $score = (int)($_POST['score'] ?? 0);
        if (isset($_SESSION['scoreboard'][$playerName])) {
            $_SESSION['scoreboard'][$playerName] += $score; // Update score
        }
    } elseif ($action === 'reset') {
        $_SESSION['scoreboard'] = []; // Reset scoreboard
    }

    // Return updated scoreboard
    header('Content-Type: application/json');
    echo json_encode($_SESSION['scoreboard']);
    exit;
}

// Default: Return the scoreboard
header('Content-Type: application/json');
echo json_encode($_SESSION['scoreboard']);
exit;
