# AdminManager plugin for CakePHP

**注意!!まだ作成中**

## 概要

このプラグインはCakePHP3にシステム管理画面を提供します。
管理画面はAdminLTEで実装しており、システム管理の幾つかの機能を
提供します。

## サポートしている機能

* ユーザ管理
* グループ管理
* ロール管理

## テーブル一覧

* usersテーブル
  * ユーザ情報を管理するテーブル
* role_mst
  * 権限管理テーブル
* groupsテーブル
  * グループ管理テーブル

## インストール

**リポジトリ追加**

composer.jsonに下記を追記してください

```
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/ukyoda/cakephp-admin-manager.git"
    }
],
```

**プラグインインストール**

```
composer require ukyoda/admin-manager:dev-master
```

**プラグインのロード**

config/bootstrap.phpに下記を追記

```
Plugin::load('AdminManager', ['routes' => true]);
```

**DB更新**

```
$ bin/cake migrations migrate -p AdminManager
```
