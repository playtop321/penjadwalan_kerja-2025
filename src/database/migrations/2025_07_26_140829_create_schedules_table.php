<?php

use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            
            // foreign key ke users
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();

            // foreign key ke departments
            $table->foreignIdFor(Department::class)->constrained()->cascadeOnDelete();

            $table->date('shift_date');
            $table->enum('shift_time', ['morning', 'afternoon', 'night']);
            $table->enum('status', ['scheduled', 'completed', 'missed'])->default('scheduled');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
