<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactFormSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_form_submissions', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('name'); // Name of the submitter
            $table->string('email'); // Email of the submitter
            $table->string('phone_number'); // Phone Number of the submitter
            $table->string('investment_amount'); // Investment Amount
            $table->text('message'); // Message text
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_form_submissions');
    }
}
