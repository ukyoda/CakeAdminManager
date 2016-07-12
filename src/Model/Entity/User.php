<?php
namespace AdminManager\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity.
 *
 * @property int $id
 * @property string $screen_name
 * @property string $mail_address
 * @property string $password
 * @property string $name
 * @property string $role_mst_id
 * @property \App\Model\Entity\RoleMst $role_mst
 * @property \Cake\I18n\Time $create_time
 * @property \Cake\I18n\Time $update_time
 * @property \App\Model\Entity\Bookmark[] $bookmarks
 */
class User extends Entity {

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($value) {
        if(!empty($value)) {
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($value);
        }
        return $value;
    }

    protected function _setConfirmPassword($value) {
        if(!empty($value)) {
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($value);
        }
        return $value;
    }


}
