<?php

use Phinx\Migration\AbstractMigration;

/**
 * Class AbilitiesTable
 */
class AbilitiesTable extends AbstractMigration
{
    /**
     * Add the migration.
     */
    public function up()
    {
        $table = $this->table('abilities');
        $table->addColumn('name', 'string');
        $table->addColumn('description', 'text');

        // Timestamps
        $table->addColumn('created_at', 'timestamp');
        $table->addColumn('updated_at', 'timestamp');
        $table->addColumn('deleted_at', 'timestamp');
        $table->save();

        $relation = $this->table('login_abilities');
        $relation->addColumn('login_id', 'integer');
        $relation->addColumn('ability_id', 'integer');

        // Timestamps
        $relation->addColumn('updated_at', 'timestamp');
        $relation->addColumn('created_at', 'timestamp');
        $relation->save();
    }

    /**
     * Reverse the migration.
     */
    public function down()
    {
        $this->dropTable('abilities');
        $this->dropTable('login_abilities');
    }
}
