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
    public function isSatisfiedByメソッドは手札がスリーカードか判定する_同じランクの3枚と別の2つのランクならtrueを返す(): void
    {
        $this->assertTrue($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::同じランクの3枚と別の2つのランクを持つハンド()
        ));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がスリーカードか判定する_同じランクの3枚が無ければfalseを返す(): void
    {
        $this->assertFalse($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::同じランクの2枚と別の3つのランクを持つハンド()
        ));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がスリーカードか判定する_同じランクのカード4枚ならfalseを返す(): void
    {
        $this->assertFalse($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::同じランクのカード4枚と別のランクのカード1枚を持つハンド()
        ));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がスリーカードか判定する_同じランクの3枚と別の同じランクの2枚ならfalseを返す(): void
    {
        $this->assertFalse($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::同じランクの3枚と別の同じランクの2枚を持つハンド()
        ));
    }
}
