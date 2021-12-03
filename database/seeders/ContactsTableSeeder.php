<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        DB::table('contacts')->insert([
			'name' => 'Mary Roe',
			'email' => 'mroe@gmail.com',
		]);
        */
        Contact::factory(40)->create();
    }
}
