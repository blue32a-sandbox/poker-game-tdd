<?php

declare(strict_types=1);

namespace Poker\Trump;

class Card
{
    public function __construct(private Suit $suit, private Rank $rank)
    {
    }

    public function suit(): Suit
    {
        return $this->suit;
    }

    public function rank(): Rank
    {
        return $this->rank;
    }
}
