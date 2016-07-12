<?php

namespace AdminManager\Model\Table\Validation;

use Cake\Validation\Validator;

/**
 * UsersTableのバリデーション処理
 * * バリデーション処理は分けないとモデルが肥大化してしまいそうだったので、分けました。
 */
trait UsersValidation {
  /**
   * Default validation rules.
   *
   * @param \Cake\Validation\Validator $validator Validator instance.
   * @return \Cake\Validation\Validator
   */
  public function validationDefault(Validator $validator) {
    // IDは登録時のみEmptyが許される
    $validator
      ->allowEmpty('id', 'create');

    // login_nameバリデート
    // * 必ず入力
    // * ユニークであること
    $validator
      ->requirePresence('login_name', 'create')
      ->notEmpty('login_name', '必ず入力して下さい')
      ->add('login_name', 'unique', [
        'rule' => 'validateUnique',
        'provider' => 'table',
        'message' => 'この値は使用できません'
      ])
      ->add('login_name', 'word_check', [
        'rule' => function ($value, $context) {
              //同一Table内などのメソッドも指定可能
              return (bool) preg_match('/^[a-zA-Z0-9_]{3,16}$/', $value);
          },
        'message' => '半角英数字(\'_\'含む)3文字以上16文字以下を入力してください'
      ]);

    // mail_addressバリデート
    // * 必ず入力
    // * ユニークであること
    // * メールアドレスであること
    $validator
      ->requirePresence('mail_address', 'create')
      ->notEmpty('mail_address', 'メールアドレスが入力されていません')
      ->add('mail_address', 'unique', ['rule' => 'validateUnique', 'provider' => 'table'])
      ->add('mail_address', 'email', ['rule' => 'email', 'message' => 'メールアドレスの入力に誤りがあります']);

    $validator
      ->requirePresence('password', 'create')
      ->notEmpty('password', 'create')
      ->add('password', [
        'minLength' => [
          'rule' => ['minLength', 8],
          'last' => true,
          'message' => 'パスワードが短すぎます。8文字以上30文字以下で入力してください'
        ],
        'maxLength' => [
          'rule' => ['maxLength', 30],
          'last' => true,
          'message' => 'パスワードが短すぎます。8文字以上30文字以下で入力してください'
        ]
      ]);
    $validator->add('confirm_password', [
        'compare' => [
          'rule' => ['compareWith', 'password'],
          'message' => 'パスワードが一致しません'
        ]
      ]);

    $validator
      ->requirePresence('name', 'create')
      ->notEmpty('name', 'create');

      return $validator;
  }

}
