# ポーカー ゲーム（poker）

ポーカーゲームをTDDで開発する。

## ルール

1人でプレイする。

トランプ（trump）を1デッキ（deck）使う。

### 1ゲームの流れ

1. 新しいデッキが作られる（並び順はランダム）
2. デッキから5枚のカードが配られる
3. 配られた5枚のカードから、手札に残すカードを選択する
4. 残したカードと合わせて手札が5枚になるようにデッキからカードが配られる
5. 手札にある5枚のカードでハンド判定を行う
6. 判定で該当したハンドが表示される

### デッキの構成

- 4つの絵柄（suit）と13のランク（rank）を組み合わせた52枚のカード
- 絵柄：Hearts、Diamonds、Clubs、Spades
- ランク：A, 2, 3, 4, 5, 6, 7, 8, 9, 10, J, Q, K
- ワイルドカード（ジョーカー）は使用しない

### ハンド（hands）

#### 一覧

- ストレート・フラッシュ（Straight flush）
- フォーカード（Four cards）
- フルハウス（Full house）
- フラッシュ（Flush）
- ストレート（Straight）
- スリーカード（Three cards）
- ツーペア（Two pair）
- ワンペア（One pair）
- ノーペア（No pair）

## クラス図

![](https://github.com/blue32a-sandbox/poker-game-tdd/blob/main/docs/class-diagram.png?raw=true)
