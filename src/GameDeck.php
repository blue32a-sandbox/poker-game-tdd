<?php

declare(strict_types=1);

namespace Poker;

use Poker\Trump\Card;
use Poker\Trump\Deck;
use Poker\Trump\Rank;
use Poker\Trump\Suit;

class GameDeck extends Deck
{
    public static function factory(): Deck
    {
        $cards = [];

        foreach (Suit::cases() as $suit) {
            foreach (Rank::cases() as $rank) {
                $cards[] = new Card($suit, $rank);
            }
        }

        return new self($cards);
    }
}
