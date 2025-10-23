<!-- <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('datalansia', function (Blueprint $table) {
        if (!Schema::hasColumn('datalansia', 'riwayat_penyakit_lansia')) {
            $table->string('riwayat_penyakit_lansia')->nullable()->after('no_hp_anak');
        }
    });
}


public function down()
{
    Schema::table('datalansia', function (Blueprint $table) {
        $table->dropColumn('riwayat_penyakit_lansia');
    });
}
};