<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BankAccount;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = [
            ['bank' => 'NCC Bank', 'account' => 'ABC-123', 'org' => 'AML'],
            ['bank' => 'NCC Bank', 'account' => 'ABC-456', 'org' => 'AML'],
            ['bank' => 'NCC Bank', 'account' => 'ABC-489', 'org' => 'AML'],
            ['bank' => 'Prime Bank', 'account' => 'ABC-132', 'org' => 'AML'],
            ['bank' => 'Prime Bank', 'account' => 'ABC-456', 'org' => 'AML'],
            ['bank' => 'Prime Bank', 'account' => 'ABC-789', 'org' => 'AML'],
        ];

        foreach ($accounts as $account) {
            BankAccount::create($account);
        }
    }
}
