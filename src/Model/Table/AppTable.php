<?php

namespace AdminManager\Model\Table;

use Cake\ORM\Table;

class AppTable extends Table {
  
  public function initialize(array $config) {
    parent::initialize($config);
    // 作成日時／更新日時を自動で更新するようにする
    $this->addBehavior('Timestamp', [
      'events' => [
        'Model.beforeSave' => [
          'create_time' => 'new',
          'update_time' => 'always'
        ]
      ]
    ]);
  }
}
