<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assessment 1 - State of mind
        DB::table('assessments')->insert([
            'user_id' => 1,
            'question_type' => 'My state of mind',
            'purpose' => 'These questions are concerning your feelings, emotions and sense of self worth.'
        ]);

        // Q1
        DB::table('questions')->insert([
            'assessment_id' => 1,
            'question' => 'Are you concerned about how you are feeling at the moment?',

        ]);
        DB::table('answers')->insert([
            'question_id' => 1,
            'answer' => 'Yes',

        ]);
        DB::table('answers')->insert([
            'question_id' => 1,
            'answer' => 'No',

        ]);

        // Q2
        DB::table('questions')->insert([
            'assessment_id' => 1,
            'question' => 'Are you concerned about your sense of self worth?',

        ]);
        DB::table('answers')->insert([
            'question_id' => 2,
            'answer' => 'Yes',

        ]);
        DB::table('answers')->insert([
            'question_id' => 2,
            'answer' => 'No',

        ]);

        // Q3
        DB::table('questions')->insert([
            'assessment_id' => 1,
            'question' => 'Do you feel valued and worthwhile?',

        ]);
        DB::table('answers')->insert([
            'question_id' => 3,
            'answer' => '0'

        ]);
        DB::table('answers')->insert([
            'question_id' => 3,
            'answer' => '1',

        ]);
    }
}
