<?php

final class FamilyDao {

    static function getFamily() : Family {

        if (isset($_COOKIE['family'])) {
            return unserialize($_COOKIE['family']);
        } else {
            return new Family();
        }
    }

    static function updateFamily(Family $family) : void {
        setcookie('family', serialize($family));
    }

    static function reset() : void {
        unset($_COOKIE['family']);
        setcookie('family', null, -1, '/');
    }
}