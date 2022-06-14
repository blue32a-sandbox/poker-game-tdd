<?php

declare(strict_types=1);

namespace Poker\Hands;

use Poker\PlayerHand;

interface PatternSpecification
{
    public function isSatisfiedBy(PlayerHand $playerHand): bool;
}
