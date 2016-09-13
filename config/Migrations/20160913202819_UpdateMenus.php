<?php
use Migrations\AbstractMigration;

class UpdateMenus extends AbstractMigration
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
        $table = $this
            ->table('menus')
            ->changeColumn('parent_id', 'integer', [
                'null' => true,
            ])
            ->update();
    }
}
