<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator;
use Faker\Factory;

class UserSeeder extends Seeder
{

    public function getData(){
        for ($i = 0; $i < 1000; $i++) {
            yield [
                'name' => $this->faker->name,
                'first_name' => $this->faker->firstName,
                'last_name' => $this->faker->lastName,
                'email' => $this->faker->firstName . $this->faker->unique()->freeEmail,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ];
        }
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Factory::create();
        $count = 0;
        for ($i=0; $i < 1000000/1000; $i++) {

            fwrite(STDOUT, "not real: " . (memory_get_peak_usage(false) / 1024 / 1024) . " MiB" . PHP_EOL);
            fwrite(STDOUT, "real: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MiB" . PHP_EOL);

            try {
                $data = $this->getData();
                foreach ($data as $value) {
                    $dataArr[] = $value;
                }
                User::insert($dataArr);
                fwrite(STDOUT, "1000 not real: " . (memory_get_peak_usage(false) / 1024 / 1024) . " MiB". PHP_EOL);
                fwrite(STDOUT, "1000 real: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MiB" . PHP_EOL);
                $data = [];
                $dataArr = [];
                $count = 0;
            } catch (\Exception $e) {
                \Log::warning('seed data error: '. $e->getMessage());
            }
        }

    }
}
