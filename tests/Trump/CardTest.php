<?php

declare(strict_types=1);

namespace Tests\Trump;

use PHPUnit\Framework\TestCase;
use Poker\Trump\Card;
use Poker\Trump\Rank;
use Poker\Trump\Suit;

class CardTest extends TestCase
{
    private function factoryCard(Suit $suit, Rank $rank)
    {
        return new Card($suit, $rank);
    }

    /**
     * @test
     */
    public function suitメソッドは絵柄を取得できる_コンストラクタに渡したHeartsを返す(): void
    {
        $heartsCard = $this->factoryCard(suit: Suit::Hearts, rank: Rank::Ace);
        $this->assertSame(Suit::Hearts, $heartsCard->suit());
    }

    /**
     * @test
     */
    public function rankメソッドはランクを取得できる_コンストラクタに渡したAceを返す(): void
    {
        $aceCard = $this->factoryCard(rank: Rank::Ace, suit: Suit::Hearts);
        $this->assertSame(Rank::Ace, $aceCard->rank());
    }

    /**
     * @test
     */
    public function equalsメソッドは等価比較ができる_絵柄とランクが同じHeartsのAceを渡すとtrueを返す(): void
    {
        $heartsAceCardA = $this->factoryCard(suit: Suit::Hearts, rank: Rank::Ace);
        $heartsAceCardB = $this->factoryCard(suit: Suit::Hearts, rank: Rank::Ace);
        $this->assertTrue($heartsAceCardA->equals($heartsAceCardB));
    }

    /**
     * @test
     */
    public function equalsメソッドは等価比較ができる_絵柄が異なるCrubsのAceを渡すとfalseを返す(): void
    {
        $heartsAceCard = $this->factoryCard(suit: Suit::Hearts, rank: Rank::Ace);
        $crubsAceCard = $this->factoryCard(suit: Suit::Clubs, rank: Rank::Ace);
        $this->assertFalse($heartsAceCard->equals($crubsAceCard));
    }

    /**
     * @test
     */
    public function equalsメソッドは等価比較ができる_ランクが異なるHeartsのKingを渡すとfalseを返す(): void
    {
        $heartsAceCard = $this->factoryCard(suit: Suit::Hearts, rank: Rank::Ace);
        $heartsKingCard = $this->factoryCard(suit: Suit::Hearts, rank: Rank::King);
        $this->assertFalse($heartsAceCard->equals($heartsKingCard));
    }

    /**
     * @test
     */
    public function クラスオブジェクトは絵柄とランクを含む文字列に変更できる_文字列”H_A”をに変換される(): void
    {
        $heartsAceCard = $this->factoryCard(suit: Suit::Hearts, rank: Rank::Ace);
        $this->assertSame('H_A', strval($heartsAceCard));
    }
}
