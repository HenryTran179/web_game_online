<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account')->where('email','admin@gmail.com')->update(
            ['isadmin' => 1]
        );
    }
}
