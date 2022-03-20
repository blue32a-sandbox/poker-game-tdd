<?php

declare(strict_types=1);

namespace Poker;

use LogicException;
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

        if (!shuffle($cards)) {
            throw new RuntimeException('Failed to shuffle the cards.');
        }

        return new self($cards);
    }

    private function __construct(protected array $cards)
    {
        parent::__construct($cards);
    }

    public function draw(): Card
    {
        if (count($this->cards) === 0) {
            throw new LogicException('The game deck is empty.');
        }

        $card = array_shift($this->cards);

        if (is_null($card)) {
            throw new LogicException('cards is not array.');
        }

        return $card;
    }
}
