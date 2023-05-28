# READ ME

## フォルダ構成
[参考サイト](https://n314.hatenablog.com/entry/2020/07/16/194927)

### やること
- [ ] DB接続確認
- [ ] ログイン機能をまず完成させる
- [ ] MVCモデルはっきりさせたい

### 質問したいこと
1. バインドバリュー
    
    :name 形式のパラメータ名と疑問符プレースホルダの使い分けが正直分からない
    
    ```php
    <?php
    /* バインドされた PHP 変数によってプリペアドステートメントを実行する */
    $calories = 150;
    $colour = 'red';
    $sth = $dbh->prepare('SELECT name, colour, calories
        FROM fruit
        WHERE calories < :calories AND colour = :colour');
    $sth->bindValue('calories', $calories, PDO::PARAM_INT);
    /* 名前の前にも、コロン ":" を付けることができます(オプション) */
    $sth->bindValue(':colour', $colour, PDO::PARAM_STR);
    $sth->execute();
    ?>
    ```
    
    ```php
    <?php
    /* バインドされた PHP 変数によってプリペアドステートメントを実行する */
    $calories = 150;
    $colour = 'red';
    $sth = $dbh->prepare('SELECT name, colour, calories
        FROM fruit
        WHERE calories < ? AND colour = ?');
    $sth->bindValue(1, $calories, PDO::PARAM_INT);
    $sth->bindValue(2, $colour, PDO::PARAM_STR);
    $sth->execute();
    ?>
    ```
2. 生PHPでMVCモデルをかいているいい資料がみつからない
