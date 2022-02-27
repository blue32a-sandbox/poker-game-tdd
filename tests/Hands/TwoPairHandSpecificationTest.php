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
    public function isSatisfiedByメソッドは手札がツーペアか判定する_同じランクのペアが２組あればtrueを返す(): void
    {
        $twoPairHand = TestPlayerHandFactory::createTwoPairHand();

        $this->assertTrue($this->specification->isSatisfiedBy($twoPairHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がツーペアか判定する_同じランクのペアが１組しかなければfalseを返す(): void
    {
        $onePairHand = TestPlayerHandFactory::createOnePairHand();

        $this->assertFalse($this->specification->isSatisfiedBy($onePairHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がツーペアか判定する_同じランクの３枚と同じランクの２枚があればfalseを返す(): void
    {
        $fullHouseHand = TestPlayerHandFactory::createFullHouseHand();

        $this->assertFalse($this->specification->isSatisfiedBy($fullHouseHand));
    }
}
