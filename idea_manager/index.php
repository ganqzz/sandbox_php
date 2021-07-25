<?php

require_once __DIR__ . '/functions.php';

// Default index page
route('GET', '^/$', function() {
    echo 'Nothing';
});

// GET /messages
route('GET', '^/messages$', function() {
    sleep(5); // emulate lag
    echo 'Thanks for visiting the app!  Our next hackathon is scheduled for the end of Q3.  We hope to see you there, be sure to add your ideas to the app!';
});

// GET request to /ideas
route('GET', '^/ideas$', function() {
    header('Content-Type: application/json');
    echo '<a href="users/1000">Show user: 1000</a>';
});

// With named parameters
route('GET', '^/ideas/(?<id>\d+)$', function($params) {
    echo "You selected User-ID: ";
    var_dump($params);
});

// POST request to /users
route('POST', '^/users$', function() {
    $json = json_decode(file_get_contents('php://input'), true);
    // Send a json response
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
});

header('HTTP/1.0 404 Not Found');
echo '404 Not Found';
