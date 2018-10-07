<?php

use App\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = [
            [
                'title'       => 'PHP developer Required',
                'email'       => 'testemail@gmail.com',
                'detail' => 'This is test description',
                'is_verified' => true,
            ],
            [
                'title'       => 'Laravel developer Required',
                'email'       => 'testemail2@gmail.com',
                'detail'      => 'This is test description',
                'is_verified' => true,
            ],
            [
                'title'       => 'React JS developer Required',
                'email'       => 'testemail3@gmail.com',
                'detail'      => 'This is test description',
                'is_verified' => true,
            ],
            [
                'title'       => 'Python developer Required',
                'email'       => 'testemail4@gmail.com',
                'detail'      => 'This is test description',
                'is_verified' => true,
            ],
            [
                'title'       => 'Angular JS developer Required',
                'email'       => 'testemail5@gmail.com',
                'detail'      => 'This is test description',
                'is_verified' => true,
            ],
        ];
        foreach ($jobs as $job) {
            Job::updateOrCreate($job);
        }
    }
}
