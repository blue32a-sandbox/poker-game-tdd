<?php

declare(strict_types=1);

namespace Tests\Hands;

use PHPUnit\Framework\TestCase;
use Poker\Hands\StraightHandSpecification;
use Tests\Hands\Factory\TestPlayerHandFactory;

/**
 * @testdox ポーカーのハンド「ストレート」の仕様を示す StraightHandSpecification クラスのテスト
 */
class StraightHandSpecificationTest extends TestCase
{
    private StraightHandSpecification $specification;

    public function setUp(): void
    {
        $this->specification = new StraightHandSpecification();
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がストレートか判定する_ランクが連続していて異なる絵柄ならtrueを返す(): void
    {
        $this->assertTrue($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::ランクが連続していて異なる絵柄を持つハンド()
        ));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がストレートか判定する_ランクが連続していなければfalseを返す(): void
    {
        $this->assertFalse($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::連続していないランクを持つハンド()
        ));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がストレートか判定する_ランクが連続していても絵柄が全て同じならfalseを返す(): void
    {
        $this->assertFalse($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::ランクが連続していて全て同じ絵柄を持つハンド()
        ));
    }
}
