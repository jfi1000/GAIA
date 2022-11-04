<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->decimal('weight',10,2);
            $table->date('date_operation');
            // $table->bigInteger('id_status')->unsigned();
            $table->bigInteger('id_client')->unsigned();
            $table->bigInteger('id_residuo')->unsigned();
            // $table->foreign('id_status')->references('id')->on('residuo_status');
            $table->foreign('id_client')->references('id')->on('clients');
            $table->foreign('id_residuo')->references('id')->on('residuo_tipos');
            $table->string('qr')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('operations');
    }
}
