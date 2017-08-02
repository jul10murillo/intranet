<?php

namespace johnitvn\rbacplus\models;

use Yii;
use yii\rbac\Item;

/**
 * @author John Martin <john.itvn@gmail.com>
 * @since 1.0.0
 */
class Role extends AuthItem {

    public $permissions = [];

    public function init() {
        parent::init();
        if (!$this->isNewRecord) {
            $permissions = [];
            foreach (static::getPermistions($this->item->name) as $permission) {
                $permissions[] = $permission->name;
            }
            $this->permissions = $permissions;
        }
    }

    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios['default'][] = 'permissions';
        return $scenarios;
    }

    protected function getType() {
        return Item::TYPE_ROLE;
    }

    public function afterSave($insert,$changedAttributes) {
        $authManagerldap = Yii::$app->authManagerldap;
        $role = $authManagerldap->getRole($this->item->name);
        if (!$insert) {
            $authManagerldap->removeChildren($role);
        }
        if ($this->permissions != null && is_array($this->permissions)) {
            foreach ($this->permissions as $permissionName) {
                $permistion = $authManagerldap->getPermission($permissionName);
                $authManagerldap->addChild($role, $permistion);
            }
        }
    }

    public function attributeLabels() {
        $labels = parent::attributeLabels();
        $labels['name'] = Yii::t('rbac', 'Role name');
        $labels['permissions'] = Yii::t('rbac', 'Permissions');
        return $labels;
    }

    public static function find($name) {
        $authManagerldap = Yii::$app->authManagerldap;
        $item = $authManagerldap->getRole($name);
        return new self($item);
    }

    public static function getPermistions($name) {
        $authManagerldap = Yii::$app->authManagerldap;
        return $authManagerldap->getPermissionsByRole($name);
    }

}
