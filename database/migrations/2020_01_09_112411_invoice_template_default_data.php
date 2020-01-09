<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvoiceTemplateDefaultData extends Migration
{

    const TABLE = 'invoice_templates';

    /**
     * @throws Exception
     */
    public function up()
    {
        for ($i = 1; $i < 5; $i ++) {
            if(!DB::table($this::TABLE)->where('id', $i)->exists()) {
                DB::table($this::TABLE)->insert(
                    [
                        'name' => 'Template ' . $i,
                        'view' => 'invoice ' . $i,
                        'path' => '/assets/img/PDF/Template' . $i . '.png',
                        'created_at' => new DateTime('now'),
                        'updated_at' => new DateTime('now')
                    ]
                );
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
