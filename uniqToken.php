<?php
require_once 'config.php';
require_once 'jwt.php';

$client_id = 'client1'; // ID du client pour lequel on génère le jeton

$header = array(
    'alg' => 'HS256',
    'typ' => 'JWT'
);

$payload = array(
    'sub' => '1234567890',
    'name' => 'John Doe',
    'iat' => 1516239022
);

$secret = $config[$client_id]; // Récupération de la clé secrète depuis le fichier de configuration

$jwt = new JWT();
$token = $jwt->generate($header, $payload, $secret);
