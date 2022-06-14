<?php

declare(strict_types=1);

namespace Poker\Hands;

use Poker\Hands\Patterns\AllSameSuitPatternSpecification;
use Poker\Hands\Patterns\SequentialRankPatternSpecification;
use Poker\PlayerHand;

class StraightHandSpecification implements HandSpecification
{
    public function isSatisfiedBy(PlayerHand $playerHand): bool
    {
        if ($this->isAllSameSuit($playerHand)) {
            return false;
        }

        return $this->isSequentialRank($playerHand);
    }

    private function isAllSameSuit(PlayerHand $playerHand): bool
    {
        $specification = new AllSameSuitPatternSpecification();
        return $specification->isSatisfiedBy($playerHand);
    }

    private function isSequentialRank(PlayerHand $playerHand): bool
    {
        $specification = new SequentialRankPatternSpecification();
        return $specification->isSatisfiedBy($playerHand);
    }
}
