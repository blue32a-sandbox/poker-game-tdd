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
        $this->assertSame(52, count($gemeDeck->cards()));
    }

    /**
     * @test
     */
    public function factoryメソッドはデッキを生成する_デッキは絵柄とランクの組み合わせの重複がない(): void
    {
        $gemeDeck = GameDeck::factory();
        $cardsA = $gemeDeck->cards();
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
        $gemeDeck = GameDeck::factory();
        $beforCards = $gemeDeck->cards();

        $this->assertSame($beforCards, $gemeDeck->cards(), 'シャッフル前は並び順が変わらない');

        $gemeDeck->shuffle();

        /**
         * シャッフル前と同じになる可能性は想定される。(flaky)
         * このアサーションでは「並び順以外の変更はされないこと」は検出できない。
         */
        $this->assertNotSame($beforCards, $gemeDeck->cards(), '(flaky) シャッフル後は後は並び順が変わる');
    }
}
