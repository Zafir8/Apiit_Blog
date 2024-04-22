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
        Schema::create('research', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class); // This is the user who created the research
            $table->string('title'); // The title of the research
            $table->string('slug')->unique(); // The slug of the research
            $table->longText('description'); // The description of the research
            $table->timestamp('published_at')->nullable(); // The date the research was published
            $table->boolean('featured')->default(false); // Whether the research is featured
            $table->string('image')->nullable(); // The image of the research
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research');
    }
};
