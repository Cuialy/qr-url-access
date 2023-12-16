<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Repositories\SettingRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settingRepository = new SettingRepository();
        if (!$settingRepository->get(['key' => 'site_name'],false)->first()) {
            $settingRepository->store([
                'key' => 'site_name',
                'value' => 'Fast And Security QR and URL Shortener',
            ]);
        }
        if (!$settingRepository->get(['key' => 'site_desc'],false)->first()) {
            $settingRepository->store([
                'key' => 'site_desc',
                'value' => 'User-friendly, swift, and secure QR code generation and URL shortening platform. Share your websites and links quickly!',
            ]);
        }
        if (!$settingRepository->get(['key' => 'site_keywords'],false)->first()) {
            $settingRepository->store([
                'key' => 'site_keywords',
                'value' => 'QR code generator, link shortener, secure URL, quick QR code, web link sharing, short URL service, online link shortener',
            ]);
        }
        if (!$settingRepository->get(['key' => 'site_author'],false)->first()) {
            $settingRepository->store([
                'key' => 'site_author',
                'value' => 'Cuialy Software',
            ]);
        }
    }
}
