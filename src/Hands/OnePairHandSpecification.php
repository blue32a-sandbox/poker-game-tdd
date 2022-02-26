<?php

declare(strict_types=1);

namespace Poker\Hands;

use Poker\PlayerHand;
use Poker\Trump\Rank;

class OnePairHandSpecification
{
    public function isSatisfiedBy(PlayerHand $playerHand): bool
    {
        $countsForRank = array_fill_keys(
            array_map(fn(Rank $rank): string => $rank->value, Rank::cases()),
            0
        );

        foreach ($playerHand->toArray() as $card) {
            $countsForRank[$card->rank()->value]++;
        }

        $countPair = 0;
        $countSingle = 0;

        foreach ($countsForRank as $count) {
            if ($count === 2) {
                $countPair++;
            } else if ($count === 1) {
                $countSingle++;
            }
        }

        return $countPair === 1 && $countSingle === 3;
    }
}
