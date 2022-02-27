<?php

declare(strict_types=1);

namespace Tests\Hands;

use PHPUnit\Framework\TestCase;
use Poker\Hands\StraightHandSpecification;
use Poker\PlayerHand;
use Poker\Trump\Card;
use Poker\Trump\Rank;
use Poker\Trump\Suit;

/**
 * @testdox ポーカーのハンド「ストレート」の仕様を示す StraightHandSpecification クラスのテスト
 */
class StraightHandSpecificationTest extends TestCase
{
    private StraightHandSpecification $specification;

    public function setUp(): void
    {
        $this->specification = new StraightHandSpecification();
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がストレートか判定する_異なる絵柄でランクが連続していればtrueを返す(): void
    {
        $sequentialRankHand = new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Diamonds, Rank::Three),
            new Card(Suit::Clubs, Rank::Five),
            new Card(Suit::Spades, Rank::Four),
            new Card(Suit::Hearts, Rank::Two),
        ]);

        $this->assertTrue($this->specification->isSatisfiedBy($sequentialRankHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がストレートか判定する_ランクが連続していなければfalseを返す(): void
    {
        $notSequentialRankHand = new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Diamonds, Rank::Three),
            new Card(Suit::Spades, Rank::Four),
            new Card(Suit::Clubs, Rank::Six), // not sequential
        ]);

        $this->assertFalse($this->specification->isSatisfiedBy($notSequentialRankHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がストレートか判定する_ランクが連続していても絵柄が同じならfalseを返す(): void
    {
        $straightFlushHand = new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Hearts, Rank::Three),
            new Card(Suit::Hearts, Rank::Five),
            new Card(Suit::Hearts, Rank::Four),
            new Card(Suit::Hearts, Rank::Two),
        ]);

        $this->assertFalse($this->specification->isSatisfiedBy($straightFlushHand));
    }
}
