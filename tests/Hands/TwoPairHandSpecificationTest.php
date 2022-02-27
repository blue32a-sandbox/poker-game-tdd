<?php

declare(strict_types=1);

namespace Tests\Hands;

use PHPUnit\Framework\TestCase;
use Poker\Hands\TwoPairHandSpecification;
use Poker\PlayerHand;
use Poker\Trump\Card;
use Poker\Trump\Rank;
use Poker\Trump\Suit;

/**
 * @testdox ポーカーの役「ツーペア」の仕様を示す TwoPairHandSpecification クラスのテスト
 */
class TwoPairHandSpecificationTest extends TestCase
{
    private TwoPairHandSpecification $specification;

    public function setUp(): void
    {
        $this->specification = new TwoPairHandSpecification();
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札が仕様を満たしているか判定する_手札に同じランクのペアが２組あればtrueを返す(): void
    {
        $twoPairHand = new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace), // pair 1
            new Card(Suit::Hearts, Rank::Two), // pair 2
            new Card(Suit::Diamonds, Rank::Three),
            new Card(Suit::Spades, Rank::Two), // pair 2
            new Card(Suit::Clubs, Rank::Ace), // pair 1
        ]);

        $this->assertTrue($this->specification->isSatisfiedBy($twoPairHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札が仕様を満たしているか判定する_手札に同じランクのペアが１組しかなければfalseを返す(): void
    {
        $onePairHand = new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace), // pair
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Diamonds, Rank::Three),
            new Card(Suit::Spades, Rank::Four),
            new Card(Suit::Clubs, Rank::Ace), // pair
        ]);

        $this->assertFalse($this->specification->isSatisfiedBy($onePairHand));
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
