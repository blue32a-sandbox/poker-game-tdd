<?php

declare(strict_types=1);

namespace Tests\Hands;

use PHPUnit\Framework\TestCase;
use Poker\Hands\ThreeCardsHandSpecification;
use Tests\Hands\Factory\TestPlayerHandFactory;

/**
 * @testdox ポーカーのハンド「スリーカード」の仕様を示す ThreeCardsHandSpecification クラスのテスト
 */
class ThreeCardsHandSpecificationTest extends TestCase
{
    private ThreeCardsHandSpecification $specification;

    public function setUp(): void
    {
        $this->specification = new ThreeCardsHandSpecification();
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がスリーカードか判定する_同じランクの３枚と異なるランクの２枚があればtrueを返す(): void
    {
        $threeCardsHand = TestPlayerHandFactory::createThreeCardsHand();

        $this->assertTrue($this->specification->isSatisfiedBy($threeCardsHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がスリーカードか判定する_同じランクの３枚が無ければfalseを返す(): void
    {
        $onePairHand = TestPlayerHandFactory::createOnePairHand();

        $this->assertFalse($this->specification->isSatisfiedBy($onePairHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がスリーカードか判定する_同じランクの４枚があればfalseを返す(): void
    {
        $fourCardsHand = TestPlayerHandFactory::createFourCardsHand();

        $this->assertFalse($this->specification->isSatisfiedBy($fourCardsHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がスリーカードか判定する_同じランクの３枚と別の同じランクの２枚があればfalseを返す(): void
    {
        $fullHouseHand = TestPlayerHandFactory::createFullHouseHand();

        $this->assertFalse($this->specification->isSatisfiedBy($fullHouseHand));
    }
}
