<?php

declare(strict_types=1);

namespace Tests\Hands;

use PHPUnit\Framework\TestCase;
use Poker\Hands\Hand;
use Poker\Hands\PlayerHandEvaluation;
use Tests\Hands\Factory\TestPlayerHandFactory;

/**
 * @testdox プレイヤーハンドを評価する PlayerHandEvaluation クラスのテスト
 */
class PlayerHandEvaluationTest extends TestCase
{
    private PlayerHandEvaluation $playerHandEvaluation;

    public function setUp(): void
    {
        $this->playerHandEvaluation = new PlayerHandEvaluation;
    }

    /**
     * @test
     */
    public function evaluateメソッドはプレイヤーハンドの役を返す_ランクが連続していて全て同じ絵柄を持つハンドならストレートフラッシュを返す(): void
    {
        $straightFlushHand = TestPlayerHandFactory::ランクが連続していて全て同じ絵柄を持つハンド();

        $this->assertEquals(
            Hand::StraightFlush,
            $this->playerHandEvaluation->evaluate($straightFlushHand)
        );
    }

    /**
     * @test
     */
    public function evaluateメソッドはプレイヤーハンドの役を返す_同じランクのカード4枚と別のランクのカード1枚を持つハンドならフォーカードを返す(): void
    {
        $fourCardsHand = TestPlayerHandFactory::同じランクのカード4枚と別のランクのカード1枚を持つハンド();

        $this->assertEquals(
            Hand::FourCards,
            $this->playerHandEvaluation->evaluate($fourCardsHand)
        );
    }

    /**
     * @test
     */
    public function evaluateメソッドはプレイヤーハンドの役を返す_同じランクの3枚と別の同じランクの2枚を持つハンドならフルハウスを返す(): void
    {
        $fullHouseHand = TestPlayerHandFactory::同じランクの3枚と別の同じランクの2枚を持つハンド();

        $this->assertEquals(
            Hand::FullHouse,
            $this->playerHandEvaluation->evaluate($fullHouseHand)
        );
    }

    /**
     * @test
     */
    public function evaluateメソッドはプレイヤーハンドの役を返す_全て同じ絵柄で連続していないランクを持つハンドならフラッシュを返す(): void
    {
        $flushHand = TestPlayerHandFactory::全て同じ絵柄で連続していないランクを持つハンド();

        $this->assertEquals(
            Hand::Flush,
            $this->playerHandEvaluation->evaluate($flushHand)
        );
    }

    /**
     * @test
     */
    public function evaluateメソッドはプレイヤーハンドの役を返す_ランクが連続していて異なる絵柄を持つハンドならストレートを返す(): void
    {
        $straightHand = TestPlayerHandFactory::ランクが連続していて異なる絵柄を持つハンド();

        $this->assertEquals(
            Hand::Straight,
            $this->playerHandEvaluation->evaluate($straightHand)
        );
    }

    /**
     * @test
     */
    public function evaluateメソッドはプレイヤーハンドの役を返す_同じランクの3枚と別の2つのランクを持つハンドならスリーカードを返す(): void
    {
        $threeCardsHand = TestPlayerHandFactory::同じランクの3枚と別の2つのランクを持つハンド();

        $this->assertEquals(
            Hand::ThreeCards,
            $this->playerHandEvaluation->evaluate($threeCardsHand)
        );
    }

    /**
     * @test
     */
    public function evaluateメソッドはプレイヤーハンドの役を返す_同じランクの2枚と別の同じランクの2枚、さらに1枚の別のランクを持つハンドならツーペアを返す(): void
    {
        $twoPairHand = TestPlayerHandFactory::同じランクの2枚と別の同じランクの2枚、さらに1枚の別のランクを持つハンド();

        $this->assertEquals(
            Hand::TwoPair,
            $this->playerHandEvaluation->evaluate($twoPairHand)
        );
    }

    /**
     * @test
     */
    public function evaluateメソッドはプレイヤーハンドの役を返す_同じランクの2枚と別の3つのランクを持つハンドならワンペアを返す(): void
    {
        $onePairHand = TestPlayerHandFactory::同じランクの2枚と別の3つのランクを持つハンド();

        $this->assertEquals(
            Hand::OnePair,
            $this->playerHandEvaluation->evaluate($onePairHand)
        );
    }

    /**
     * @test
     */
    public function evaluateメソッドはプレイヤーハンドの役を返す_役がないハンドならノーペアを返す(): void
    {
        $noPairHand = TestPlayerHandFactory::役がないハンド();

        $this->assertEquals(
            Hand::NoPair,
            $this->playerHandEvaluation->evaluate($noPairHand)
        );
    }
}
