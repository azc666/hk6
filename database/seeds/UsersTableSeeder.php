<?php

use Illuminate\Database\Seeder;
//use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'BC99',
                'password' => bcrypt('123123'),
                'loc_name' => 'Graphics + Design',
                'loc_num' => '99',
                'admin' => 0,
                'loc_address1' => '1111 W. Cass St.',
                'loc_address2' => '',
                'loc_city' => 'Tampa',
                'loc_state' => 'FL',
                'loc_zip' => '33606',
                'contact_a' => 'Clark Kent',
                'email' => 'clark@test.com',
                'phone_a' => '555-555-1234',
                'fax_a' => '555-555-1235',
                'cell_a' => '555-555-1236',
                'contact_b' => 'Clark Kent',
                'email_b' => 'clark@test.com',
                'phone_b' => '555-555-1234',
                'fax_b' => '555-555-1235',
                'cell_b' => '555-555-1236',
                'contact_s' => 'Clark Kent',
                'email_s' => 'clark@test.com',
                'phone_s' => '555-555-1234',
                'fax_s' => '555-555-1235',
                'cell_s' => '555-555-1236',
                'address1_s' => '1111 W. Cass St.',
                'address2_s' => '',
                'city_s' => 'Tampa',
                'state_s' => 'FL',
                'zip_s' => '33606',
                'remember_token' => null,
            ],
            [
                'username' => 'BC200',
                'password' => bcrypt('123123'),
                'loc_name' => 'Homes \'R Us',
                'loc_num' => '200',
                'admin' => 1,
                'loc_address1' => '701 Brickell Avenue, Suite 3300',
                'loc_address2' => '',
                'loc_city' => 'Miami',
                'loc_state' => 'FL',
                'loc_zip' => '33131',
                'contact_a' => 'Lois Lane',
                'email' => 'lois@test.com',
                'phone_a' => '555-555-1234',
                'fax_a' => '555-555-1235',
                'cell_a' => '555-555-1236',
                'contact_b' => 'Lois Lane',
                'email_b' => 'lois@test.com',
                'phone_b' => '555-555-1234',
                'fax_b' => '555-555-1235',
                'cell_b' => '555-555-1236',
                'contact_s' => 'Lois Lane',
                'email_s' => 'lois@test.com',
                'phone_s' => '555-555-1234',
                'fax_s' => '555-555-1235',
                'cell_s' => '555-555-1236',
                'address1_s' => '701 Brickell Avenue, Suite 3300',
                'address2_s' => '',
                'city_s' => 'Miami',
                'state_s' => 'FL',
                'zip_s' => '33130',
                'remember_token' => null,
            ]
        ]);        
    }
}
