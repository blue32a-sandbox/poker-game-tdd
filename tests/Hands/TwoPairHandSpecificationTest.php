<?php

declare(strict_types=1);

namespace Tests\Hands;

use PHPUnit\Framework\TestCase;
use Poker\Hands\TwoPairHandSpecification;
use Tests\Hands\Factory\TestPlayerHandFactory;

/**
 * @testdox ポーカーのハンド「ツーペア」の仕様を示す TwoPairHandSpecification クラスのテスト
 */
class TwoPairHandSpecificationTest extends TestCase
{
    private TwoPairHandSpecification $specification;

    public function setUp(): void
    {
        $this->specification = new TwoPairHandSpecification();
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がツーペアか判定する_同じランクの2枚が2組あればtrueを返す(): void
    {
        $this->assertTrue($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::同じランクの2枚と別の同じランクの2枚、さらに1枚の別のランクを持つハンド()
        ));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がツーペアか判定する_同じランクの2枚が1組しかなければfalseを返す(): void
    {
        $this->assertFalse($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::同じランクの2枚と別の3つのランクを持つハンド()
        ));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がツーペアか判定する_同じランクの3枚と別の同じランクの2枚ならfalseを返す(): void
    {
        $this->assertFalse($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::同じランクの3枚と別の同じランクの2枚を持つハンド()
        ));
    }
}
