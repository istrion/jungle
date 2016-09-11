<?php
use Migrations\AbstractMigration;

class AddOptionsToBiens extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('biens');
        $table->addColumn('type_of_bien', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('offer', 'boolean', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('online', 'boolean', [
            'default' => 0,
            'null' => false,
        ]);
        $table->update();
    }
}
