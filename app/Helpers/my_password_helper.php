<?php

function userPasswordHasher( $password ){
    return password_hash($password, PASSWORD_DEFAULT);
}
function userPasswordVerify( $password, $passwordHash ){
    return password_verify($password, $passwordHash);
}