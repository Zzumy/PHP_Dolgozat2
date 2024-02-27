<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER decrease_quantity_after_delete_winning
            AFTER DELETE ON winnings
            FOR EACH ROW
            BEGIN
                UPDATE users
                SET quantity = quantity - 1
                WHERE id = OLD.user_id;
            END
        ');
    }
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS decrease_quantity_after_delete_winning');
    }
};
class AddQuantityColumnToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('quantity')->default(0);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('quantity');
        });
    }
}
