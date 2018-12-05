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
			
			$table->integer('user_id')->unsigned();
			$table->integer('spiecie_id')->unsigned()->nullable();

			$table->string('spiecie', 255)->nullable();
			$table->string('niche', 11)->nullable();
			$table->string('habitat', 255)->nullable();
			$table->string('common_name', 255)->nullable();
			$table->string('pic_id')->nullable();

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
