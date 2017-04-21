<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class PermissionsTable
 */
class PermissionsTable extends AbstractMigration
{
    /**
     * Add the migration.
     */
    public function up()
    {
        $table = $this->table('permissions');
        $table->addColumn('name', 'string');
        $table->addColumn('description', 'text');

        // Timestamps
        $table->addColumn('created_at', 'timestamp');
        $table->addColumn('updated_at', 'timestamp');
        $table->addColumn('deleted_at', 'timestamp');

        $table->save();

        $relation = $this->table('login_permissions');
        $relation->addColumn('permissions_id', 'integer');
        $relation->addColumn('login_id', 'integer');

        // Timestamps
        $relation->addColumn('created_at', 'timestamp');
        $relation->addColumn('deleted_at', 'timestamp');
        $relation->save();
    }

    /**
     * Reverse the migration.
     */
    public function down()
    {
        $this->dropTable('permissions');
    }
}
