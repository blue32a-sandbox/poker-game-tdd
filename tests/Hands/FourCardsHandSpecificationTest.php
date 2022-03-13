<?php

declare(strict_types=1);

namespace Tests\Hands;

use PHPUnit\Framework\TestCase;
use Poker\Hands\FourCardsHandSpecification;
use Tests\Hands\Factory\TestPlayerHandFactory;

/**
 * @testdox ポーカーのハンド「フォーカード」の仕様を示す FourCardsHandSpecification クラスのテスト
 */
class FourCardsHandSpecificationTest extends TestCase
{
    private FourCardsHandSpecification $specification;

    public function setUp(): void
    {
        $this->specification = new FourCardsHandSpecification();
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がフォーカードか判定する_同じランクのカード4枚と別のランクのカード1枚ならtrueを返す(): void
    {
        $this->assertTrue($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::同じランクのカード4枚と別のランクのカード1枚を持つハンド()
        ));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がフォーカードか判定する_同じランクの3枚と別の2つのランクならfalseを返す(): void
    {
        $this->assertFalse($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::同じランクの3枚と別の2つのランクを持つハンド()
        ));
    }
}
