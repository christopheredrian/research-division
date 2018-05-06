<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resolutions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('number');
            $table->unsignedInteger('series');
            $table->longText('title');
            $table->longText('keywords');
            $table->boolean('is_accepting')->default(false);
            $table->boolean('is_monitoring')->default(false);
            $table->boolean('is_monitored')->default(false);
            $table->text('pdf_file_path')->nullable();
            $table->text('pdf_file_name')->nullable();
            $table->text('pdf_link')->nullable();
            $table->text('facebook_post_id')->nullable();
            // FOR REPORTS
            $table->text('status_report_date')->nullable();
            $table->text('summary')->nullable();
            $table->text('status')->nullable();
            $table->text('legislative_action')->nullable();
            $table->text('updates')->nullable();
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
        Schema::dropIfExists('resolutions');
    }
}
