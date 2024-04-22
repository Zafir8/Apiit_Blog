<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class); // This is the user who created the event
            $table->string('title'); // The title of the event
            $table->string('slug')->unique(); // The slug of the event
            $table->longText('description'); // The description of the event
            $table->dateTime('start_date'); // The start date of the event
            $table->dateTime('end_date'); // The end date of the event
            $table->timestamp('published_at')->nullable(); // The date the event was published
            $table->boolean('featured')->default(false); // Whether the event is featured
            $table->string('location'); // The location of the event
            $table->string('image')->nullable(); // The image of the event

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
