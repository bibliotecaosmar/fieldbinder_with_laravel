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
			$table->string('niche', 11);
			$table->string('habitat', 55);
			$table->string('common_name', 55);
			$table->string('pic_id', 255);
			
			//stranger key ??
			$table->string('authors');

            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('spiecies');
	}
}
