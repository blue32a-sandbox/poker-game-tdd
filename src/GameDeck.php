<?php

declare(strict_types=1);

namespace Poker;

use Poker\Trump\Card;
use Poker\Trump\CardCollection;
use Poker\Trump\Rank;
use Poker\Trump\Suit;
use RuntimeException;

class GameDeck extends CardCollection
{
    public static function factory(): self
    {
        $cards = [];

        foreach (Suit::cases() as $suit) {
            foreach (Rank::cases() as $rank) {
                $cards[] = new Card($suit, $rank);
            }
        }

        return new self($cards);
    }

    private function __construct(protected array $cards)
    {
        parent::__construct($cards);
    }

    public function shuffle(): void
    {
        if (!shuffle($this->cards)) {
            throw new RuntimeException('Failed to shuffle the cards.');
        }
    }
}
