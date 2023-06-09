<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipient;
use App\Models\Project;
use App\Models\BankAccount;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Project::all();
        $recipients = Recipient::all();
        $accounts = BankAccount::all();
        $types = ['cheque', 'rtgs', 'po', 'fund transfer'];

        for ($i=0; $i < rand(800, 1000); $i++) {
            $issued = Carbon::now()->subDays(rand(0, 100));
            $status = rand(0,10) >= 3 ? $issued->addDays(rand(0,15)) : null;
            if ($status > Carbon::now()) $status = null;

            Payment::create([
                'recipient_id' => $this->getRandObj($recipients)->id,
                'project_id' => $this->getRandObj($projects)->id,
                'bank_account_id' => $this->getRandObj($accounts)->id,
                'issue_date' => $issued->toDateString(),
                'status' => $status,
                'type' => $this->getRandObj($types),
                'identifier' => Str::random(15),
                'amount' => rand(10000, 100000000) * 100,
            ]);
        }
    }

    public function getRandObj($obj)
    {
        return $obj[rand(0, count($obj) - 1)];
    }
}
