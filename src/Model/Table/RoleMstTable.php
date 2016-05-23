<?php
namespace AdminManager\Model\Table;

use AdminManager\Model\Entity\RoleMst;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RoleMst Model
 *
 */
class RoleMstTable extends Table {

  /**
   * Initialize method
   *
   * @param array $config The configuration for the Table.
   * @return void
   */
  public function initialize(array $config) {
    parent::initialize($config);

    $this->table('role_mst');
    $this->displayField('id');
    $this->primaryKey('id');
  }

  /**
   * Default validation rules.
   *
   * @param \Cake\Validation\Validator $validator Validator instance.
   * @return \Cake\Validation\Validator
   */
  public function validationDefault(Validator $validator) {
    $validator
      ->allowEmpty('id', 'create');

    $validator
      ->requirePresence('name', 'create')
      ->notEmpty('name');

    return $validator;
  }
}
