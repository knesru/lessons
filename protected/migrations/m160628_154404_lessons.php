<?php

class m160628_154404_lessons extends CDbMigration
{
    public function safeUp()
    {
        $this->addColumn('lessons', 'start_date_actually', 'datetime');
        $this->addColumn('lessons', 'end_date_actually', 'datetime');
    }

    public function safeDown()
    {
        $this->dropColumn('lessons', 'start_date_actually');
        $this->dropColumn('lessons', 'end_date_actually');
        return false;
    }

    /*
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}