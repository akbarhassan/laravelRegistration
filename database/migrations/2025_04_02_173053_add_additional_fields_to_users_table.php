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
        Schema::table('users', function (Blueprint $table) {
            $table->string('given_name')->after('name')->nullable(false);
            $table->enum('gender', ['male', 'female', 'other'])->after('given_name')->nullable(false);
            $table->string('cpr')->unique()->after('gender')->nullable(false);
            $table->string('phone_number')->unique()->after('cpr')->nullable(false);
            $table->string('org_name')->after('phone_number')->nullable(false);
            $table->boolean('is_representative')->default(false)->after('org_name')->nullable(false);
            $table->boolean('citizen')->default(false)->after('is_representative')->nullable(false);
            $table->text('how_did_you_hear')->after('is_representative')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'given_name',
                'gender',
                'cpr',
                'phone_number',
                'org_name',
                'is_representative',
                'how_did_you_hear',
                'citizen',
            ]);
        });
    }
};
