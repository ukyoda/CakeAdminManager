<?php
namespace AdminManager\Model\Table;

use AdminManager\Model\Entity\AccessLog;
use AdminManager\Model\Table\AppTable;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RoleMst
 * @property \Cake\ORM\Association\HasMany $Bookmarks
 */
class AccessLogsTable extends AppTable {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);
        $this->table('access_logs');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'className' => 'AdminManager.Users',
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
    }

}
