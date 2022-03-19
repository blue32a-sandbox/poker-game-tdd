<?php

declare(strict_types=1);

namespace Poker\Hands;

use Poker\PlayerHand;

class PlayerHandEvaluation
{
    /**
     * @var array{
     *   specification: HandSpecification,
     *   hand: Hand
     * }
     */
    private array $handSpecifications = [];

    public function __construct()
    {
        $this->handSpecifications[] = [
            'specification' => new StraightFlushHandSpecification(),
            'hand' => Hand::StraightFlush,
        ];
        $this->handSpecifications[] = [
            'specification' => new FourCardsHandSpecification(),
            'hand' => Hand::FourCards,
        ];
        $this->handSpecifications[] = [
            'specification' => new FullHouseHandSpecification(),
            'hand' => Hand::FullHouse,
        ];
        $this->handSpecifications[] = [
            'specification' => new FlushHandSpecification(),
            'hand' => Hand::Flush,
        ];
        $this->handSpecifications[] = [
            'specification' => new StraightHandSpecification(),
            'hand' => Hand::Straight,
        ];
        $this->handSpecifications[] = [
            'specification' => new ThreeCardsHandSpecification(),
            'hand' => Hand::ThreeCards,
        ];
        $this->handSpecifications[] = [
            'specification' => new TwoPairHandSpecification(),
            'hand' => Hand::TwoPair,
        ];
        $this->handSpecifications[] = [
            'specification' => new OnePairHandSpecification(),
            'hand' => Hand::OnePair,
        ];
    }

    public function evaluate(PlayerHand $playerHand): Hand
    {
        foreach ($this->handSpecifications as $handSpecification) {
            /** @var HandSpecification $specification */
            $specification = $handSpecification['specification'];

            if ($specification->isSatisfiedBy($playerHand)) {
                return $handSpecification['hand'];
            }
        }

        return Hand::NoPair;
    }
}
