<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateRecordsTable.
 */
class CreateRecordsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('records', function(Blueprint $table) {
			$table->increments('id');
			
			$table->unsignedInteger('user_id');
			$table->unsignedInteger('spiecie_id')->nullable();

			$table->string('spiecie', 55)->nullable();
			$table->string('niche', 11)->nullable();
			$table->string('habitat', 55)->nullable();
			$table->string('common_name', 55)->nullable();
			$table->string('pic_id', 255)->nullable();

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('spiecie_id')->references('id')->on('spiecies');

			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schemar::table('records', function (Blueprint $table){
			$table->dropForeign('users_user_id_foreign');
			$table->dropForeign('spiecies_spiecie_id_foreign');
		});
		
		Schema::drop('records');
	}
}
