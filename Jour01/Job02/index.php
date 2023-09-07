<?php
function my_str_reverse(string $string) : string{
        $reversedString = '';
        $length = strlen($string);
    
        for ($i = $length - 1; $i >= 0; $i--) {
            $reversedString .= $string[$i];
        }
    
        return $reversedString;
    }
    
    // Exemple d'utilisation de la fonction
    $texte = "Hello";
    $resultat = my_str_reverse($texte);
    echo "Chaîne inversée : $resultat";
?>
    