<?php

declare(strict_types=1);

namespace Poker\Hands;

use Poker\PlayerHand;
use Poker\Trump\Card;
use Poker\Trump\Rank;

class StraightHandSpecification extends HandSpecification
{
    public function isSatisfiedBy(PlayerHand $playerHand): bool
    {
        if ($this->isAllSameSuit($playerHand)) {
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

    private function isAllSameSuit(PlayerHand $playerHand): bool
    {
        $specification = new AllSameSuitPatternSpecification();
        return $specification->isSatisfiedBy($playerHand);
    }
}
