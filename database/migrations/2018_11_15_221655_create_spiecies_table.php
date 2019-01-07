<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSpieciesTable.
 */
class CreateSpieciesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('spiecies', function(Blueprint $table) {
            $table->increments('id');

			//data about spiecie
			$table->string('spiecie', 55);
			$table->unsignedInteger('niche_id');
			$table->string('habitat', 55);
			$table->string('common_name', 55);
			$table->string('pic_id', 255);
			$table->string('authors');

			$table->timestamps();

			$table->foreign('niche_id')->references('id')->on('niches');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('spiecies', function (Blueprint $table) {
			$table->dropForeign('spiecies_niche_id_foreign');
		});

		Schema::drop('spiecies');
	}
}
