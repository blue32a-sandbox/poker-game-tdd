<?php

declare(strict_types=1);

namespace Poker\Hands;

use Poker\PlayerHand;
use Poker\Trump\Rank;

class TwoPairHandSpecification extends HandSpecification
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

        foreach ($countsForRank as $count) {
            if ($count === 2) {
                $countPair++;
            }
        }

        return $countPair === 2;
    }
}
