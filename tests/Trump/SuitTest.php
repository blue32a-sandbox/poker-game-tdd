<?php

declare(strict_types=1);

namespace Tests\Trump;

use PHPUnit\Framework\TestCase;
use Poker\Trump\Suit;

class SuitTest extends TestCase
{
    /**
     * @test
     */
    public function 絵柄は４種類ある(): void
    {
        $this->assertSame(4, count(Suit::cases()));
    }

    /**
     * @test
     */
    public function 絵柄Heartsは文字列Hを持つ(): void
    {
        $this->assertSame('H', Suit::Hearts->value);
    }

    /**
     * @test
     */
    public function 絵柄Diamondsは文字列Dを持つ(): void
    {
        $this->assertSame('D', Suit::Diamonds->value);
    }

    /**
     * @test
     */
    public function 絵柄Clubsは文字列Cを持つ(): void
    {
        $this->assertSame('C', Suit::Clubs->value);
    }

    /**
     * @test
     */
    public function 絵柄Spadesは文字列Sを持つ(): void
    {
        $this->assertSame('S', Suit::Spades->value);
    }
}
