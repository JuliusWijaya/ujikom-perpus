<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // DB::unprepared('
        //     CREATE TRIGGER update_koleksi_status AFTER INSERT ON `transaksi_pinjams` FOR EACH ROW
        //         BEGIN
        //             UPDATE `koleksis` SET @status = inactive WHERE kd_koleksi =  NEW.kd_koleksi;
        //         END
        // ');

        $triggerQuery = "
        CREATE TRIGGER update_koleksi_status AFTER INSERT ON transaksi_pinjams
        FOR EACH ROW
        BEGIN
            UPDATE koleksis 
            SET status = 'inactive'
            WHERE kd_koleksi = NEW.kd_koleksi;
        END;
        ";

        DB::unprepared($triggerQuery);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER `update_koleksi_status`');
    }
};
