<?php
function my_is_multiple(int $divider, int $multiple): bool {
    $isMultiple = true;
    $result = 0;

    while (isset($result)) {
        $result += $divider;

        if ($result === $multiple) {
            return $isMultiple;
        } elseif ($result > $multiple) {
            return false;
        }
    }
}

$resultat1 = my_is_multiple(2, 4); 
$resultat2 = my_is_multiple(2, 5); 

if ($resultat1) {
    echo " 2 est un multiple de 4\n ,";
} else {
    echo " 2 n'est pas un multiple de 4\n ,";
}
    

if ($resultat2) {
    echo " 2 est un multiple de 5\n";
} else {
    echo " 2 n'est pas un multiple de 5\n";
}
?>
