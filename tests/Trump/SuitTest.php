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
    public function 絵柄Heartsは文字列ハートを持つ(): void
    {
        $this->assertSame('ハート', Suit::Hearts->value);
    }

    /**
     * @test
     */
    public function 絵柄Diamondsは文字列ダイヤモンドを持つ(): void
    {
        $this->assertSame('ダイヤモンド', Suit::Diamonds->value);
    }

    /**
     * @test
     */
    public function 絵柄Clubsは文字列クラブを持つ(): void
    {
        $this->assertSame('クラブ', Suit::Clubs->value);
    }

    /**
     * @test
     */
    public function 絵柄Spadesは文字列スペードを持つ(): void
    {
        $this->assertSame('スペード', Suit::Spades->value);
    }
}
