<?php

declare(strict_types=1);

namespace Poker\Hands;

use Poker\PlayerHand;
use Poker\Trump\Card;
use Poker\Trump\Rank;
use Poker\Trump\Suit;

class StraightHandSpecification extends HandSpecification
{
    public function isSatisfiedBy(PlayerHand $playerHand): bool
    {
        /** @var Suit[] $suits */
        $suits = array_map(fn(Card $card): Suit => $card->suit(), $playerHand->toArray());
        $uniqueSuits = array_unique($suits, SORT_REGULAR);

        if (count($uniqueSuits) === 1) {
            return false;
        }

        /** @var Rank[] $ranks */
        $ranks = array_map(fn(Card $card): Rank => $card->rank(), $playerHand->toArray());
        usort($ranks, fn(Rank $rankA, Rank $rankB) => $rankA->number() <=> $rankB->number());

        for ($i = 1; $i < count($ranks); $i++) {
            $preIndex = $i - 1;

            if ($ranks[$i]->number() !== $ranks[$preIndex]->number() + 1) {
                return false;
            }
        }

        return true;
    }
}
