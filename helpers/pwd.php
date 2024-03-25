<?php 
//Génération de mot de passe aléatoire uniquement à l'envoi du mail pour avertir que la galerie est prête.
//stockage en variable, insertion de la variable dans le corps du mail avec hashage en mise en bdd juste avant.
class PWD
{
    public static function set(): string
    {
        $pwd = bin2hex(openssl_random_pseudo_bytes(6));
        $pwd_array = str_split($pwd);
        $specials = array('L', 'T', 'A', 'V', '-', '-', '-', '!', '5', 'L', 'P', 'O', 'L', 'U', 'n');
        $pwd_array[random_int(0, 14)] = $specials[random_int(0, 14)];
        $pwd = implode('', $pwd_array);
        return $pwd;
    }
}