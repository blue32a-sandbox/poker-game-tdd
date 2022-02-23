<?php

declare(strict_types=1);

namespace Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Poker\PlayerHand;
use Poker\Trump\Card;
use Poker\Trump\Rank;
use Poker\Trump\Suit;

/**
 * @testdox プレイヤーの手札を示す PlayerHand クラスのテスト
 */
class PlayerHandTest extends TestCase
{
    private function factoryCard(Suit $suit, Rank $rank): Card
    {
        return new Card($suit, $rank);
    }

    private function facotryFiveCards(): array
    {
        return [
            $this->factoryCard(suit: Suit::Hearts, rank: Rank::Ace),
            $this->factoryCard(suit: Suit::Hearts, rank: Rank::Two),
            $this->factoryCard(suit: Suit::Diamonds, rank: Rank::Three),
            $this->factoryCard(suit: Suit::Clubs, rank: Rank::Four),
            $this->factoryCard(suit: Suit::Spades, rank: Rank::Five),
        ];

    }

    /**
     * @test
     */
    public function 手札は5枚のカードで構成される_5枚のカードを渡すとオブジェクトが生成される(): void
    {
        $cards = $this->facotryFiveCards();

        $this->assertInstanceOf(PlayerHand::class, new PlayerHand($cards));
    }

    /**
     * @test
     */
    public function 手札は5枚のカードで構成される_4枚のカードを渡すと例外が発生する(): void
    {
        $cards = $this->facotryFiveCards();

        // -1
        unset($cards[4]);

        $this->expectException(InvalidArgumentException::class);
        new PlayerHand($cards);
    }

    /**
     * @test
     */
    public function 手札は5枚のカードで構成される_コンストラクタに6枚のカードを渡すと例外が発生する(): void
    {
        $cards = $this->facotryFiveCards();

        // +1
        $cards[] = $this->factoryCard(suit: Suit::Spades, rank: Rank::King);

        $this->expectException(InvalidArgumentException::class);
        new PlayerHand($cards);
    }

    /**
     * @test
     */
    public function 手札は5枚のカードで構成される_カード以外を渡すと例外が発生する(): void
    {
        $cards = $this->facotryFiveCards();

        // 最後の要素を不正な値に上書きする
        $cards[4] = 'Ivalid value';

        $this->expectException(InvalidArgumentException::class);
        new PlayerHand($cards);
    }

    /**
     * @test
     */
    public function changeメソッドはカードを1枚入れ替えることができる_2番目のカードをClabsのJackに入れ替える(): void
    {
        $cards = $this->facotryFiveCards();

        // 2番目のカードはClubsのJackではない
        $cards[1] = $this->factoryCard(suit: Suit::Hearts, rank: Rank::Two);
        $playerHand = new PlayerHand($cards);

        $clubsJack = $this->factoryCard(suit: Suit::Clubs, rank: Rank::Jack);
        $playerHand->change(2, $clubsJack);

        $this->assertObjectEquals($clubsJack, $playerHand->toArray()[1]);
    }

    /**
     * @test
     */
    public function changeメソッドはカードを1枚入れ替えることができる_交換対象は1から5までの数値を指定できる_0を渡すと例外が発生する(): void
    {
        $cards = $this->facotryFiveCards();
        $playerHand = new PlayerHand($cards);

        $clubsJack = $this->factoryCard(suit: Suit::Clubs, rank: Rank::Jack);

        $this->expectException(InvalidArgumentException::class);
        $playerHand->change(0, $clubsJack);
    }

    /**
     * @test
     */
    public function changeメソッドはカードを1枚入れ替えることができる_交換対象は1から5までの数値を指定できる_6を渡すと例外が発生する(): void
    {
        $cards = $this->facotryFiveCards();
        $playerHand = new PlayerHand($cards);

        $clubsJack = $this->factoryCard(suit: Suit::Clubs, rank: Rank::Jack);

        $this->expectException(InvalidArgumentException::class);
        $playerHand->change(6, $clubsJack);
    }

    /**
     * @test
     */
    public function オブジェクトは手札のカードを示す文字列に変換できる(): void
    {
        $cards = $this->facotryFiveCards();
        $playerHand = new PlayerHand($cards);

        $this->assertSame(
            '[1] H_A [2] H_2 [3] D_3 [4] C_4 [5] S_5',
            strval($playerHand),
        );
    }
}
