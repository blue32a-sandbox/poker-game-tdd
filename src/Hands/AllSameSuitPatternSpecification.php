<?php

declare(strict_types=1);

namespace Poker\Hands;

use Poker\PlayerHand;
use Poker\Trump\Card;
use Poker\Trump\Suit;

class AllSameSuitPatternSpecification implements PatternSpecification
{
    public function isSatisfiedBy(PlayerHand $playerHand): bool
    {
        /** @var Suit[] $suits */
        $suits = array_map(fn(Card $card): Suit => $card->suit(), $playerHand->toArray());
        $uniqueSuits = array_unique($suits, SORT_REGULAR);

        return count($uniqueSuits) === 1;
    }
}
