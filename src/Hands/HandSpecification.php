<?php

declare(strict_types=1);

namespace Poker\Hands;

use Poker\PlayerHand;

abstract class HandSpecification
{
    abstract public function isSatisfiedBy(PlayerHand $playerHand): bool;
}
