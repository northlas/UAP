<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        $user = new User();
        $user->role_id = 1;
        $user->name = "admin";
        $user->email = "admin@gmail.com";
        $user->password = '$2y$10$2/6Ny9roCbmUw5noW3ydvOIGdnCJUoU5tgaXC4p6UpaN6bWHHjpyK';
        $user->save();

        $user = new User();
        $user->role_id = 2;
        $user->name = "user1";
        $user->email = "user1@gmail.com";
        $user->password = '$2y$10$d13ch85RzUDTObDVOi3IoOm1YswO4KxpCs11clM.kHGdcUUg8lMji';
        $user->save();

        $user = new User();
        $user->role_id = 2;
        $user->name = "user2";
        $user->email = "user2@gmail.com";
        $user->password = '$2y$10$c2MVSCBGAK4j0nNSUFgENu7peAGDKqHJu8yOFPZsKddqVgVCke8gi';
        $user->save();
    }
}
