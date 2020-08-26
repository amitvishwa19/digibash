<?php

use App\User;
use App\Models\Profile;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;


class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //SUper Admin
        $superAdmin = User::create(
            [
                'firstname' => 'Super',
                'lastname' => 'Admin',
                'username' => 'superadmin',
                'email' => 'admin@admin.com',
                'mobile' => '0000000000',
                'type' => 'user',
                'password' => bcrypt('password'),
                'api_token' => hash('sha256', Str::random(60)),
                'verify_token' => Str::random(60),
            ]
        );
        $superAdmin->assignRole('Super Admin');
        $profile = Profile::create(['user_id' => $superAdmin->id]);

        $user = User::create(
            [
                'firstname' => 'Simple',
                'lastname' => 'user',
                'username' => 'simpleuser',
                'email' => 'user@user.com',
                'type' => 'user',
                'mobile' => '0000000000',
                'password' => bcrypt('password'),
                'api_token' => hash('sha256', Str::random(60)),
                'verify_token' => Str::random(60),
            ]
        );
        $profile = Profile::create(['user_id' => $user->id]);


        $faker = Faker\Factory::create();

        for($i=1; $i <= 2; $i++){

            //Create Student
            $student = User::create([
                'firstname' => $name = $faker->firstName,
                'lastname' => $name = $faker->lastname,
                'email' => $faker->email,
                'mobile' => '0000000000',
                'type' => 'student',
                'password' => bcrypt('password'),
                'api_token' => hash('sha256',Str::random(60)),
                'verify_token' => Str::random(60),
            ]);
            $student->assignRole('student');
            $profile = Profile::create(['user_id' => $student->id]);
            $student_profile = Student::create(['user_id' => $student->id,'section_id' => $faker->numberBetween(1,Section::count())]);

            //Create Teachers
            $teacher = User::create([
                'firstname' => $name = $faker->firstName,
                'lastname' => $name = $faker->lastname,
                'email' => $faker->email,
                'mobile' => '0000000000',
                'type' => 'teacher',
                'password' => bcrypt('password'),
                'api_token' => hash('sha256',Str::random(60)),
                'verify_token' => Str::random(60),
            ]);
            $teacher->assignRole('teacher');
            $profile = Profile::create(['user_id' => $teacher->id]);
            $teacher_profile = Teacher::create(['user_id' => $teacher->id]);


        };



        /*$profile = Profile::create(
            [
                'user_id' => $user->id,
            ]
        );
        $user->assignRole('superadmin');*/

        /*$faker = Faker\Factory::create();

      	for($i=0; $i < 4; $i++){


      		$user = User::create([
      			'name' => $name = $faker->name,
      		    'email' => $faker->email,
      			'password' => bcrypt('password'),
                'api_token' => hash('sha256',Str::random(60)),
                'verify_token' => Str::random(60),
      		]);

          $profile = Profile::create(
              [
                  'user_id' => $user->id,
              ]
          );*/


      	//}
    }
}
