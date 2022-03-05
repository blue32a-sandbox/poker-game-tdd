<?php

declare(strict_types=1);

namespace Poker\Trump;

use Countable;
use InvalidArgumentException;
use IteratorAggregate;
use Traversable;

class CardCollection implements Countable ,IteratorAggregate
{
    public function __construct(protected array $cards)
    {
        foreach ($cards as $card) {
            if (!$card instanceof Card) {
                throw new InvalidArgumentException('The value is not Card.');
            }
        }
    }

    public function count(): int
    {
        return count($this->cards);
    }

    public function getIterator(): Traversable
    {
        yield from $this->cards;
    }

    public function get(int $index): ?Card
    {
        return $this->cards[$index] ?? null;
    }

    /**
     * @return Card[]
     */
    public function toArray(): array
    {
        return $this->cards;
    }
}
