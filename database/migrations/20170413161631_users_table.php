<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class UsersTable
 */
class UsersTable extends AbstractMigration
{
    /**
     * Add the migration.
     */
    public function up()
    {
        $table = $this->table('users', ['id' => true, 'primary_key' => 'id']);
        $table->addColumn('ban_id', 'integer');
        $table->addColumn('name', 'string');
        $table->addColumn('username', 'string');
        $table->addColumn('email', 'string');
        $table->addColumn('password', 'string');
        $table->addColumn('blocked', 'string');

        // Timestamps
        $table->addColumn('created_at', 'timestamp');
        $table->addColumn('updated_at', 'timestamp');
        $table->addColumn('deleted_at', 'timestamp');
        $table->save();
    }

    /**
     * Reverse the migration.
     */
    public function down()
    {
        $this->dropTable('users');
    }
}
