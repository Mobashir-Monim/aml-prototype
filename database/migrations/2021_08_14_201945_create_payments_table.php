<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('recipient_id');
            $table->uuid('project_id');
            $table->uuid('bank_account_id');
            $table->date('issue_date');
            $table->string('type');
            $table->string('identifier');
            $table->unsignedBigInteger('amount');
            $table->text('remarks')->nullable();
            $table->date('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
