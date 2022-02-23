<?php

declare(strict_types=1);

namespace Poker;

use InvalidArgumentException;
use Poker\Trump\Card;
use Poker\Trump\CardCollection;

class PlayerHand extends CardCollection
{
    private const NUM_OF_CARDS = 5;

    public function __construct(protected array $cards)
    {
        if (count($cards) !== self::NUM_OF_CARDS) {
            throw new InvalidArgumentException('The number of cards is five.');
        }

        parent::__construct($cards);
    }

    public function change(int $targetNum, Card $card): void
    {
        if ($targetNum < 1 || $targetNum > 5) {
            throw new InvalidArgumentException('The target num is from 1 to 5.');
        }

        $this->cards[$targetNum - 1] = $card;
    }

    public function __toString(): string
    {
        $cardStrings = [];

        foreach ($this->cards as $i => $card) {
            $cardStrings[] = sprintf('[%d] %s', $i + 1, strval($card));
        }

        return implode(' ', $cardStrings);
    }
}
