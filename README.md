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

CakePHPがデバッグモードで起動している場合は、下記URLにアクセスすると認証なしでユーザ登録画面にアクセスできます.

//your-server/cake-root/admin-manager/users/create

> 非デバッグモードの場合は、管理画面ログイン後に作成可能になります。

### 管理画面にアクセス ###

下記パスで管理画面にログインできます。

//your-server/cake-root/admin-manager


## 注意事項

* 本プラグインはまだ開発途中のものです。今後、予告なしに削除・修正することがありますのでご注意ください
* 本プラグインはMITライセンスに基づく範囲でソースコードの修正・変更ができるものとします
