<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     * Column 'user_id' is the one who receives the notification
     * Column 'from_user_id' is the one who causes the activity 
     * Column 'source_url' is the place where the activity happens
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->foreignId('user_id') 
                  ->constrained('users')
                  ->onDelete('cascade');
                  
            $table->string('content');
            $table->string('source_url');
            $table->string('type');
            $table->boolean('is_read')->default(false);
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
        Schema::dropIfExists('notifications');
    }
}
