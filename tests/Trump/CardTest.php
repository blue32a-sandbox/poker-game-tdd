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

    /**
     * @test
     */
    public function equalsメソッドの絵柄とランクが一致する場合にtrueを返す_HeartsのAceを渡すとtrueを返す(): void
    {
        $card = new Card(Suit::Hearts, Rank::Ace);
        $this->assertTrue($card->equals(new Card(Suit::Hearts, Rank::Ace)));
    }

    /**
     * @test
     */
    public function equalsメソッドの絵柄とランクが一致する場合にtrueを返す_絵柄が違うCrubsのAceを渡すとfalseを返す(): void
    {
        $card = new Card(Suit::Hearts, Rank::Ace);
        $this->assertFalse($card->equals(new Card(Suit::Clubs, Rank::Ace)));
    }

    /**
     * @test
     */
    public function equalsメソッドの絵柄とランクが一致する場合にtrueを返す_ランクが違うHeartsのKingを渡すとfalseを返す(): void
    {
        $card = new Card(Suit::Hearts, Rank::Ace);
        $this->assertFalse($card->equals(new Card(Suit::Hearts, Rank::King)));
    }
}
