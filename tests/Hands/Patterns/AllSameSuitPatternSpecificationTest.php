<?php

declare(strict_types=1);

namespace Tests\Hands\Patterns;

use PHPUnit\Framework\TestCase;
use Poker\Hands\Patterns\AllSameSuitPatternSpecification;
use Tests\Hands\Factory\TestPlayerHandFactory;

/**
 * @testdox 手札のパターン「全て同じ絵柄」の仕様を示す AllSameSuitPatternSpecification クラスのテスト
 */
class AllSameSuitPatternSpecificationTest extends TestCase
{
    private AllSameSuitPatternSpecification $specification;

    public function setUp(): void
    {
        $this->specification = new AllSameSuitPatternSpecification();
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札が全て同じ絵柄か判定する_全て同じ絵柄を持つならtrueを返す(): void
    {
        $this->assertTrue($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::全て同じ絵柄で連続していないランクを持つハンド()
        ));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札が全て同じ絵柄か判定する_異なる絵柄を持つならfalseを返す(): void
    {
        $this->assertFalse($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::異なる絵柄を持つハンド()
        ));
    }
}
