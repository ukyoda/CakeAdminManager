<?php
namespace AdminManager\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GroupsFixture
 *
 */
class GroupsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'GroupID', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => 'グループ名称', 'precision' => null, 'fixed' => null],
        'role_mst_id' => ['type' => 'string', 'length' => 4, 'null' => false, 'default' => '0020', 'comment' => '権限情報', 'precision' => null, 'fixed' => null],
        'create_time' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '登録日時', 'precision' => null],
        'update_time' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => '0000-00-00 00:00:00', 'comment' => '更新日時', 'precision' => null],
        '_indexes' => [
            'idx_role_id' => ['type' => 'index', 'columns' => ['role_mst_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fkey_role_mst_id_for_grp' => ['type' => 'foreign', 'columns' => ['role_mst_id'], 'references' => ['role_mst', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'role_mst_id' => 'Lo',
            'create_time' => 1464019075,
            'update_time' => 1464019075
        ],
    ];
}
