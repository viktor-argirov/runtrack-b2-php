<?php
function my_closest_to_zero(array $array): int {
    if (empty($array)) {
    
        return 0;
    }

    $closest = $array[0]; 

    foreach ($array as $number) {
        if (abs($number) < abs($closest)) {
            $closest = $number;
        } elseif (abs($number) === abs($closest) && $number > $closest) {
            
            $closest = $number;
        }
    }

    return $closest;
}

$array1 = [2, -1, 5, 23, 21, 9];
$result1 = my_closest_to_zero($array1);

$array2 = [234, -142, 512, 1223, 451, -59];
$result2 = my_closest_to_zero($array2);

echo " Le nombre le plus proche de zéro dans le premier tableau est : $result1\n ";
echo " Le nombre le plus proche de zéro dans le deuxième tableau est : $result2\n ";
?>