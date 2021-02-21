<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Setting::first();
        if(is_null($setting)){
            $setting = new Setting();
            $setting->application_title = "YouthFire IT";
            $setting->application_credit = "All Rights & Reserved YouthFire IT";
            $setting->developer_url = "http://www.youthfireit.com";
            $setting->copyright_text = "© Copyright YouthFire IT";
            $setting->copyright_text = "© Copyright YouthFire IT";
            $setting->maintenance_words = "© Software Developed By";
            $setting->save();
        }
    }
}
