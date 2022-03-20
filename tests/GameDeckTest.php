<?php

declare(strict_types=1);

namespace Tests;

use LogicException;
use PHPUnit\Framework\TestCase;
use Poker\GameDeck;

/**
 * @testdox ゲームで使用するデッキを示す GameDeck クラスのテスト
 */
class GameDeckTest extends TestCase
{
    /**
     * @test
     */
    public function factoryメソッドはデッキを生成する_デッキは52枚のカードで構成される(): void
    {
        $gameDeck = GameDeck::factory();
        $this->assertSame(52, count($gameDeck));
    }

    /**
     * @test
     */
    public function factoryメソッドはデッキを生成する_デッキは絵柄とランクの組み合わせの重複がない(): void
    {
        $gameDeck = GameDeck::factory();
        $cardsA = $gameDeck->toArray();
        $cardsB = array_unique($cardsA, SORT_STRING);

        $this->assertSame(count($cardsA), count($cardsB));
    }

    /**
     * @group flaky
     * @test
     */
    public function factoryメソッドはデッキを生成する_カードの並び順はランダムになる(): void
    {
        $gameDeckA = GameDeck::factory();
        $gameDeckB = GameDeck::factory();

        // ランダムなので同じになる可能性はある (flaky)
        $this->assertNotSame(
            array_map('strval', $gameDeckA->toArray()),
            array_map('strval', $gameDeckB->toArray())
        );
    }

    /**
     * @test
     */
    public function 任意のデッキを生成することはできない(): void
    {
        $this->expectErrorMessageMatches('/Call to private Poker\\\\GameDeck::__construct()/');
        new GameDeck([]);
    }

    /**
     * @test
     */
    public function drawメソッドはデッキの先頭からカード1枚取り出して返す_先頭にあるカードを返す(): void
    {
        $gameDeck = GameDeck::factory();
        $topCard = $gameDeck->get(0);

        $this->assertObjectEquals($topCard, $gameDeck->draw());
    }

    /**
     * @test
     */
    public function drawメソッドはデッキの先頭からカード1枚取り出して返す_カードが1枚減る(): void
    {
        $gameDeck = GameDeck::factory();
        $beforeCount = count($gameDeck);

        $gameDeck->draw();

        $this->assertCount($beforeCount - 1, $gameDeck);
    }

    /**
     * @test
     */
    public function drawメソッドはデッキの先頭からカード1枚取り出して返す_カードが0枚のときは例外が発生する(): void
    {
        $gameDeck = GameDeck::factory();

        while (count($gameDeck) > 0) {
            $gameDeck->draw();
        }

        $this->expectException(LogicException::class);
        $gameDeck->draw();
    }
}
