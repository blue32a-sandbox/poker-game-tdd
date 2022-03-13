<?php

declare(strict_types=1);

namespace Tests\Hands;

use PHPUnit\Framework\TestCase;
use Poker\Hands\FullHouseHandSpecification;
use Tests\Hands\Factory\TestPlayerHandFactory;

/**
 * @testdox ポーカーのハンド「フルハウス」の仕様を示す FullHouseHandSpecification クラスのテスト
 */
class FullHouseHandSpecificationTest extends TestCase
{
    private FullHouseHandSpecification $specification;

    public function setUp(): void
    {
        $this->specification = new FullHouseHandSpecification();
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がフルハウスか判定する_同じランクの3枚と別の同じランクの2枚ならtrueを返す(): void
    {
        $this->assertTrue($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::同じランクの3枚と別の同じランクの2枚を持つハンド()
        ));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がフルハウスか判定する_同じランクの3枚と別の2つのランクならfalseを返す(): void
    {
        $this->assertFalse($this->specification->isSatisfiedBy(
            TestPlayerHandFactory::同じランクの3枚と別の2つのランクを持つハンド()
        ));
    }
}
