# AdminManager plugin for CakePHP

## 概要

このプラグインはCakePHP3にシステム管理画面を提供します。
管理画面はAdminLTEで実装しており、システム管理の幾つかの機能を
提供します。

## サポートしている機能

* ユーザ管理
* ロール管理

## テーブル一覧

* usersテーブル
  * ユーザ情報を管理するテーブル
* role_mst
  * 権限管理テーブル

## インストール

下記のコマンドを実行してください

```
composer require ukyoda/admin-manager:dev-master
```

**プラグインのロード**

config/bootstrap.phpに下記を追記

```php
Plugin::load('AdminManager', ['routes' => true]);
```

**DB更新**

```bash
$ bin/cake migrations migrate -p AdminManager
$ bin/cake migrations seed -p AdminManager
```

## クイックスタート

### 新規ユーザ登録 ###

CakePHPをデバッグモードで起動している状態で、下記URLにアクセスすると認証なしでユーザ登録画面にアクセスできる.

//your-server/cake-root/admin-manager/users/create

> 非デバッグモードの場合は、管理画面ログイン後に作成可能になります。

### 管理画面にアクセス ###

下記パスで管理画面にログインできます。

//your-server/cake-root/admin-manager

### AdminManager.AuthComponentの使用 ###

本プラグイン付属のAuthコンポーネントを使用することで、
簡単にログイン画面とログイン処理を実装できます。

```php
// AppControllerを拡張

use AdminManager\Controller\AppController as BaseController;

class AppController extends BaseController {
    ...
}

```

```php
// 認証処理セットアップ
public function initialize() {
    parent::initialize();
    $this->authSetup([
        'loginRedirect' => [  // ログイン後に表示するページ
            'controller' => 'pages',
            'action' => 'display'
        ],
        'logoutRedirect' => [   // ログアウト後に表示するページ
            'controller' => 'pages',
            'action' => 'login'
        ],
        'loginAction' => [
            'controller' => 'pages',
            'action' => 'login'
        ],
    ]);
}
```

```php
// ログインアクション
public function login() {
    if(!$this->Auth->loginAction()) {
        $this->Flash->error('ログインできませんでした');
    }
}

```

```php
// ログアウトアクション
public function logout() {
    $this->Auth->logoutAction();
}
```

## 注意事項

* 本プラグインはまだ開発途中のものです。今後、予告なしに削除・修正することがありますのでご注意ください
* 本プラグインはMITライセンスに基づく範囲でソースコードの修正・変更ができるものとします
* 本プラグインで生じた障害や問題について、当方一切責任を追わないこととします
