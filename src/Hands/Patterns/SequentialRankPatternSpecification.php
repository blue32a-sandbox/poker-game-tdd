<?php

declare(strict_types=1);

namespace Poker\Hands\Patterns;

use Poker\PlayerHand;
use Poker\Trump\Card;
use Poker\Trump\Rank;

class SequentialRankPatternSpecification implements PatternSpecification
{
    public function isSatisfiedBy(PlayerHand $playerHand): bool
    {
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
