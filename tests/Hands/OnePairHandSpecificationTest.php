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
    public function isSatisfiedByメソッドは手札がワンペアか判定する_同じランクのペアが１組と異なるランクの３枚ならtrueを返す(): void
    {
        $onePairHand = TestPlayerHandFactory::createOnePairHand();

        $this->assertTrue($this->specification->isSatisfiedBy($onePairHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がワンペアか判定する_同じランクのペアが１組もなければfalseを返す(): void
    {
        $noPairHand = TestPlayerHandFactory::createNoPairHand();

        $this->assertFalse($this->specification->isSatisfiedBy($noPairHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がワンペアか判定する_同じランクの３枚と異なるランクの２枚ならfalseを返す(): void
    {
        $threeCardsHand = TestPlayerHandFactory::createThreeCardsHand();

        $this->assertFalse($this->specification->isSatisfiedBy($threeCardsHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がワンペアか判定する_同じランクのペアが２組あればfalseを返す(): void
    {
        $twoPairHand = TestPlayerHandFactory::createTwoPairHand();

        $this->assertFalse($this->specification->isSatisfiedBy($twoPairHand));
    }

    /**
     * @test
     */
    public function isSatisfiedByメソッドは手札がワンペアか判定する_同じランクのペアと別の同じランクの３枚であればfalseを返す(): void
    {
        $fullHouseHand = TestPlayerHandFactory::createFullHouseHand();

        $this->assertFalse($this->specification->isSatisfiedBy($fullHouseHand));
    }
}
