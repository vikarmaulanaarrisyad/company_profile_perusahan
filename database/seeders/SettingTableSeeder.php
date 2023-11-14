<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::query()->updateOrCreate(
            [
                'email' => 'support@company.com'
            ],
            [
                'email' => 'support@company.com',
                'phone' => '087777',
                'phone_hours' => 'Senin - Jum\'at, 08:00 s/d 16:00',
                'owner_name' => 'Administrator',
                'company_name' => 'CV. Telaga Mandiri',
                'short_description' => '-',
                'keyword' => '-',
                'about' => '-',
                'address' => '-',
                'postal_code' => 12345,
                'city' => '-',
                'province' => '-',
                'instagram_link' => '-',
                'twitter_link' => '-',
                'fanpage_link' => '-',
                'youtube_link' => '-',
                'linkedin_link' => '-',
                'linkedin_link' => '-',
            ]
        );
    }
}
