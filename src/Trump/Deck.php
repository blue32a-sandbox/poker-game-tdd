<?php

declare(strict_types=1);

namespace Poker\Trump;

use InvalidArgumentException;

class Deck
{
    public function __construct(private array $cards)
    {
        foreach ($cards as $card) {
            if (!$card instanceof Card) {
                throw new InvalidArgumentException('The value is not Card.');
            }
        }
    }

    public function cards(): array
    {
        return $this->cards;
    }
}
