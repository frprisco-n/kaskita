<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE users
            ADD CONSTRAINT chk_users_role
            CHECK (role IN ('admin', 'member'))
        ");

        DB::statement("
            ALTER TABLE members
            ADD CONSTRAINT chk_membership_status
            CHECK (membership_status IN ('active', 'inactive'))
        ");

        DB::statement("
            ALTER TABLE bills
            ADD CONSTRAINT chk_bills_amount
            CHECK (amount > 0),
            ADD CONSTRAINT chk_bills_status
            CHECK (status IN ('draft', 'published', 'cancelled'))
        ");

        DB::statement("
            ALTER TABLE bill_members
            ADD CONSTRAINT chk_bill_members_status
            CHECK (status IN ('unpaid', 'paid', 'cancelled'))
        ");

        DB::statement("
            ALTER TABLE payments
            ADD CONSTRAINT chk_payments_amount
            CHECK (amount > 0),
            ADD CONSTRAINT chk_payments_status
            CHECK (status IN ('pending', 'verified', 'rejected'))
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE users
            DROP CONSTRAINT chk_users_role
        ");

        DB::statement("
            ALTER TABLE members
            DROP CONSTRAINT chk_membership_status
        ");

        DB::statement("
            ALTER TABLE bills
            DROP CONSTRAINT chk_bills_amount,
            DROP CONSTRAINT chk_bills_status
        ");

        DB::statement("
            ALTER TABLE bill_members
            DROP CONSTRAINT chk_bill_members_status
        ");

        DB::statement("
            ALTER TABLE payments
            DROP CONSTRAINT chk_payments_amount,
            DROP CONSTRAINT chk_payments_status
        ");
    }
};