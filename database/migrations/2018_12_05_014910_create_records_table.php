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
			
			$table->foreign('user_id');
			$table->foreign('spiecie_id')->nullable();

			$table->string('spiecie', 255)->nullable();
			$table->string('niche', 11)->nullable();
			$table->string('habitat', 255)->nullable();
			$table->string('common_name', 255)->nullable();
			$table->string('pic_id')->nullable();

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
		Schema::drop('records');
	}
}
