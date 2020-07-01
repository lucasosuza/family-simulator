<?php

final class FamilyPrinter {

    static function summary(Family $family) {
        $summary = ' ';

        if( $family->count() > 0 ) {
            $summary .= '<h2>Family</h2>';

            $summary .= '<ul>';
            if( $family->hasMum())
                $summary .= '<li>Mum: ' . $family->getMum() . '</li>';
            if( $family->hasDad() )
                $summary .= '<li>Dad: ' . $family->getDad() . '</li>';
            if( $family->hasChildren() )
                $summary .= '<li>Children: ' . $family->getChildren() . '</li>';
            if( $family->hasCat() )
                $summary .= '<li>Cats: ' . $family->getCat(). '</li>';
            if( $family->hasDog() )
                $summary .= '<li>Dogs: ' . $family->getDog() . '</li>';
            if( $family->hasGoldfish() )
                $summary .= '<li>Goldfish: ' . $family->getGoldfish() . '</li>';

            $summary .= '<li><b>Total Members</b>: ' . $family->count() . '</li>';
            $summary .= '<li><b>Monthly Food Costs</b>: ' . FamilyCosts::total($family) . ' $ </li>';

            $summary .= '</ul>';
        }

        return $summary;
    }

}