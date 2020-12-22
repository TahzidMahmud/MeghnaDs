<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_outs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('member_id')->unsigned()->index()->nullable();  
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->date('date');
            $table->integer('admistration')->nullable();
            $table->integer('entertainment')->nullable();
            $table->integer('investment_withdraw')->nullable();
            $table->string('purpose')->nullable();
            $table->integer('total_debit');
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
        Schema::dropIfExists('cash_outs');
    }
}
