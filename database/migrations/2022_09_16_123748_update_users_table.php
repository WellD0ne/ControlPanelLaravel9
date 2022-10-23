<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
//            remove columns
            $table->dropColumn(['email', 'email_verified_at', 'created_at', 'updated_at']);
//            rename columns
            $table->renameColumn('id', 'uid');
            $table->renameColumn('name', 'nameclient');
//            create columns
            $table->string('login', 255);
            $table->string('tpname', 255);
            $table->timestamp('dateact');
            $table->decimal('abonplata', 19, 2);
            $table->decimal('ostatok', 19, 2);
            $table->integer('recmnd');
            $table->decimal('ppay', 19, 2)->nullable();
            $table->timestamp('pdate_end')->nullable();
            $table->integer('pcountpermonth');
            $table->timestamp('last_pdate')->nullable();
            $table->timestamp('last_active_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();

            $table->renameColumn('uid', 'id');
            $table->renameColumn('nameclient', 'name');

            $table->dropColumn(['login', 'tpname', 'dateact', 'abonplata', 'ostatok', 'recmnd', 'ppay', 'pdate_end', 'pcountpermonth', 'last_pdate', 'last_active_at']);
        });
    }
};
