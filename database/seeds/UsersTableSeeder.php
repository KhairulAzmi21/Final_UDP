<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
        	'name' => 'Bank A',
        	'email' => 'banka@gmail.com',
        	'password' => Hash::make('bismillah'),
            'admin' => 0,  
            'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon,
            'upload_permission' => 'forever',
            'download_permission' => 'forever',
        	]);


        DB::table('users')->insert([
        	'name' => 'Bank B',
        	'email' => 'bankb@gmail.com',
        	'password' => Hash::make('bismillah'),
             'admin' => 0,
             'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon,
              'upload_permission' => 'forever',
            'download_permission' => 'forever',
        	]);
			 
		DB::table('users')->insert([
        	'name' => 'Bank C',
        	'email' => 'bankc@gmail.com',
        	'password' => Hash::make('bismillah'),
             'admin' => 0,
             'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon,
              'upload_permission' => 'forever',
            'download_permission' => 'forever',
        	]);
		DB::table('users')->insert([
        	'name' => 'Firm A',
        	'email' => 'firma@gmail.com',
        	'password' => Hash::make('alhamdulillah'),
             'admin' => 1,
             'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon,
              'upload_permission' => 'yes',
            'download_permission' => 'yes',
        	]);
			
		DB::table('users')->insert([
        	'name' => 'Firm B',
        	'email' => 'firmb@gmail.com',
        	'password' => Hash::make('alhamdulillah'),
             'admin' => 1,
             'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon,
              'upload_permission' => 'yes',
            'download_permission' => 'yes',
        	]);
		
		DB::table('users')->insert([
        	'name' => 'Firm C',
        	'email' => 'firmc@gmail.com',
        	'password' => Hash::make('alhamdulillah'),
             'admin' => 1,
             'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon,
              'upload_permission' => 'yes',
            'download_permission' => 'yes',
        	]);
		
		DB::table('users')->insert([
        	'name' => 'Firm D',
        	'email' => 'firmd@gmail.com',
        	'password' => Hash::make('alhamdulillah'),
             'admin' => 1,
             'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon,
              'upload_permission' => 'yes',
            'download_permission' => 'yes',
        	]);
			
		DB::table('users')->insert([
        	'name' => 'Firm E',
        	'email' => 'firme@gmail.com',
        	'password' => Hash::make('alhamdulillah'),
             'admin' => 1,
             'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon,
              'upload_permission' => 'yes',
            'download_permission' => 'yes',
        	]);
		
		DB::table('users')->insert([
        	'name' => 'Firm F',
        	'email' => 'firmf@gmail.com',
        	'password' => Hash::make('alhamdulillah'),
             'admin' => 1,
             'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon,
              'upload_permission' => 'yes',
            'download_permission' => 'yes',
        	]);
			
		DB::table('users')->insert([
        	'name' => 'Firm Azman',
        	'email' => 'firmazman@gmail.com',
        	'password' => Hash::make('alhamdulillah'),
             'admin' => 2,
             'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon,
              'upload_permission' => 'yes',
            'download_permission' => 'yes',
        	]);
		
		DB::table('users')->insert([
        	'name' => 'Firm Muhd',
        	'email' => 'firmmuhd@gmail.com',
        	'password' => Hash::make('alhamdulillah'),
             'admin' => 2,
             'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon,
              'upload_permission' => 'yes',
            'download_permission' => 'yes',
        	]);
			
		DB::table('users')->insert([
        	'name' => 'Firm Hakim',
        	'email' => 'firmhakim@gmail.com',
        	'password' => Hash::make('alhamdulillah'),
             'admin' => 2,
             'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon,
              'upload_permission' => 'yes',
            'download_permission' => 'yes',
        	]);
		
		DB::table('users')->insert([
        	'name' => 'Firm Fatimah',
        	'email' => 'firmfatimah@gmail.com',
        	'password' => Hash::make('alhamdulillah'),
             'admin' => 2,
             'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon,
              'upload_permission' => 'yes',
            'download_permission' => 'yes',
        	]);
		DB::table('users')->insert([
        	'name' => 'Firm Sofia',
        	'email' => 'firmsofia@gmail.com',
        	'password' => Hash::make('alhamdulillah'),
             'admin' => 3,
             'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon,
              'upload_permission' => 'yes',
            'download_permission' => 'yes',
        	]);
			
		DB::table('users')->insert([
        	'name' => 'Firm Azmi',
        	'email' => 'firmhazmi@gmail.com',
        	'password' => Hash::make('alhamdulillah'),
             'admin' => 3,
             'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon,
              'upload_permission' => 'yes',
            'download_permission' => 'yes',
        	]);
		
		DB::table('users')->insert([
        	'name' => 'Firm Rahul',
        	'email' => 'firmrahul@gmail.com',
        	'password' => Hash::make('alhamdulillah'),
             'admin' => 3,
             'updated_at' => new \Carbon\Carbon,
            'created_at' => new \Carbon\Carbon,
              'upload_permission' => 'yes',
            'download_permission' => 'yes',
        	]);

		
    }
}
