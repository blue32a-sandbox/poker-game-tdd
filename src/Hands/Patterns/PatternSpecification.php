<?php

declare(strict_types=1);

namespace Poker\Hands\Patterns;

use Poker\PlayerHand;

interface PatternSpecification
{
    public function isSatisfiedBy(PlayerHand $playerHand): bool;
}
