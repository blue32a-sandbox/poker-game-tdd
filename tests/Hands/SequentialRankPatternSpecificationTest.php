<?php

declare(strict_types=1);

namespace Tests\Hands;

use PHPUnit\Framework\TestCase;
use Poker\Hands\SequentialRankPatternSpecification;
use Tests\Hands\Factory\TestPlayerHandFactory;

/**
 * @testdox 手札のパターン「連続したランク」の仕様を示す SequentialRankPatternSpecification クラスのテスト
 */
class SequentialRankPatternSpecificationTest extends TestCase
{
    private SequentialRankPatternSpecification $specification;

    public function setUp(): void
    {
        $this->specification = new SequentialRankPatternSpecification();
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札が連続したランクか判定する_連続したランクを持つならtrueを返す(): void
    {
        $this->assertTrue($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::ランクが連続していて異なる絵柄を持つハンド()
        ));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札が連続したランクか判定する_連続していないランクを持つならfalseを返す(): void
    {
        $this->assertFalse($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::連続していないランクを持つハンド()
        ));
    }
}
