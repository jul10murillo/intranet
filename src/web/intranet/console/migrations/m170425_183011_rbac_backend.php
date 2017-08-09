<?php

use yii2mod\rbac\migrations\Migration;
use yii2mod\rbac\rules\UserRule;

class m170425_183011_rbac_backend extends Migration
{
    public function up()
    {
        $this->createRule('user', UserRule::class);
        $this->createRole('admin', 'Admin has all available permissions.');
        $this->createRole('user', 'Authenticated user.', 'user');
        $this->createPermission('/admin/*');
        $this->createPermission('fullAdministrator', 'Full Administrator');
        $this->addChild('fullAdministrator', '/admin/*');
        $this->addChild('admin', 'fullAdministrator');
        
    }

    public function down()
    {
        $this->removeRule('user');
        $this->removeRole('admin');
        $this->removeRole('user');
        $this->removePermission('/admin/*');
        $this->removePermission('fullAdministrator');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
