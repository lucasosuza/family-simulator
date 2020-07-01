<?php

final class Controller {

    static function buildFamily() : Family {
        if (!isset($_COOKIE['family'])) {
            setcookie('family', serialize(new Family()));
        }

        return unserialize($_COOKIE['family']);
    }

    static function updateFamily(Family $family) : void {
        setcookie('family', serialize($family));
    }
}