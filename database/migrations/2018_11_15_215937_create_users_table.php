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
			$table->string('nickname', 22)->unique()->nullable();
			$table->date('birth');
			$table->string('pic')->nullable();
			$table->string('name', 50)->nullable();
			$table->string('diploma')->nullable();
			
			//auth data
			$table->string('email', 50)->unique();
			$table->string('password');

			//
			$table->string('status', 50)->default('active');
			$table->string('permission', 50)->default('app.common');

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
