<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('medicine_classification_mapping', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['medicine_id']);

            // Add a new foreign key constraint
            $table->foreign('medicine_id')
                ->references('id')
                ->on('medicines')
                ->onDelete('cascade'); // or 'restrict', 'set null', etc.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medicine_classification_mapping', function (Blueprint $table) {
            // Drop the new foreign key constraint
            $table->dropForeign(['medicine_id']);

            // Add back the old foreign key constraint
            $table->foreign('medicine_id')
                ->references('id')
                ->on('medicines')
                ->onDelete('cascade'); // or 'restrict', 'set null', etc.
        });
    }
};
