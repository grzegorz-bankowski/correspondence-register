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
              'full_name' => 'John Smith',
              'login' => 'john',
              'password' => Hash::make('admin'),
              'admin' => 'yes',
              'last_logged' => now(),
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'full_name' => 'Eva Smith',
              'login' => 'eva',
              'password' => Hash::make('user'),
              'admin' => 'no',
              'last_logged' => now(),
              'created_at' => now(),
              'updated_at' => now(),
            ]
        ]);
        DB::table('incoming_letters')->insert([
            [
              'incoming_date' => '2024-03-01',
              'letter_num' => '1',
              'sender_name' => 'Helios S.A.',
              'street' => 'Kościuszki',
              'house_num' => '1C',
              'city' => 'Gliwice',
              'post_code' => '44-100',
              'post' => 'Gliwice',
              'country' => 'Poland',
              'user_id' => '2',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'incoming_date' => '2024-03-02',
              'letter_num' => '2',
              'sender_name' => 'Ziaja Ltd Zakład Produkcji',
              'street' => 'Jesienna',
              'house_num' => '9',
              'city' => 'Gdańsk',
              'post_code' => '80-298',
              'post' => 'Gdańsk',
              'country' => 'Poland',
              'user_id' => '2',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'incoming_date' => '2024-03-04',
              'letter_num' => '3',
              'sender_name' => 'Inter Cars S.A.',
              'street' => 'Gdańska',
              'house_num' => '15',
              'city' => 'Cząstków Mazowiecki',
              'post_code' => '05-152',
              'post' => 'Cząstków Mazowiecki',
              'country' => 'Poland',
              'user_id' => '2',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'incoming_date' => '2024-03-07',
              'letter_num' => '4',
              'sender_name' => 'Rossmann',
              'street' => 'św. Teresy',
              'house_num' => '109',
              'city' => 'Łódź',
              'post_code' => '91-222',
              'post' => 'Łódź',
              'country' => 'Poland',
              'user_id' => '2',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'incoming_date' => '2024-03-08',
              'letter_num' => '5',
              'sender_name' => 'TERG S.A.',
              'street' => 'Za Dworcem',
              'house_num' => '1D',
              'city' => 'Złotów',
              'post_code' => '77-400',
              'post' => 'Złotów',
              'country' => 'Poland',
              'user_id' => '2',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'incoming_date' => '2024-03-11',
              'letter_num' => '6',
              'sender_name' => 'Bank Spółdzielczy w Białej Podlaskiej',
              'street' => 'Kolejowa',
              'house_num' => '5',
              'city' => 'Biała Podlaska',
              'post_code' => '21-500',
              'post' => 'Biała Podlaska',
              'country' => 'Poland',
              'user_id' => '2',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'incoming_date' => '2024-03-15',
              'letter_num' => '7',
              'sender_name' => 'Google Poland',
              'street' => 'Emilii Plater',
              'house_num' => '53',
              'city' => 'Warszawa',
              'post_code' => '00-113',
              'post' => 'Warszawa',
              'country' => 'Poland',
              'user_id' => '2',
              'created_at' => now(),
              'updated_at' => now(),
            ],
        ]);
        DB::table('outgoing_letters')->insert([
          [
            'send_date' => '2024-03-16',
            'letter_num' => '1',
            'recipient' => 'C.HARTWIG GDYNIA S.A.',
            'street' => 'Kielecka',
            'house_num' => '2',
            'city' => 'Gdynia',
            'post_code' => '81-303',
            'post' => 'Gdynia',
            'country' => 'Poland',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'send_date' => '2024-03-17',
            'letter_num' => '2',
            'recipient' => 'Armatura Kraków S.A.',
            'street' => 'Zakopiańska',
            'house_num' => '72',
            'city' => 'Kraków',
            'post_code' => '30-418',
            'post' => 'Kraków',
            'country' => 'Poland',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'send_date' => '2024-03-18',
            'letter_num' => '3',
            'recipient' => 'P.P.U.H. WOSEBA Sp. z o.o.',
            'street' => 'Krotoszyńska',
            'house_num' => '150',
            'city' => 'Odolanów',
            'post_code' => '63-430',
            'post' => 'Odolanów',
            'country' => 'Poland',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'send_date' => '2024-03-19',
            'letter_num' => '4',
            'recipient' => 'LUIGI LAVAZZA SPA',
            'street' => 'Via Bologna',
            'house_num' => '32',
            'city' => 'Turyn',
            'post_code' => '10152',
            'post' => 'Turyn',
            'country' => 'Italy',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'send_date' => '2024-03-21',
            'letter_num' => '5',
            'recipient' => 'Zakłady Farmaceutyczne POLPHARMA S.A.',
            'street' => 'Pelplińska',
            'house_num' => '19',
            'city' => 'Starogard Gdański',
            'post_code' => '83-200',
            'post' => 'Starogard Gdański',
            'country' => 'Poland',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'send_date' => '2024-03-22',
            'letter_num' => '1',
            'recipient' => 'Bank Polska Kasa Opieki Spółka Akcyjna',
            'street' => 'Żubra',
            'house_num' => '1',
            'city' => 'Warszawa',
            'post_code' => '01-066',
            'post' => 'Warszawa',
            'country' => 'Poland',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
          ],
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
