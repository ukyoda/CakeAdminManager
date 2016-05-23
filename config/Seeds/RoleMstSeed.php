<?php
use Phinx\Seed\AbstractSeed;

/**
 * RoleMst seed.
 */
class RoleMstSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
          [
            'id' => '0000',
            'name' => 'マスターユーザ'
          ],
          [
            'id' => '0010',
            'name' => '管理ユーザ'
          ],
          [
            'id' => '0020',
            'name' => '一般ユーザ'
          ],
          [
            'id' => '9999',
            'name' => 'ゲストユーザ'
          ]
        ];

        $table = $this->table('role_mst');
        $table->insert($data)->save();
    }
}
