<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
              'name' => 'John Doe',
              'email' => 'john@example.com',
              'password' => Hash::make('password'),
              'admin' => 'yes',
              'last_logged' => now(),
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'name' => 'Sarah',
              'email' => 'sarah@example.com',
              'password' => Hash::make('password'),
              'admin' => 'no',
              'last_logged' => now(),
              'created_at' => now(),
              'updated_at' => now(),
            ]
        ]);
        DB::table('incoming_letters')->insert([
            [
              'date' => '2024-01-01',
              'number' => '1/Incoming/L/2024',
              'sender' => 'Netflix International B.V.',
              'street' => 'Karperstraat 8-10',
              'city' => 'Amsterdam',
              'code' => '1075 KZ',
              'country' => 'Holland',
              'user_id' => '2',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'date' => '2024-01-12',
              'number' => '2/Incoming/L/2024',
              'sender' => 'Microsoft',
              'street' => '1 Microsoft Way',
              'city' => 'Redmond',
              'code' => 'WA 98052',
              'country' => 'USA',
              'user_id' => '2',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'date' => '2024-03-04',
              'number' => '3/Incoming/L/2024',
              'sender' => 'Amazon',
              'street' => '12th Avenue South Suite 1200',
              'city' => 'Seatle',
              'code' => 'WA 98144',
              'country' => 'USA',
              'user_id' => '2',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'date' => '2024-03-07',
              'number' => '4/Incoming/L/2024',
              'sender' => 'Google',
              'street' => 'Gordon House, Barrow St',
              'city' => 'Dublin',
              'code' => 'Dublin 4',
              'country' => 'Ireland',
              'user_id' => '2',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'date' => '2024-03-08',
              'number' => '5/Incoming/L/2024',
              'sender' => 'AUDI AG.',
              'street' => 'Auto-Union-Str. 1',
              'city' => 'Ingolstadt',
              'code' => '85057',
              'country' => 'Germany',
              'user_id' => '2',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'date' => '2024-03-11',
              'number' => '6/Incoming/L/2024',
              'sender' => 'Jaguar Land Rover Automotive PLC',
              'street' => 'Abbey Road, Whitley',
              'city' => 'Coventry',
              'code' => 'CV3 4LF',
              'country' => 'United Kingdom',
              'user_id' => '2',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'date' => '2024-03-15',
              'number' => '7/Incoming/L/2024',
              'sender' => 'University of Oxford',
              'street' => 'Wellington Square',
              'city' => 'Oxford',
              'code' => 'OX1 2JD',
              'country' => 'United Kingdom',
              'user_id' => '2',
              'created_at' => now(),
              'updated_at' => now(),
            ],
        ]);
        DB::table('outgoing_letters')->insert([
          [
            'date' => '2024-03-16',
            'number' => '1/Outgoing/L/2024',
            'recipient' => 'C.HARTWIG GDYNIA S.A.',
            'street' => 'Kielecka 2',
            'city' => 'Gdynia',
            'code' => '81-303',
            'country' => 'Poland',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'date' => '2024-03-17',
            'number' => '2/Outgoing/L/2024',
            'recipient' => 'Armatura Kraków S.A.',
            'street' => 'Zakopiańska 72',
            'city' => 'Kraków',
            'code' => '30-418',
            'country' => 'Poland',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'date' => '2024-03-18',
            'number' => '3/Outgoing/L/2024',
            'recipient' => 'P.P.U.H. WOSEBA Sp. z o.o.',
            'street' => 'Krotoszyńska 150',
            'city' => 'Odolanów',
            'code' => '63-430',
            'country' => 'Poland',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'date' => '2024-03-19',
            'number' => '4/Outgoing/L/2024',
            'recipient' => 'LUIGI LAVAZZA SPA',
            'street' => 'Via Bologna 32',
            'city' => 'Turyn',
            'code' => '10152',
            'country' => 'Italy',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'date' => '2024-03-21',
            'number' => '5/Outgoing/L/2024',
            'recipient' => 'Zakłady Farmaceutyczne POLPHARMA S.A.',
            'street' => 'Pelplińska 19',
            'city' => 'Starogard Gdański',
            'code' => '83-200',
            'country' => 'Poland',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'date' => '2024-03-22',
            'number' => '6/Outgoing/L/2024',
            'recipient' => 'Bank Polska Kasa Opieki Spółka Akcyjna',
            'street' => 'Żubra 1',
            'city' => 'Warszawa',
            'code' => '01-066',
            'country' => 'Poland',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
          ],
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
