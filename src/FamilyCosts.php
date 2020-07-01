<?php


final class FamilyCosts
{
    static function total(Family $family) : int {
        $sum = 0;

        $sum = self::addDadCost($family, $sum);

        $sum = self::addMomCost($family, $sum);

        $sum = self::addChildrenCost($family, $sum);

        $sum = self::addCatCost($family, $sum);

        $sum = self::addDogCost($family, $sum);

        $sum = self::addGoldfishCost($family, $sum);

        return $sum;
    }

    /**
     * @param Family $family
     * @param int $sum
     * @return int
     */
    public static function addDadCost(Family $family, int $sum): int
    {
        if ($family->hasDad())
            $sum += 200;
        return $sum;
    }

    /**
     * @param Family $family
     * @param int $sum
     * @return int
     */
    public static function addMomCost(Family $family, int $sum): int
    {
        if ($family->hasMum())
            $sum += 200;
        return $sum;
    }

    /**
     * @param Family $family
     * @param $sum
     * @return float|int
     */
    public static function addChildrenCost(Family $family, $sum)
    {
        if ($family->hasChildren()) {
            if ($family->getChildren() > 2) {
                $sum += $family->getChildren() * 100;
            } else {
                $sum += $family->getChildren() * 150;
            }
        }
        return $sum;
    }

    /**
     * @param Family $family
     * @param $sum
     * @return float|int
     */
    public static function addCatCost(Family $family, $sum)
    {
        if ($family->hasCat())
            $sum += $family->getCat() * 10;
        return $sum;
    }

    /**
     * @param Family $family
     * @param $sum
     * @return float|int
     */
    public static function addDogCost(Family $family, $sum)
    {
        if ($family->hasDog())
            $sum += $family->getDog() * 15;
        return $sum;
    }

    /**
     * @param Family $family
     * @param $sum
     * @return float|int
     */
    public static function addGoldfishCost(Family $family, $sum)
    {
        if ($family->hasGoldfish())
            $sum += $family->getGoldfish() * 2;
        return $sum;
    }
}