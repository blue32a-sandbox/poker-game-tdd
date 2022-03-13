<?php

declare(strict_types=1);

namespace Tests\Hands;

use PHPUnit\Framework\TestCase;
use Poker\Hands\StraightFlushHandSpecification;
use Tests\Hands\Factory\TestPlayerHandFactory;

/**
 * @testdox ポーカーのハンド「ストレートフラッシュ」の仕様を示す StraightFlushHandSpecification クラスのテスト
 */
class StraightFlushHandSpecificationTest extends TestCase
{
    private StraightFlushHandSpecification $specification;

    public function setUp(): void
    {
        $this->specification = new StraightFlushHandSpecification();
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がストレートフラッシュか判定する_ランクが連続していて全て同じ絵柄ならtrueを返す(): void
    {
        $this->assertTrue($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::ランクが連続していて全て同じ絵柄を持つハンド()
        ));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がストレートフラッシュか判定する_ランクが連続していて異なる絵柄ならfalseを返す(): void
    {
        $this->assertFalse($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::ランクが連続していて異なる絵柄を持つハンド()
        ));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がストレートフラッシュか判定する_全て同じ絵柄で連続していないランクならfalseを返す(): void
    {
        $this->assertFalse($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::全て同じ絵柄で連続していないランクを持つハンド()
        ));
    }
}
