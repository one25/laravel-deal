<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
 		Schema::table('goods', function(Blueprint $table) {
			$table->foreign('seller_id')->references('id')->on('sellers')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
 		Schema::table('goods', function(Blueprint $table) {
			$table->foreign('buyer_id')->references('id')->on('buyers')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('goods', function(Blueprint $table) {
			$table->dropForeign('sellers_seller_id_foreign');
		});
		Schema::table('joineds', function(Blueprint $table) {
			$table->dropForeign('buyers_buyer_id_foreign');
		});
	}
}
