<?php

declare(strict_types=1);

namespace Poker\Hands;

enum Hand: string
{
    case StraightFlush = 'ストレートフラッシュ';
    case FourCards     = 'フォーカード';
    case FullHouse     = 'フルハウス';
    case Flush         = 'フラッシュ';
    case Straight      = 'ストレート';
    case ThreeCards    = 'スリーカード';
    case TwoPair       = 'ツーペア';
    case OnePair       = 'ワンペア';
    case NoPair        = 'ノーペア';
}
