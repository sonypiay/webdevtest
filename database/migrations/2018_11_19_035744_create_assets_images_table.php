<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateAssetsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets_images', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name', 75);
			$table->string('desktop', 128);
			$table->string('mobile', 128);
			$table->string('tablet', 128);
			$table->string('target', 128);
            $table->dateTime('created_at');
        });
		
		$assets = [
			['name' => 'first', 'desktop' => 'desktop1.png', 'tablet' => 'tablet1.png', 'mobile' => 'mobile1.png', 'target' => 'https://flashads.co.id', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'second', 'desktop' => 'desktop2.png', 'tablet' => 'tablet2.png', 'mobile' => 'mobile2.png', 'target' => 'https://flashads.co.id', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'third', 'desktop' => 'desktop3.png', 'tablet' => 'tablet3.png', 'mobile' => 'mobile3.png', 'target' => 'https://flashads.co.id', 'created_at' => date('Y-m-d H:i:s')]
		];
		
		DB::table('assets_images')->insert($assets);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets_images');
    }
}
