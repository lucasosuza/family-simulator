<?php

final class Controller {

    static function buildFamily() {
        if (!isset($_SESSION['family'])) {
            $_SESSION['family'] = new Family();
        }

        return $_SESSION['family'];
    }
}