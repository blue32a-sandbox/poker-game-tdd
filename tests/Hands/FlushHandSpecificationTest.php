<?php

declare(strict_types=1);

namespace Tests\Hands;

use PHPUnit\Framework\TestCase;
use Poker\Hands\FlushHandSpecification;
use Poker\PlayerHand;
use Poker\Trump\Card;
use Poker\Trump\Rank;
use Poker\Trump\Suit;

/**
 * @testdox ポーカーのハンド「フラッシュ」の仕様を示す FlushHandSpecification クラスのテスト
 */
class FlushHandSpecificationTest extends TestCase
{
    private FlushHandSpecification $specification;

    public function setUp(): void
    {
        $this->specification = new FlushHandSpecification();
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がフラッシュか判定する_同じ絵柄でランクが連続していなければtrueを返す(): void
    {
        $allSameSuiteAndNotSequentialRankHand = new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Hearts, Rank::Six),
            new Card(Suit::Hearts, Rank::Ten),
            new Card(Suit::Hearts, Rank::Queen),
        ]);

        $this->assertTrue($this->specification->isSatisfiedBy($allSameSuiteAndNotSequentialRankHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がフラッシュか判定する_絵柄が異なればfalseを返す(): void
    {
        $notAllSameSuite = new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Hearts, Rank::Six),
            new Card(Suit::Hearts, Rank::Ten),
            new Card(Suit::Spades, Rank::Queen),
        ]);

        $this->assertFalse($this->specification->isSatisfiedBy($notAllSameSuite));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がフラッシュか判定する_同じ絵柄でもランクが連続していればfalseを返す(): void
    {
        $allSameSuiteAndSequentialRankHand = new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Hearts, Rank::Three),
            new Card(Suit::Hearts, Rank::Five),
            new Card(Suit::Hearts, Rank::Four),
            new Card(Suit::Hearts, Rank::Two),
        ]);

        $this->assertFalse($this->specification->isSatisfiedBy($allSameSuiteAndSequentialRankHand));
    }
}
