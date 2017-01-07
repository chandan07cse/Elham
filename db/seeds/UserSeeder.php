<?php
use Carbon\Carbon;

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {

//        $data = array(
//            array(
//                'email'    => 'freak.arian@gmail.com',
//                'password' => md5('me'),
//                'created_at' => Carbon::now()
//            ),
//            array(
//                'email'    => 'chandan07cse@gmail.com',
//                'password' => md5('chandan07cse@!'),
//                'active' => 1,
//                'created_at' => Carbon::now(),
//            )
//        );


        /*
         * Manual Seeding
         * */
//        $data = array(
//            array(
//                'username'    => 'chandan07cse',
//                'password' => md5('me'),
//                'email' => 'freak.arian@gmail.com'
//            ),
//            array(
//                'username'    => 'freakarian07',
//                'password' => md5('chandan07cse@!'),
//                'email' => 'chandan07cse@gmail.com',
//            )
//        );
        /*
         * As Elham ships with faker, so we can make use of that just like below
         * To know more go to the link https://github.com/fzaninotto/Faker
         * */

        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 4; $i++) {
            $data[] = [

                'username'      => $faker->userName,
                'password'      => md5($faker->password),
                'email'      => $faker->email,
                'image'      => $faker->image($dir = 'public/images',$width = 640, $height = 480),
                'activation_code'=> $faker->randomElement(),
                'active'      => $faker->boolean

            ];
        }

        $this->insert('users', $data);
    }

//        $users = $this->table('users');
//        $users->insert($data)
//              ->save();
    //}
}

