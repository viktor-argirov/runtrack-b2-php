<?php
function my_is_prime(int $number) : bool {
    if ($number <= 1) {
        return false; 
    }

    for ($i = 2; $i * $i <= $number; $i++) {
        if ($number % $i === 0) {
            return false; 
        }
    }

    return true; 
}

$nombre1 = 3; 
$nombre2 = 12; 

$resultat1 = my_is_prime($nombre1);
$resultat2 = my_is_prime($nombre2);

if ($resultat1) {
    echo " $nombre1 est premier.\n ,";
} else {
    echo " $nombre1 n'est pas premier.\n ,";
}

if ($resultat2) {
    echo " $nombre2 est premier.\n ";
} else {
    echo " $nombre2 n'est pas premier.\n ";
}
?>