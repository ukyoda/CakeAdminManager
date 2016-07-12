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
composer require ukyoda/AdminManager
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

**新規ユーザの登録**

CakePHPがデバッグモードで起動している場合は、下記URLにアクセスすると認証なしでユーザ登録画面にアクセスできます.

//your-server/cake-root/admin-manager/users/create

> 非デバッグモードの場合は、管理画面ログイン後に作成可能になります。

**管理画面にアクセス**

下記パスでログインできます

//your-server/cake-root/admin-manager



