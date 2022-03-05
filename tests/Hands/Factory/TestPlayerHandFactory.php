<?php

declare(strict_types=1);

namespace Tests\Hands\Factory;

use Poker\PlayerHand;
use Poker\Trump\Card;
use Poker\Trump\Rank;
use Poker\Trump\Suit;

class TestPlayerHandFactory
{
    public static function 役がないハンド(): PlayerHand
    {
        return new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Diamonds, Rank::Three), // suit not same
            new Card(Suit::Hearts, Rank::Four),
            new Card(Suit::Hearts, Rank::Queen), // rank not sequential
        ]);
    }

    public static function 同じランクの2枚が無いハンド(): PlayerHand
    {
        return self::役がないハンド();
    }

    public static function 連続していないランクを持つハンド(): PlayerHand
    {
        return self::役がないハンド();
    }

    public static function 異なる絵柄を持つハンド(): PlayerHand
    {
        return self::役がないハンド();
    }

    public static function 同じランクの2枚と別の3つのランクを持つハンド(): PlayerHand
    {
        return new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace), // pair
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Diamonds, Rank::Three),
            new Card(Suit::Spades, Rank::Four),
            new Card(Suit::Clubs, Rank::Ace), // pair
        ]);
    }

    public static function 同じランクの2枚と別の同じランクの2枚、さらに1枚の別のランクを持つハンド(): PlayerHand
    {
        return new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace), // pair 1
            new Card(Suit::Clubs, Rank::Ace), // pair 1
            new Card(Suit::Hearts, Rank::Two), // pair 2
            new Card(Suit::Diamonds, Rank::Three),
            new Card(Suit::Spades, Rank::Two), // pair 2
        ]);
    }

    public static function 同じランクの3枚と別の2つのランクを持つハンド(): PlayerHand
    {
        return new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Diamonds, Rank::Ace),
            new Card(Suit::Spades, Rank::Three),
            new Card(Suit::Clubs, Rank::Ace),
        ]);
    }

    public static function ランクが連続していて異なる絵柄を持つハンド(): PlayerHand
    {
        return new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Diamonds, Rank::Three),
            new Card(Suit::Clubs, Rank::Five),
            new Card(Suit::Spades, Rank::Four),
            new Card(Suit::Hearts, Rank::Two),
        ]);
    }

    public static function 全て同じ絵柄で連続していないランクを持つハンド(): PlayerHand
    {
        return new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Hearts, Rank::Six),
            new Card(Suit::Hearts, Rank::Ten),
            new Card(Suit::Hearts, Rank::Queen),
        ]);
    }

    public static function 同じランクの3枚と別の同じランクの2枚を持つハンド(): PlayerHand
    {
        return new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace), // pair
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Diamonds, Rank::Two),
            new Card(Suit::Spades, Rank::Two),
            new Card(Suit::Clubs, Rank::Ace), // pair
        ]);
    }

    public static function 同じランクのカード4枚と別のランクのカード1枚を持つハンド(): PlayerHand
    {
        return new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Diamonds, Rank::Ace),
            new Card(Suit::Spades, Rank::Ace),
            new Card(Suit::Clubs, Rank::Ace),
        ]);
    }

    public static function ランクが連続していて全て同じ絵柄を持つハンド(): PlayerHand
    {
        return new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Hearts, Rank::Three),
            new Card(Suit::Hearts, Rank::Five),
            new Card(Suit::Hearts, Rank::Four),
            new Card(Suit::Hearts, Rank::Two),
        ]);
    }
}
