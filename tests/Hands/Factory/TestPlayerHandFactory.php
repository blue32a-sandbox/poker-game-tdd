<?php

declare(strict_types=1);

namespace Tests\Hands\Factory;

use Poker\PlayerHand;
use Poker\Trump\Card;
use Poker\Trump\Rank;
use Poker\Trump\Suit;

class TestPlayerHandFactory
{
    public static function createNoPairHand(): PlayerHand
    {
        return new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Diamonds, Rank::Six),
            new Card(Suit::Spades, Rank::Ten),
            new Card(Suit::Clubs, Rank::Queen),
        ]);
    }

    public static function createOnePairHand(): PlayerHand
    {
        return new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace), // pair
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Diamonds, Rank::Three),
            new Card(Suit::Spades, Rank::Four),
            new Card(Suit::Clubs, Rank::Ace), // pair
        ]);
    }

    public static function createTwoPairHand(): PlayerHand
    {
        return new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace), // pair 1
            new Card(Suit::Clubs, Rank::Ace), // pair 1
            new Card(Suit::Hearts, Rank::Two), // pair 2
            new Card(Suit::Diamonds, Rank::Three),
            new Card(Suit::Spades, Rank::Two), // pair 2
        ]);
    }

    public static function createThreeCardsHand(): PlayerHand
    {
        return new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Diamonds, Rank::Ace),
            new Card(Suit::Spades, Rank::Three),
            new Card(Suit::Clubs, Rank::Ace),
        ]);
    }

    public static function createFullHouseHand(): PlayerHand
    {
        return new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace), // pair
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Diamonds, Rank::Two),
            new Card(Suit::Spades, Rank::Two),
            new Card(Suit::Clubs, Rank::Ace), // pair
        ]);
    }

    public static function createFourCardsHand(): PlayerHand
    {
        return new PlayerHand([
            new Card(Suit::Hearts, Rank::Ace),
            new Card(Suit::Hearts, Rank::Two),
            new Card(Suit::Diamonds, Rank::Ace),
            new Card(Suit::Spades, Rank::Ace),
            new Card(Suit::Clubs, Rank::Ace),
        ]);
    }
}
