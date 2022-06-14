<?php

declare(strict_types=1);

namespace Poker\Hands;

use Poker\PlayerHand;

interface HandSpecification
{
    public function isSatisfiedBy(PlayerHand $playerHand): bool;
}
