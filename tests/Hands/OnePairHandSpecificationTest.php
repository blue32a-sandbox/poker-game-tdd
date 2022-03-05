<?php

declare(strict_types=1);

namespace Tests\Hands;

use PHPUnit\Framework\TestCase;
use Poker\Hands\OnePairHandSpecification;
use Tests\Hands\Factory\TestPlayerHandFactory;

/**
 * @testdox ポーカーのハンド「ワンペア」の仕様を示す OnePairHandSpecification クラスのテスト
 */
class OnePairHandSpecificationTest extends TestCase
{
    private OnePairHandSpecification $specification;

    public function setUp(): void
    {
        $this->specification = new OnePairHandSpecification();
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がワンペアか判定する_同じランクの2枚と別の3つのランクならtrueを返す(): void
    {
        $this->assertTrue($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::同じランクの2枚と別の3つのランクを持つハンド()
        ));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がワンペアか判定する_同じランクの2枚が1組もなければfalseを返す(): void
    {
        $this->assertFalse($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::同じランクの2枚が無いハンド()
        ));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がワンペアか判定する_同じランクの3枚と別の2つのランクならfalseを返す(): void
    {
        $this->assertFalse($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::同じランクの3枚と別の2つのランクを持つハンド()
        ));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がワンペアか判定する_同じランクの2枚が2組あればfalseを返す(): void
    {
        $this->assertFalse($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::同じランクの2枚と別の同じランクの2枚、さらに1枚の別のランクを持つハンド()
        ));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がワンペアか判定する_同じランクの2枚と別の同じランクの3枚であればfalseを返す(): void
    {
        $this->assertFalse($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::同じランクの3枚と別の同じランクの2枚を持つハンド()
        ));
    }
}
