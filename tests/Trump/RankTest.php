<?php

declare(strict_types=1);

namespace Tests\Trump;

use PHPUnit\Framework\TestCase;
use Poker\Trump\Rank;

class RankTest extends TestCase
{
    /**
     * @test
     */
    public function ランクは１３種類ある(): void
    {
        $this->assertSame(13, count(Rank::cases()));
    }

    public function ranksValueDataProvider(): array
    {
        return [
            'Ace  は文字列 Aを持つ' => [Rank::Ace,   'A'],
            'Two  は文字列 2を持つ' => [Rank::Two,   '2'],
            'Threeは文字列 3を持つ' => [Rank::Three, '3'],
            'Four は文字列 4を持つ' => [Rank::Four,  '4'],
            'Five は文字列 5を持つ' => [Rank::Five,  '5'],
            'Six  は文字列 6を持つ' => [Rank::Six,   '6'],
            'Sevenは文字列 7を持つ' => [Rank::Seven, '7'],
            'Eightは文字列 8を持つ' => [Rank::Eight, '8'],
            'Nine は文字列 9を持つ' => [Rank::Nine,  '9'],
            'Ten  は文字列10を持つ' => [Rank::Ten,  '10'],
            'Jack は文字列 Jを持つ' => [Rank::Jack,  'J'],
            'Queenは文字列 Qを持つ' => [Rank::Queen, 'Q'],
            'King は文字列 Kを持つ' => [Rank::King,  'K'],
        ];
    }

    /**
     * @dataProvider ranksValueDataProvider
     * @test
     */
    public function ランクは対応する文字列を持つ(Rank $rank, string $expected): void
    {
        $this->assertSame($expected, $rank->value);
    }

    public function ranksNumberDataProvider(): array
    {
        return [
            'Ace  は数値 1を返す' => [Rank::Ace,   1],
            'Two  は数値 2を返す' => [Rank::Two,   2],
            'Threeは数値 3を返す' => [Rank::Three, 3],
            'Four は数値 4を返す' => [Rank::Four,  4],
            'Five は数値 5を返す' => [Rank::Five,  5],
            'Six  は数値 6を返す' => [Rank::Six,   6],
            'Sevenは数値 7を返す' => [Rank::Seven, 7],
            'Eightは数値 8を返す' => [Rank::Eight, 8],
            'Nine は数値 9を返す' => [Rank::Nine,  9],
            'Ten  は数値10を返す' => [Rank::Ten,   10],
            'Jack は数値11を返す' => [Rank::Jack,  11],
            'Queenは数値12を返す' => [Rank::Queen, 12],
            'King は数値13を返す' => [Rank::King,  13],
        ];
    }

    /**
     * @dataProvider ranksNumberDataProvider
     * @test
     */
    public function numberメソッドはランクに対応する数値を返す(Rank $rank, int $expected): void
    {
        $this->assertSame($expected, $rank->number());
    }
}
