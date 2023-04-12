<?php
header('Access-Control-Allow-Origin:*');

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    HTTP_response_code(405);

    echo json_encode(['message' => 'Méthode non autorisée']);

    exit;
}

// onvérifie si on recoit un token

if (isset($_SERVER['Authorization'])) {
    // pour enlever les espaces au début et à la fin
    $token = trim(($_SERVER['Authorization']));
} elseif (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    $token = trim(($_SERVER['Authorization']));
} elseif (function_exists('apache_request_headers')) {
    $requestHeaders = apache_request_headers();
    if (isset($requestHeaders['Authorization'])) {
        $auth = trim($requestHeaders['Authorization']);
    }
}
