<?php

use Phinx\Seed\AbstractSeed;

/**
 * User table seeder.
 *
 * @class Phinx\Seed\AbstractSeed
 */
class UsersTable extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
            // Template: ['name' => '', 'username' => '', 'blocked' => '', 'email' => '', ban_id => '0', 'password' => '']

            [
                'name'     => 'Tim Joosten',
                'username' => 'Topairy',
                'email'    => 'Topairy@gmail.com',
                'ban_id'   => '0',
                'blocked'  => 'N',
                'password' => md5('root1995!'),
            ]
        ];

        $users = $this->table('users');
        $users->insert($data)->save();
    }
}
