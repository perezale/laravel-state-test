<?php

use App\Models\States\ProcessRequest\Pending;
use Illuminate\Database\Seeder;

class ProcessRequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ProcessRequest::class, 100)->create(array(
            'state' => Pending::class,
        ));
    }
}
