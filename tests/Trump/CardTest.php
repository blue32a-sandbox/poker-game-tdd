<?php

declare(strict_types=1);

namespace Tests\Trump;

use PHPUnit\Framework\TestCase;
use Poker\Trump\Card;
use Poker\Trump\Rank;
use Poker\Trump\Suit;

class CardTest extends TestCase
{
    /**
     * @test
     */
    public function suitメソッドは絵柄を取得できる_コンストラクタに渡したHeartsを返す(): void
    {
        $card = new Card(Suit::Hearts, Rank::Ace);
        $this->assertSame(Suit::Hearts, $card->suit());
    }

    /**
     * @test
     */
    public function rankメソッドはランクを取得できる_コンストラクタに渡したAceを返す(): void
    {
        $card = new Card(Suit::Hearts, Rank::Ace);
        $this->assertSame(Rank::Ace, $card->rank());
    }
}
