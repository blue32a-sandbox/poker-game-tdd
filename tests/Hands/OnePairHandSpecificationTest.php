<?php

declare(strict_types=1);

namespace Tests\Hands;

use PHPUnit\Framework\TestCase;
use Poker\Hands\OnePairHandSpecification;
use Poker\PlayerHand;
use Poker\Trump\Card;
use Poker\Trump\Rank;
use Poker\Trump\Suit;

/**
 * @testdox ポーカーの役「ワンペア」の仕様を示す OnePairHandSpecification クラスのテスト
 */
class OnePairHandSpecificationTest extends TestCase
{
    private OnePairHandSpecification $specification;

    public function setUp(): void
    {
        $this->specification = new OnePairHandSpecification();
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札が仕様を満たしているかを判定する_手札に同じランクのペアが１組あればtrueを返す(): void
    {
        $onePairHand = new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace), // pair
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Diamonds, Rank::Three),
            new Card(Suit::Spades, Rank::Four),
            new Card(Suit::Clubs, Rank::Ace), // pair
        ]);

        $this->assertTrue($this->specification->isSatisfiedBy($onePairHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札が仕様を満たしているかを判定する_手札に同じランクのペアが１組もなければfalseを返す(): void
    {
        $noPairHand = new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Diamonds, Rank::Three),
            new Card(Suit::Spades, Rank::Four),
            new Card(Suit::Clubs, Rank::Five),
        ]);

        $this->assertFalse($this->specification->isSatisfiedBy($noPairHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札が仕様を満たしているかを判定する_手札に同じランクの３枚が１組あればfalseを返す(): void
    {
        $ThreeCardsHand = new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Clubs, Rank::Ace),
            new Card(Suit::Spades, Rank::Ace),
            new Card(Suit::Diamonds, Rank::Three),
            new Card(Suit::Hearts, Rank::Four),
        ]);

        $this->assertFalse($this->specification->isSatisfiedBy($ThreeCardsHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札が仕様を満たしているかを判定する_手札に同じランクのペアが２組あればfalseを返す(): void
    {
        $twoPairHand = new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace), // pair 1
            new Card(Suit::Clubs, Rank::Ace), // pair 1
            new Card(Suit::Hearts, Rank::Two), // pair 2
            new Card(Suit::Diamonds, Rank::Three),
            new Card(Suit::Spades, Rank::Two), // pair 2
        ]);

        $this->assertFalse($this->specification->isSatisfiedBy($twoPairHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札が仕様を満たしているかを判定する_手札が同じランクのペアと３枚組であればfalseを返す(): void
    {
        $fullHouseHand = new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace), // pair
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Diamonds, Rank::Two),
            new Card(Suit::Spades, Rank::Two),
            new Card(Suit::Clubs, Rank::Ace), // pair
        ]);

        $this->assertFalse($this->specification->isSatisfiedBy($fullHouseHand));
    }
}
