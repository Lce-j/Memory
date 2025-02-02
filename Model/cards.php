<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    header('Content-Type: application/json');
    echo json_encode($randomCards);
    exit;
}
