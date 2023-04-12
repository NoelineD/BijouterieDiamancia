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

    //verifier si on a un header qui s'appelle http auth
} elseif (isset($_SERVER['HTTP_AUTHORIZATION'])) {
    //si on a bien on recup le trim on enlebe les espaces...
    $token = trim(($_SERVER['Authorization']));

    //si on a bien cette fonction on recupere les headers on appelle la function
} elseif (function_exists('apache_request_headers')) {
    $requestHeaders = apache_request_headers();

    if (isset($requestHeaders['Authorization'])) {
        $auth = trim($requestHeaders['Authorization']);
    }
}

// si le token n'existe pas ou ne correspond pas à une chaine de caractere commencant par bearer suivi d'un espace \s, serie de caractere
// on passe le token et le match si on a pas de match alors http response code et on retourne
if (!isset($token) || !preg_match('/Bearer\s(\S+)/', $token, $matches)) {
    http_response_code(400);
    echo json_encode(['message' => 'token introuvable']);
    exit;
}

//on nettoie le token
$token = str_replace('Bearer', '', $token);

require_once 'config.php';
require_once 'JWT.php';

$jwt = new JWT();

//on vérifie la validité
if (!$jwt->isValid($token)) {
    http_response_code(400);
    echo json_encode(['message' => 'Token invalide']);
    exit;
}

//on vérifie la signature
if (!$jwt->check($token, SECRET)) {
    http_response_code(403);
    echo json_encode(['message' => 'Token invalide']);
    exit;
}

// on vérifie l'expiration
if ($jwt->isExpired($token)) {
    http_response_code(403);
    echo json_encode(['message' => 'Token expiré']);
    exit;
}

echo json_encode($jwt->getPayload($token));
