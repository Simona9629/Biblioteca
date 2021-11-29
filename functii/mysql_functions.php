<?php

function conectareBD($host = 'localhost', $user = 'root', $pass = '', $database = 'biblioteca')
{
    return mysqli_connect($host, $user, $pass, $database);
}

function preiaCarteDupaIsbn($isbn)
{
    $link = conectareBD();
    $query = "SELECT * FROM carte WHERE isbn = '$isbn'";
    $result = mysqli_query($link, $query);
    $carte = mysqli_fetch_array($result);
    return $carte;
}
function clearData($input, $link)
{
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripslashes($input);
    $input = mysqli_real_escape_string($link, $input);
   
    return $input;
}

function adaugareCarte($titlu, $autor, $editura, $isbn, $gen, $imagine) 
{
    $link = conectareBD();
    $titlu = clearData($titlu, $link);
    $autor = clearData($autor, $link);
    $editura = clearData($editura, $link);
    $isbn = clearData($isbn, $link);
    
    $carte = preiaCarteDupaIsbn($isbn);
    
    
    if (strlen($titlu) < 3 || strlen($editura) < 3 || strlen($isbn) < 3) {
        return ['error' => true, 'message' => 'Datele introduse petru titlu/ editura/ autor nu sunt corecte'];
    }
    if (strlen($isbn) != 5) {
        return ['error' => true, 'message' => 'ISBN are mai mult de 5 caractere '];
    }
    if ($carte) {
        return ['error' => true, 'message' => 'Cartea deja exista!'];
    }
    $query = "INSERT INTO carte VALUES(NULL, '$titlu','$autor','$editura','$isbn','$gen', '$imagine')";
    $rez = mysqli_query($link, $query);
    

    if ($rez) {
        return ['error' => false, 'message' => 'Carte adaugata cu succes!'];
    } else {
        return ['error' => true, 'message' => 'A aparut o eroare'];
    }
}

function afisareCarti()
{
    $link = conectareBD();
    $query = "SELECT * FROM carte";
    $result = mysqli_query($link, $query);
    $carti = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $carti;
    
}

function preiaCartiDupaKeyword($keyword)
{
    $link = conectareBD();
    $keyword = clearData($keyword, $link);
    $query = "SELECT * FROM carte WHERE titlu LIKE '%$keyword%'";
    $rezultat = mysqli_query($link, $query);
    $carti = mysqli_fetch_all($rezultat, MYSQLI_ASSOC);
    return $carti;
}