<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipient;

class RecipientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recipients = [
            ['name' => 'Cash'],
            ['name' => 'Bank Transfer'],
            ['name' => 'Steel Point'],
            ['name' => 'Swadesh Container Service'],
            ['name' => 'Hazi Chand Mia '],
            ['name' => 'Nayem Traders'],
            ['name' => 'Khondoker Steel Works'],
            ['name' => 'Faisal Traders'],
            ['name' => 'Rahman Corporation'],
            ['name' => 'Islam Trading Corporation'],
            ['name' => 'MK Traders'],
            ['name' => '2224111003733'],
            ['name' => '2210217002568 (Md. Baizid Mia)'],
            ['name' => '1541020002422'],
            ['name' => 'Padma Oil Company Ltd'],
            ['name' => 'MJL Bangladesh Ltd'],
            ['name' => 'J. Hoque Motors'],
            ['name' => '0014-0210030969'],
            ['name' => 'Lafarge Holcim Bangladesh Ltd'],
            ['name' => 'Endeavor Steel & Engineering '],
        ];

        foreach ($recipients as $recipient) {
            Recipient::create($recipient);
        }
    }
}
