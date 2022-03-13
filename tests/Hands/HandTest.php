<?php

declare(strict_types=1);

namespace Tests\Hands;

use PHPUnit\Framework\TestCase;
use Poker\Hands\Hand;

/**
 * @testdox ポーカーの役を示す Hand 列挙型のテスト
 */
class HandTest extends TestCase
{
    /**
     * @test
     */
    public function 役は9つある(): void
    {
        $this->assertCount(9, Hand::cases());
    }

    public function handsValueDataProvider(): array
    {
        return [
            'StraightFlush は文字列 ストレートフラッシュ を持つ' => [Hand::StraightFlush, 'ストレートフラッシュ'],
            'FourCards は文字列 フォーカード を持つ' => [Hand::FourCards, 'フォーカード'],
            'FullHouse は文字列 フルハウス を持つ' => [Hand::FullHouse, 'フルハウス'],
            'Flush は文字列 フラッシュ を持つ' => [Hand::Flush, 'フラッシュ'],
            'Straight は文字列 ストレート を持つ' => [Hand::Straight, 'ストレート'],
            'ThreeCards は文字列 スリーカード を持つ' => [Hand::ThreeCards, 'スリーカード'],
            'TwoPair は文字列 ツーペア を持つ' => [Hand::TwoPair, 'ツーペア'],
            'OnePair は文字列 ワンペア を持つ' => [Hand::OnePair, 'ワンペア'],
            'NoPair は文字列 ノーペア を持つ' => [Hand::NoPair, 'ノーペア'],
        ];
    }

    /**
     * @dataProvider handsValueDataProvider
     * @test
     */
    public function 役は対応する文字列を持つ(Hand $hand, string $expected): void
    {
        $this->assertSame($expected, $hand->value);
    }
}
