<?php
function my_array_sort(array $arrayToSort, string $order): array {
    if ($order === "ASC") {
        sort($arrayToSort); 
    } elseif ($order === "DESC") {
        rsort($arrayToSort); 
    }

    return $arrayToSort;
}

$array1 = [2, 24, 12, 7, 34];
$sortedArray1ASC = my_array_sort($array1, "ASC");

$array2 = [8, 5, 23, 89, 6, 10];
$sortedArray2DESC = my_array_sort($array2, "DESC");

echo "Tri ASC : ";
print_r($sortedArray1ASC);

echo "Tri DESC : ";
print_r($sortedArray2DESC);
?>
