<?php

Class JWT
{
    public function generate(array $header, array $payload, string $secret, int $validity = 86400) : string{

        if ($validity > 0){
            $now = new DateTime();
            $expiration = $now->getTimestamp() + $validity;
            $payload['iat']= $now->getTimestamp();
            $payload['exp']= $expiration;
        }
        // on encode en base64

        $base64Header = base64_encode(json_encode($header));
        $base64Payload = base64_encode(json_encode($payload));

        //on nettoie les valeurs encodées
        $base64Header = str_replace(['+', '/', '='], ['-', '_', ''], $base64Header);
        $base64Payload = str_replace(['+', '/', '='], ['-', '_', ''], $base64Payload);

        //on génère la signature

        $secret = base64_encode(SECRET);

        //on crée le token
        $signature = hash_hmac('sha256', $base64Header . '.' . $base64Payload, $secret, true);

        $base64Signature = base64_encode($signature);

        $signature =  str_replace(['+', '/', '='], ['-', '_', ''], $base64Signature);

        // on crée le token
        $jwt = $base64Header . '.' . $base64Payload . '.' . $signature;

        return $jwt;
    }


    public function check(string $token, string $secret){
        
        $header = $this->getHeader($token);
        $payload= $this->getPayload($token);

        //on génère un token de vérification // temps a 0 car iat et exp déjà récupéré, en mettant à 0 je ne rajoute pas les dates pas de timing
        $verifToken= $this->generate($header, $payload, $secret, 0);
        return $token === $verifToken;
    }

    public function getHeader(string $token){
       //Démontage token
       $array = explode ('.', $token);
        //on décode le header
        $header = json_decode(base64_decode($array[0]), true);

        return $header;
    }

    public function getPayload(string $token){
        
        //Démontage token
        $array = explode('.', $token);
        //on décode le header
        $payload = json_decode(base64_decode($array[1]), true);

        return $payload;
    }

    public function isExpired(string $token): bool //token a expiré ou non
    {

        $payload = $this->getPayload($token);

        $now= new DateTime(); 

        // est ce que l'expiration est inferieur sinon toujours valide
        return $payload['exp']< $now->getTimestamp();
    }

    // la chaine de caractere est un token jwt ou non 
    public function isValid(string $token): bool 
    {

        return preg_match (
            '/^[a-zA-Z0-9\-\_\=]+\.[a-zA-Z0-9\6\_\=]+\.[a-zA-Z0-9\6\_\=]+$/', $token
        ) === 1;
    }
}