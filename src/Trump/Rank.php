<?php

declare(strict_types=1);

namespace Poker\Trump;

enum Rank: string
{
    case Ace   = 'A';
    case Two   = '2';
    case Three = '3';
    case Four  = '4';
    case Five  = '5';
    case Six   = '6';
    case Seven = '7';
    case Eight = '8';
    case Nine  = '9';
    case Ten   = '10';
    case Jack  = 'J';
    case Queen = 'Q';
    case King  = 'K';

    public function number(): int
    {
        return match($this) {
            Rank::Ace   => 1,
            Rank::Two   => 2,
            Rank::Three => 3,
            Rank::Four  => 4,
            Rank::Five  => 5,
            Rank::Six   => 6,
            Rank::Seven => 7,
            Rank::Eight => 8,
            Rank::Nine  => 9,
            Rank::Ten   => 10,
            Rank::Jack  => 11,
            Rank::Queen => 12,
            Rank::King  => 13,
        };
    }
}
