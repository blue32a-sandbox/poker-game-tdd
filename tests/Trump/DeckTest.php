<?php

declare(strict_types=1);

namespace Tests\Trump;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Poker\Trump\Card;
use Poker\Trump\Deck;
use Poker\Trump\Rank;
use Poker\Trump\Suit;

class DeckTest extends TestCase
{
    private function factoryDeck(array $cards): Deck
    {
        return new Deck($cards);
    }

    private function factoryCard(Suit $suit, Rank $rank): Card
    {
        return new Card($suit, $rank);
    }

    /**
     * @test
     */
    public function コンストラクタの引数cardsはCardクラスの配列が含まれると例外が発生する(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Deck([
            $this->factoryCard(suit: Suit::Hearts, rank: Rank::Ace),
            'invalid value',
        ]);
    }

    /**
     * @test
     */
    public function cardsメソッドはカードのコレクションを返す_コンストラクタに渡した枚数と同じ、2枚のカードを返す(): void
    {
        $deck = $this->factoryDeck([
            $this->factoryCard(suit: Suit::Hearts, rank: Rank::Ace),
            $this->factoryCard(suit: Suit::Clubs, rank: Rank::Five),
        ]);

        $cards = $deck->cards();

        $this->assertCount(2, $cards);
    }

    /**
     * @test
     */
    public function cardsメソッドはカードのコレクションを返す_コンストラクタに渡したカードと同じ、HeartsのAceとClubsのFiveを返す(): void
    {
        $heartsAceCard = $this->factoryCard(suit: Suit::Hearts, rank: Rank::Ace);
        $clubsFiveCard = $this->factoryCard(suit: Suit::Clubs, rank: Rank::Five);
        $deck = $this->factoryDeck([
            $heartsAceCard,
            $clubsFiveCard,
        ]);

        $cards = $deck->cards();

        $this->assertObjectEquals($heartsAceCard, $cards[0], 'equals', '最初の要素はHeartsのAce');
        $this->assertObjectEquals($clubsFiveCard, $cards[1], 'equals', '２番目の要素はCrubsのFive');
    }

    /**
     * @test
     */
    public function cardsメソッドはカードのコレクションを取得する_取得したコレクションにカードを1枚追加してもDeckのコレクションは2枚のまま(): void
    {
        $deck = $this->factoryDeck([
            $this->factoryCard(suit: Suit::Hearts, rank: Rank::Ace),
            $this->factoryCard(suit: Suit::Clubs, rank: Rank::Five),
        ]);

        $cards = $deck->cards();
        $cards[] = $this->factoryCard(suit: Suit::Diamonds, rank: Rank::Two);

        $this->assertCount(2, $deck->cards());
    }
}
