<?php

declare(strict_types=1);

require_once './vendor/autoload.php';

use Poker\GameDeck;
use Poker\Hands\PlayerHandEvaluation;
use Poker\PlayerHand;

$gameDeck = GameDeck::factory();
$cards = [];

while (count($cards) < 5) {
    $cards[] = $gameDeck->draw();
}

$playerHand = new PlayerHand($cards);

echo 'あなたの手札: ' . $playerHand;
echo "\n";
echo "変更する手札に対応する数字をカンマ区切りで入力する\n";
echo "入力例）1番目と3番目の手札を変更する場合: 1,3\n";
echo "入力待機中... :";

$input = trim(fgets(STDIN));
$vars = explode(',', $input);

/** @var int[] $nums */
$nums = array_map(fn(string $var): int => intval($var), $vars);

foreach ($nums as $num) {
    $card = $gameDeck->draw();
    $playerHand = $playerHand->change($num, $card);
}

echo 'あなたの手札: ' . $playerHand;
echo "\n";

$playerHandEvaluation = new PlayerHandEvaluation();
$hand = $playerHandEvaluation->evaluate($playerHand);

echo '役は「' . $hand->name . '」です。';
echo "\n";

exit("ゲーム終了\n");
