<?php
namespace AdminManager\Model\Table;

use AdminManager\Model\Entity\User;
use AdminManager\Model\Table\AppTable;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;
use AdminManager\Model\Table\Validation\UsersValidation;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RoleMst
 * @property \Cake\ORM\Association\HasMany $Bookmarks
 */
class UsersTable extends AppTable {
    use UsersValidation;
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('RoleMst', [
            'foreignKey' => 'role_mst_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Bookmarks', [
            'foreignKey' => 'user_id'
        ]);
    }

    public function findAuth(Query $query) {
      $query->where(['status' => 1]);//statusが1のユーザーのみ取得
      $query->contain(['RoleMst']);//アソシエーション（postsテーブルとアソシエーションしていると仮定）
      return $query;
    }

    public function getUsers() {
      $query = $this
        ->find()
        ->select()
        ->contain('RoleMst');
      return $query->all();
    }



    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['mail_address']));
        $rules->add($rules->isUnique(['screen_name']));
        $rules->add($rules->existsIn(['role_mst_id'], 'RoleMst'));
        return $rules;
    }
}
