<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
            $table->increments('id');

			//people data
			$table->string('nickname', 24)->unique()->nullable();
			$table->date('birth', 10);
			$table->string('pic', 255)->nullable();
			$table->string('name', 50)->nullable();
			$table->string('diploma', 255)->nullable();

			//auth data
			$table->string('email', 50)->unique();
			$table->string('password', 255);

			//
			$table->string('status', 9)->default('active');
			$table->string('permission', 10)->default('app.common');

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
		Schema::drop('users');
	}
}
