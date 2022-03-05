<?php

declare(strict_types=1);

namespace Tests;

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
        $gemeDeck = GameDeck::factory();
        $this->assertSame(52, count($gemeDeck));
    }

    /**
     * @test
     */
    public function factoryメソッドはデッキを生成する_デッキは絵柄とランクの組み合わせの重複がない(): void
    {
        $gemeDeck = GameDeck::factory();
        $cardsA = $gemeDeck->toArray();
        $cardsB = array_unique($cardsA, SORT_STRING);

        $this->assertSame(count($cardsA), count($cardsB));
    }

    /**
     * @group flaky
     * @test
     */
    public function factoryメソッドはデッキを生成する_カードの並び順はランダムになる(): void
    {
        $gemeDeckA = GameDeck::factory();
        $gemeDeckB = GameDeck::factory();

        // ランダムなので同じになる可能性はある (flaky)
        $this->assertNotSame(
            array_map('strval', $gemeDeckA->toArray()),
            array_map('strval', $gemeDeckB->toArray())
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
}
