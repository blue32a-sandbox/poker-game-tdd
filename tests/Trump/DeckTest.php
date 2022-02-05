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
    /**
     * @test
     */
    public function コンストラクタの引数cardsはCardクラスの配列が含まれると例外が発生する(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Deck([
            new Card(Suit::Hearts, Rank::Ace),
            'invalid valud',
        ]);
    }

    /**
     * @test
     */
    public function cardsメソッドはカードのコレクションを取得する_コンストラクタに渡した枚数と同じ、2枚のカードを返す(): void
    {
        $deck = new Deck([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Clubs, Rank::Five),
        ]);

        $cards = $deck->cards();
        $this->assertSame(2, count($cards));
    }

    /**
     * @test
     */
    public function cardsメソッドはカードのコレクションを取得する_コンストラクタに渡したカードと同じ、HeartsのAceとClubsの5を返す(): void
    {
        $deck = new Deck([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Clubs, Rank::Five),
        ]);

        $cards = $deck->cards();
        $this->assertTrue((new Card(Suit::Hearts, Rank::Ace))->equals($cards[0]));
        $this->assertTrue((new Card(Suit::Clubs, Rank::Five))->equals($cards[1]));
    }

    /**
     * @test
     */
    public function cardsメソッドはカードのコレクションを取得する_取得したコレクションにカードを1枚追加してもDeckのコレクションは2枚のまま(): void
    {
        $deck = new Deck([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Clubs, Rank::Five),
        ]);

        $cards = $deck->cards();
        $cards[] = new Card(Suit::Diamonds, Rank::Two);

        $this->assertSame(2, count($deck->cards()));
    }
}
