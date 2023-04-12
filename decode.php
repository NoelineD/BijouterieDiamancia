<?php
const TOKEN='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoxMjMsInJvbGVzIjpbIlJPTEVfQURNSU4iLCJST0xFX1VTRVIiXSwiZW1haWwiOiJjb250YWN0QGRlbW8uZnIiLCJpYXQiOjE2ODEzMDU1NTQsImV4cCI6MTY4MTMwNTYxNH0.1NBZN8F2xxwPZIj7eWuRHakRhF8DVHx8E5w3Tn2av8w
';
require_once 'config.php';
require_once 'JWT.php';

$jwt = new JWT();
// var_dump($jwt->getHeader(TOKEN));
// on verifie si le token est bon.
var_dump($jwt->isValid(TOKEN));