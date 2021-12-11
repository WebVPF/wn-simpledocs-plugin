<?php namespace WebVPF\SimpleDocs\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class AddCssJsFilesFields extends Migration
{
    public function up()
    {
        Schema::table('webvpf_simpledocs_items', function($table)
        {
            $table->text('css_files')->nullable()->after('css');
            $table->text('js_files')->nullable()->after('js');
        });
    }

    public function down()
    {
        $table->dropDown([
            'css_files',
            'js_files'
        ]);
    }
}
