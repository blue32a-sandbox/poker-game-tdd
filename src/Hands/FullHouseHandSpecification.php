<?php

declare(strict_types=1);

namespace Poker\Hands;

use Poker\PlayerHand;
use Poker\Trump\Rank;

class FullHouseHandSpecification extends HandSpecification
{
    public function isSatisfiedBy(PlayerHand $playerHand): bool
    {
        $countsForRank = array_fill_keys(
            array_map(fn(Rank $rank): string => $rank->value, Rank::cases()),
            0
        );

        foreach ($playerHand as $card) {
            $countsForRank[$card->rank()->value]++;
        }

        $countThree = 0;
        $countPair = 0;

        foreach ($countsForRank as $count) {
            if ($count === 3) {
                $countThree++;
            } else if ($count === 2) {
                $countPair++;
            }
        }

        return $countThree === 1 && $countPair === 1;
    }
}
