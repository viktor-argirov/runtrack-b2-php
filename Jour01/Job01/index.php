<?php
function my_str_search(string $needle, string $haystack): int {
    $count = 0;
    $needle_length = strlen($needle);
    $haystack_length = strlen($haystack);

    for ($i = 0; $i < $haystack_length; $i++) {
        $match = true;
        for ($j = 0; $j < $needle_length; $j++) {
            if (!isset($haystack[$i + $j]) || $haystack[$i + $j] !== $needle[$j]) {
                $match = false;
                break;
            }
        }
        if ($match) {
            $count++;
        }
    }

    return $count;
}

// Exemple d'utilisation de la fonction
$phrase = "La Plateforme";
$lettreRecherchee = "a";
$resultat = my_str_search($lettreRecherchee, $phrase);
echo "Le nombre d'occurrences de la lettre '$lettreRecherchee' dans la phrase est : $resultat";
?>
