<?php


final class FamilyCosts
{
    static function sum(Family $family){
        if( $family == null ) {
            echo ' ';
            return;
        }

        if( $family->count() > 0 ) {
            echo '<h2>Family</h2>';

            echo '<ul>';
            if( $family->hasMum())
                echo '<li>Mum: ' . $family->getMum() . '</li>';
            if( $family->hasDad() )
                echo '<li>Dad: ' . $family->getDad() . '</li>';
            if( $family->hasChildren() )
                echo '<li>Children: ' . $family->getChildren() . '</li>';
            if( $family->hasCat() )
                echo '<li>Cats: ' . $family->getCat(). '</li>';
            if( $family->hasDog() )
                echo '<li>Dogs: ' . $family->getDog() . '</li>';
            if( $family->hasGoldfish() )
                echo '<li>Goldfish: ' . $family->getGoldfish() . '</li>';


            echo '<li><b>Total Members</b>: ' . $family->count() . '</li>';
            echo '<li><b>Monthly Food Costs</b>: ' . FamilyCosts::total($family) . ' $ </li>';


            echo '</ul>';
        }
    }

    static function total(Family $family) : int {
        $sum = 0;

        if( $family->hasMum())
            $sum += 200;

        if( $family->hasDad())
            $sum += 200;

        if( $family->hasChildren()) {
            if( $family->getChildren() > 2 ) {
                $sum += $family->getChildren() * 100;
            } else {
                $sum += $family->getChildren() * 150;
            }
        }

        if( $family->hasCat() )
            $sum += $family->getCat() * 10;

        if( $family->hasDog() )
            $sum += $family->getDog() * 15;

        if( $family->hasGoldfish() )
            $sum += $family->getGoldfish() * 2;

        return $sum;
    }
}