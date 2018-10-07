<?php

use App\JobSkill;
use Illuminate\Database\Seeder;

class JobSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            'PHP',
            'Laravel',
            'JavaScript',
            'HTML',
            'CSS',
            'Python',
            'Django',
            'React Js',
            'Vue JS',
            'Node JS',
            'Angular JS'
        ];

        foreach($skills as $skill) {
            JobSkill::updateOrCreate(['name' => $skill]);
        }
    }
}
