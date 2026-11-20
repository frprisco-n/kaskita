<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('pending_bill_member_id')
                ->nullable()
                ->storedAs("IF(status = 'pending', bill_member_id, NULL)");

            $table->unsignedBigInteger('verified_bill_member_id')
                ->nullable()
                ->storedAs("IF(status = 'verified', bill_member_id, NULL)");

            $table->unique(
                'pending_bill_member_id',
                'payments_one_pending_per_bill_member'
            );

            $table->unique(
                'verified_bill_member_id',
                'payments_one_verified_per_bill_member'
            );
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropUnique('payments_one_pending_per_bill_member');
            $table->dropUnique('payments_one_verified_per_bill_member');

            $table->dropColumn([
                'pending_bill_member_id',
                'verified_bill_member_id',
            ]);
        });
    }
};