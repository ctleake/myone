<?php

use Illuminate\Database\Seeder;
use App\Member;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++)
        {
            Member::create
            (
                [
                    'name' => "Member $i",
                    'email' => "member$i@gmail.com",
                    'phone' => "phone $i",
                    'country' => "country $i"
                ]
            );
        }
    }
}
