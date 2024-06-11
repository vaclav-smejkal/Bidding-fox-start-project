<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id');
            $table->bigInteger('items')->nullable();
            $table->double('duration')->nullable();
            $table->dateTime('started_at')->nullable();
            $table->dateTime('finished_at')->nullable();
            $table->tinyInteger('applied_to_all_times')->unsigned()->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->longText('rules')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

        public function down(): void
        {
            Schema::dropIfExists('logs');
        }

};
