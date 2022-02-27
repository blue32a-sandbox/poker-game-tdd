<?php

declare(strict_types=1);

namespace Tests\Hands;

use PHPUnit\Framework\TestCase;
use Poker\Hands\ThreeCardsHandSpecification;
use Poker\PlayerHand;
use Poker\Trump\Card;
use Poker\Trump\Rank;
use Poker\Trump\Suit;

/**
 * @testdox ポーカーの役「スリーカード」の仕様を示す ThreeCardsHandSpecification クラスのテスト
 */
class ThreeCardsHandSpecificationTest extends TestCase
{
    private ThreeCardsHandSpecification $specification;

    public function setUp(): void
    {
        $this->specification = new ThreeCardsHandSpecification();
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札が仕様を満たしているか判定する_手札に同じランクの３枚と他ランクの２枚があればtrueを返す(): void
    {
        $threeCardsHand = new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Diamonds, Rank::Ace),
            new Card(Suit::Spades, Rank::Three),
            new Card(Suit::Clubs, Rank::Ace),
        ]);

        $this->assertTrue($this->specification->isSatisfiedBy($threeCardsHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札が仕様を満たしているか判定する_手札に同じランクの３枚が無ければfalseを返す(): void
    {
        $onePairHand = new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Diamonds, Rank::Ace),
            new Card(Suit::Spades, Rank::Three),
            new Card(Suit::Clubs, Rank::Four),
        ]);

        $this->assertFalse($this->specification->isSatisfiedBy($onePairHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札が仕様を満たしているか判定する_手札に同じランクの４枚があればfalseを返す(): void
    {
        $fourCardsHand = new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Diamonds, Rank::Ace),
            new Card(Suit::Spades, Rank::Ace),
            new Card(Suit::Clubs, Rank::Ace),
        ]);

        $this->assertFalse($this->specification->isSatisfiedBy($fourCardsHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札が仕様を満たしているか判定する_手札に同じランクの３枚と同じランクの２枚があればfalseを返す(): void
    {
        $fullHouseHand = new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Diamonds, Rank::Two),
            new Card(Suit::Spades, Rank::Two),
            new Card(Suit::Clubs, Rank::Ace),
        ]);

        $this->assertFalse($this->specification->isSatisfiedBy($fullHouseHand));
    }
}
