<?php
use Migrations\AbstractMigration;

class CreateTables extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('role_mst', ['id' => false, 'primary_key' => ['id']]);
        $table
          ->addColumn('id', 'string', [
              'comment' => 'ロールID',
              'default' => null,
              'limit' => 4,
              'null' => false,
          ])
          ->addColumn('name', 'string', [
              'comment' => 'ロール名称',
              'default' => null,
              'limit' => 255,
              'null' => false,
          ])
          ->create();


        $table = $this->table('users', ['id' => false, 'primary_key' => ['id']]);
        $table
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'comment' => 'ユーザ固有のID連番',
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('screen_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('mail_address', 'string', [
                'comment' => 'ユーザのメールアドレス',
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'comment' => 'パスワード(暗号化、デフォルトはランダム文字列)',
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'comment' => 'ユーザの名前',
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('role_mst_id', 'string', [
                'default' => 20,
                'limit' => 4,
                'null' => false,
            ])
            ->addColumn('status', 'boolean', [
                'comment' => '0：使用不可、1：使用可',
                'default' => 1,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('create_time', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('update_time', 'timestamp', [
                'default' => '0000-00-00 00:00:00',
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'mail_address',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'screen_name',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'role_mst_id',
                ]
            )
            ->create();

        $this->table('users')
            ->addForeignKey(
                'role_mst_id',
                'role_mst',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

    }

    public function down()
    {
        $this->table('groups')
            ->dropForeignKey(
                'role_mst_id'
            );

        $this->table('users')
            ->dropForeignKey(
                'role_mst_id'
            );

        $this->dropTable('groups');
        $this->dropTable('role_mst');
        $this->dropTable('users');
    }
}
