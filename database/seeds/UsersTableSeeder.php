<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::where('email','khloodkhaled@yahoo.com')->first();
        if(!$user){
        	User::create([
'name' => 'khlood' ,
'email' => 'khloodkhaled@yahoo.com',
'role' => 'admin',
'password' => bcrypt('password'),
        	]);
        }
    }
}
