<?php
namespace AdminManager\Model\Entity;

use Cake\ORM\Entity;

/**
 * Group Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $role_mst_id
 * @property \AdminManager\Model\Entity\RoleMst $role_mst
 * @property \Cake\I18n\Time $create_time
 * @property \Cake\I18n\Time $update_time
 * @property \AdminManager\Model\Entity\User[] $users
 */
class Group extends Entity
{

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
}
