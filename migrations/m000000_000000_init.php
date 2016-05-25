<?php

use yii\db\Migration;

class m000000_000000_init extends Migration
{
    public function up()
    {
        $this->insert('easyii_modules', [
            'name' => 'profile',
            'title' => 'Profiles',
            'icon' => 'user',
            'settings' => '[]',
            'class' => 'nuffic\profile\Module',
            'status' => 1
        ]);

        $this->addColumn('easyii_admins', 'first_name', $this->string());
        $this->addColumn('easyii_admins', 'last_name', $this->string());
        $this->addColumn('easyii_admins', 'email', $this->string());
        $this->addColumn('easyii_admins', 'picture', $this->string());
    }

    public function down()
    {
        $this->delete('easyii_modules', ['class' => 'nuffic\profile\Module']);
        $this->dropColumn('easyii_admins', 'first_name');
        $this->dropColumn('easyii_admins', 'last_name');
        $this->dropColumn('easyii_admins', 'email');
        $this->dropColumn('easyii_admins', 'picture');
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
