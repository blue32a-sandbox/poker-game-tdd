<?php

declare(strict_types=1);

namespace Tests\Trump;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Poker\Trump\Card;
use Poker\Trump\CardCollection;
use Poker\Trump\Rank;
use Poker\Trump\Suit;

/**
 * @testdox カードのコレクションを示す CardCollection クラスのテスト
 */
class CardCollectionTest extends TestCase
{
    private function factoryCardCollection(array $values): CardCollection
    {
        return new CardCollection($values);
    }

    private function factoryCard(Suit $suit, Rank $rank): Card
    {
        return new Card($suit, $rank);
    }

    /**
     * @test
     */
    public function コンストラクタの引数valuesはCardクラスのインスタンス以外が含まれていると例外が発生する(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new CardCollection([
            $this->factoryCard(suit: Suit::Hearts, rank: Rank::Ace),
            'invalid value',
        ]);
    }

    /**
     * @test
     */
    public function getメソッドは指定した添字のカードを返す_0を渡すとHeartsのAceを返す(): void
    {
        $cards = $this->factoryCardCollection([
            $this->factoryCard(suit: Suit::Hearts, rank: Rank::Ace),
        ]);

        $this->assertObjectEquals(
            $this->factoryCard(suit: Suit::Hearts, rank: Rank::Ace),
            $cards->get(0)
        );
    }

    /**
     * @test
     */
    public function getメソッドは指定した添字のカードを返す_存在しない添字の1を渡すとnullを返す(): void
    {
        $cards = $this->factoryCardCollection([
            $this->factoryCard(suit: Suit::Hearts, rank: Rank::Ace),
        ]);

        $this->assertNull($cards->get(1));
    }

    /**
     * @test
     */
    public function toArrayメソッドはカードの配列を返す_コンストラクタに渡した枚数と同じ、2枚のカードを返す(): void
    {
        $cards = $this->factoryCardCollection([
            $this->factoryCard(suit: Suit::Hearts, rank: Rank::Ace),
            $this->factoryCard(suit: Suit::Clubs, rank: Rank::Five),
        ]);

        $this->assertCount(2, $cards->toArray());
    }

    /**
     * @test
     */
    public function toArrayメソッドはカードの配列を返す_コンストラクタに渡したカードと同じ、HeartsのAceとClubsのFiveを返す(): void
    {
        $heartsAceCard = $this->factoryCard(suit: Suit::Hearts, rank: Rank::Ace);
        $clubsFiveCard = $this->factoryCard(suit: Suit::Clubs, rank: Rank::Five);
        $cards = $this->factoryCardCollection([
            $heartsAceCard,
            $clubsFiveCard,
        ]);

        $array = $cards->toArray();

        $this->assertObjectEquals($heartsAceCard, $array[0], 'equals', '最初の要素はHeartsのAce');
        $this->assertObjectEquals($clubsFiveCard, $array[1], 'equals', '２番目の要素はCrubsのFive');
    }

    /**
     * @test
     */
    public function toArrayメソッドはカードの配列を返す_取得した配列にカードを1枚追加してもDeckのコレクションは2枚のまま(): void
    {
        $cards = $this->factoryCardCollection([
            $this->factoryCard(suit: Suit::Hearts, rank: Rank::Ace),
            $this->factoryCard(suit: Suit::Clubs, rank: Rank::Five),
        ]);

        $array = $cards->toArray();
        $array[] = $this->factoryCard(suit: Suit::Diamonds, rank: Rank::Two);

        $this->assertCount(2, $cards->toArray());
    }
}
