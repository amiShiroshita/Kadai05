# 社員管理システム

## 作成ロードマップ
1. `index.php` でルーティングができること
    - hostname/ でアクセスがあったとき、LoginController.php の index() を参照する
    - hostname/hoge でアクセスがあったとき、HogeController.php の index() を参照する
    - hostname/fuga/piyo でアクセスがあったとき、FugaController.php の piyo() を参照する
2. LoginController で View（login.html）を表示できるようにする
3. DB 接続用のクラスを作成する
    - できれば**シングルトン**で作る
4. ログインボタン押下時にユーザ認証を行う
    - メールアドレスとパスワードが一致した場合、menu.html を表示する。
    - メースアドレスとパスワードが一致しなかった場合、login.html を表示する