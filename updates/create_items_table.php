<?php

namespace WebVPF\SimpleDocs\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('webvpf_simpledocs_items', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->index();
            $table->boolean('published')->default(false);
            $table->longText('content')->nullable();
            $table->longText('content_html')->nullable();
            $table->integer('sort_order')->unsigned()->default(1)->index();
            $table->integer('count_views')->index()->default(0);
            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->string('meta_key')->nullable();
            $table->string('meta_img')->nullable();
            $table->longText('css')->nullable();
            $table->longText('js')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('webvpf_simpledocs_items');
    }
}
