<?php

declare(strict_types=1);

namespace Tests\Hands;

use PHPUnit\Framework\TestCase;
use Poker\Hands\FlushHandSpecification;
use Tests\Hands\Factory\TestPlayerHandFactory;

/**
 * @testdox ポーカーのハンド「フラッシュ」の仕様を示す FlushHandSpecification クラスのテスト
 */
class FlushHandSpecificationTest extends TestCase
{
    private FlushHandSpecification $specification;

    public function setUp(): void
    {
        $this->specification = new FlushHandSpecification();
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がフラッシュか判定する_全て同じ絵柄でランクが連続していなければtrueを返す(): void
    {
        $this->assertTrue($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::全て同じ絵柄で連続していないランクを持つハンド()
        ));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がフラッシュか判定する_絵柄が異なればfalseを返す(): void
    {
        $this->assertFalse($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::異なる絵柄を持つハンド()
        ));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がフラッシュか判定する_全て同じ絵柄でもランクが連続していればfalseを返す(): void
    {
        $this->assertFalse($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::ランクが連続していて全て同じ絵柄を持つハンド()
        ));
    }
}
