<?php

declare(strict_types=1);

namespace Poker\Hands;

use Poker\PlayerHand;
use Poker\Trump\Rank;

class FourCardsHandSpecification implements HandSpecification
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

        foreach ($countsForRank as $count) {
            if ($count === 4) {
                return true;
            }
        }

        return false;
    }
}
