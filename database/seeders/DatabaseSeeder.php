<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public static function run(): void
    {
        UserSeeder::run();
        GradebookSeeder::run();
        StudentSeeder::run();
        CommentSeeder::run();
    }
}
