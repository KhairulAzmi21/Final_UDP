<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->insert([
        	'id_permission' => 4,
            'upload_permission' => 1,
            'download_permission' => 1,
            'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon,
           
        	]);
         DB::table('permissions')->insert([
        	'id_permission' => 5,
            'upload_permission' => 1,
            'download_permission' => 1,
            'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon
        	]);
          DB::table('permissions')->insert([
        	'id_permission' => 6,
            'upload_permission' => 1,
            'download_permission' => 1,
            'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon
        	]);
           DB::table('permissions')->insert([
        	'id_permission' => 7,
            'upload_permission' => 1,
            'download_permission' => 1,
            'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon
        	]);
            DB::table('permissions')->insert([
        	'id_permission' => 8,
            'upload_permission' => 1,
            'download_permission' => 1,
            'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon
        	]);
        	 DB::table('permissions')->insert([
        	'id_permission' => 9,
            'upload_permission' => 1,
            'download_permission' => 1,
            'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon
        	]);

        	 DB::table('permissions')->insert([
        	'id_permission' => 10,
            'upload_permission' => 1,
            'download_permission' => 1,
            'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon
        	]);
        	  DB::table('permissions')->insert([
        	'id_permission' => 11,
            'upload_permission' => 1,
            'download_permission' => 1,
            'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon
        	]);
        	   DB::table('permissions')->insert([
        	'id_permission' => 12,
            'upload_permission' => 1,
            'download_permission' => 1,
            'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon
        	]);
        	    DB::table('permissions')->insert([
        	'id_permission' => 13,
            'upload_permission' => 1,
            'download_permission' => 1,
            'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon
        	]);
        	DB::table('permissions')->insert([
        	'id_permission' => 14,
            'upload_permission' => 1,
            'download_permission' => 1,
            'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon
        	]);

   			DB::table('permissions')->insert([
        	'id_permission' => 15,
            'upload_permission' => 1,
            'download_permission' => 1,
            'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon
        	]);
        	   DB::table('permissions')->insert([
        	'id_permission' => 16,
            'upload_permission' => 1,
            'download_permission' => 1,
            'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon
        	]);



    }
}
