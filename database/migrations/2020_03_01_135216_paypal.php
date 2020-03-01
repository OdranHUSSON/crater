<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Paypal extends Migration
{

    const TABLE = 'payment_methods';

    /**
     * @throws Exception
     */
    public function up()
    {
        DB::table($this::TABLE)->insert(
            [
                'name' => 'Paypal',
                'company_id' => 1,
                'created_at' => new DateTime('now'),
                'updated_at' => new DateTime('now')
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
