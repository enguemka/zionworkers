<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Marilyn Sipa',
            'email' => 'marilynsipa@gmail.com',
            'role_id' => 1,
            'password' => '$2y$10$QEGdsxdbQnHFp8gLQmDfL./F9ts.Acl21KOtOVE8iRJH.HlZ9lEBW'
        ]);

        \App\User::create([
            'name' => 'Zion Drake',
            'email' => 'zion.j.drake@gmail.com',
            'role_id' => 1,
            'password' => '$2y$10$BTad7WvEIswMapuZEi4GRugeX3tNvSjNfVBjiKr1./WoY61wNJbI2'
        ]);

        \App\User::create([
            'name' => 'Moira',
            'email' => 'rmoirakellylee@gmail.com',
            'role_id' => 1,
            'password' => '$2y$10$8hPAH8eCru0YDFAxpg.3M.ZPqsjKNIIznr10AH4pnA5x6rg3STzOS'
        ]);

        \App\User::create([
            'name' => 'Lisabeth Smith',
            'email' => 'nanaarabaaduama@gmail.com',
            'role_id' => 1,
            'password' => '$2y$10$sWNtKwEePQwOZGHmmSktYu/whKuSx0hw7SVi.m5hxWzAbJSBwXSQO'
        ]);

        \App\User::create([
            'name' => 'Isabel',
            'email' => 'isabelmwila4@gmail.com',
            'role_id' => 1,
            'password' => '$2y$10$pXhQM5oKRSqdQSZ0PKo7S.PchKgNBgd8mLlK2u9xct99G/GUy55HC'
        ]);

        \App\User::create([
            'name' => 'Leni',
            'email' => 'leniching.01@gmail.com',
            'role_id' => 1,
            'password' => '$2y$10$ePBFHVQxruPRexOpKQh4E.rQWQoCurWR9yTY74lXL6pJA5FDN89uy'
        ]);

        \App\User::create([
            'name' => 'Tope',
            'email' => 'temitopefaronbi@gmail.com',
            'role_id' => 1,
            'password' => '$2y$10$8g6sV6o68iq0LVl54RS34O6RKOsWEe7e8dD7O08WF2bWJs8KUdBHK'
        ]);

        \App\User::create([
            'name' => 'Rajunor Tom',
            'email' => 'realmissyraj@yahoo.com',
            'role_id' => 1,
            'password' => '$2y$10$lO3dm7MIe.qfTAcAWCMGmOKaTB1Zhzsh4GAIDvr.hBxeS20Yp5zyC'
        ]);

        \App\User::create([
            'name' => 'Michaela',
            'email' => 'michaela.viljoen@outlook.com',
            'role_id' => 1,
            'password' => '$2y$10$8DK0Smw7O0yCyrd4E51zlO8afzHA/JsoiEfnqsKQF8KIiaKg2KH6u'
        ]);

        \App\User::create([
            'name' => 'Oladiran',
            'email' => 'oladiranoye@gmail.com',
            'role_id' => 1,
            'password' => '$2y$10$xSmtXzl5XqqeWAZKssw9reEnuK9NphaJlx5fNOjCvME.44a5yVG7O'
        ]);

        \App\User::create([
            'name' => 'Agbor Jeff',
            'email' => 'ojongjeff7@gmail.com',
            'role_id' => 1,
            'password' => '$2y$10$dtHzRNHtijMBAdRJOM0CsOVUiDHF35EQWZ0aXyBZ4ULxr8GN5Vs.q'
        ]);

        \App\User::create([
            'name' => 'Maryanne kinyua',
            'email' => 'maryanne.kinyua@gmail.com',
            'role_id' => 1,
            'password' => '$2y$10$fKa10AvDnhEVVIg73PFRzeJIwlj9TsNbCNgzo3fOdqgWua7BKKKwW'
        ]);
    }
}
