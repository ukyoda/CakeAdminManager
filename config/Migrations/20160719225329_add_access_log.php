<?php
use Migrations\AbstractMigration;

class AddAccessLog extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change() {
        $table = $this->table('access_logs', ['id' => false, 'primary_key' => ['id']]);
        $table
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'comment' => '主キー、連番',
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('endpoint', 'text', [
                'comment' => 'CakePHPページエンドポイントパス',
                'default' => null,
                'null' => false,
            ])
            ->addColumn('param', 'text', [
                'comment' => 'リクエストパラメータ',
                'default' => null,
                'null' => false,
            ])
            ->addColumn('type', 'string', [
                'comment' => 'アクセス日時',
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('user_id', 'biginteger', [
                'comment' => 'アクセスしたユーザ(未ログイン時はnull)',
                'default' => null,
                'null' => true,
            ])
            ->addColumn('create_time', 'timestamp', [
                'comment' => 'アクセス日時',
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'create_time',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();
    }
}
