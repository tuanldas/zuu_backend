<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pathFileAvatar = 'avatar-user/' . md5('avatar-1' . time()) . '.png';
        Storage::disk('public')->put($pathFileAvatar, file_get_contents(public_path() . '/images/avatar-user/avatar-1.png'));
        $user = User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@tuanld.vn',
            'password' => bcrypt('123123')
        ]);
        UserProfile::factory()->create([
            'user_id' => $user->id,
            'avatar' => 'storage/' . $pathFileAvatar
        ]);
    }
}
