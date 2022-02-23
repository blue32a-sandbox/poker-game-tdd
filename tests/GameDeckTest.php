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
        $this->assertSame(52, count($gemeDeck->toArray()));
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
     * @test
     */
    public function 任意のデッキを生成することはできない(): void
    {
        $this->expectErrorMessageMatches('/Call to private Poker\\\\GameDeck::__construct()/');
        new GameDeck([]);
    }

    /**
     * @group flaky
     * @test
     */
    public function shuffleメソッドはカードをシャッフルする_シャッフルの前後で並び順が異なる(): void
    {
        $beforeShuffle = GameDeck::factory();

        $afterShuffle = $beforeShuffle->shuffle();

        /**
         * シャッフル前と同じになる可能性は想定される。(flaky)
         * このアサーションでは「並び順以外の変更はされないこと」は検出できない。
         */
        $this->assertNotSame(
            $beforeShuffle->toArray(),
            $afterShuffle->toArray(),
            '(flaky) シャッフル後は後は並び順が変わる'
        );
    }

    /**
     * @test
     */
    public function shuffleメソッドはカードをシャッフルする_元のオブジェクトは変更されない(): void
    {
        $beforeShuffle = GameDeck::factory();
        $beforeShuffleCards = $beforeShuffle->toArray();

        $beforeShuffle->shuffle();

        $this->assertSame($beforeShuffleCards, $beforeShuffle->toArray());
    }
}
