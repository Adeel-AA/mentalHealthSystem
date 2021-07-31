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
        // QuestionCategory 1 - State of mind
        DB::table('question_categories')->insert([
            'user_id' => 1,
            'question_type' => 'My state of mind',
            'purpose' => 'These questions are concerning your feelings, emotions and sense of self worth.'
        ]);

        // Q1
        DB::table('questions')->insert([
            'question_category_id' => 1,
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
            'question_category_id' => 1,
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
            'question_category_id' => 1,
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
        DB::table('answers')->insert([
            'question_id' => 3,
            'answer' => '2',
        ]);
        DB::table('answers')->insert([
            'question_id' => 3,
            'answer' => '3',
        ]);
        DB::table('answers')->insert([
            'question_id' => 3,
            'answer' => '4',
        ]);
        DB::table('answers')->insert([
            'question_id' => 3,
            'answer' => '5',
        ]);
        DB::table('answers')->insert([
            'question_id' => 3,
            'answer' => '6',
        ]);
        DB::table('answers')->insert([
            'question_id' => 3,
            'answer' => '7',
        ]);
        DB::table('answers')->insert([
            'question_id' => 3,
            'answer' => '8',
        ]);
        DB::table('answers')->insert([
            'question_id' => 3,
            'answer' => '9',
        ]);
        DB::table('answers')->insert([
            'question_id' => 3,
            'answer' => '10',
        ]);

        // Q4
        DB::table('questions')->insert([
            'question_category_id' => 1,
            'question' => 'Are you more special than anyone else and in control of everything?',
        ]);
        DB::table('answers')->insert([
            'question_id' => 4,
            'answer' => '0'
        ]);
        DB::table('answers')->insert([
            'question_id' => 4,
            'answer' => '1',
        ]);
        DB::table('answers')->insert([
            'question_id' => 4,
            'answer' => '2',
        ]);
        DB::table('answers')->insert([
            'question_id' => 4,
            'answer' => '3',
        ]);
        DB::table('answers')->insert([
            'question_id' => 4,
            'answer' => '4',
        ]);
        DB::table('answers')->insert([
            'question_id' => 4,
            'answer' => '5',
        ]);
        DB::table('answers')->insert([
            'question_id' => 4,
            'answer' => '6',
        ]);
        DB::table('answers')->insert([
            'question_id' => 4,
            'answer' => '7',
        ]);
        DB::table('answers')->insert([
            'question_id' => 4,
            'answer' => '8',
        ]);
        DB::table('answers')->insert([
            'question_id' => 4,
            'answer' => '9',
        ]);
        DB::table('answers')->insert([
            'question_id' => 4,
            'answer' => '10',
        ]);

        // QuestionCategory 2 - My involvement with life and others
        DB::table('question_categories')->insert([
            'user_id' => 1,
            'question_type' => 'My involvement with life and others',
            'purpose' => 'These questions are concerning your motivation, taking part, social world, daily life, drink and drugs.'
        ]);

        // Q1
        DB::table('questions')->insert([
            'question_category_id' => 2,
            'question' => 'Are you concerned about your motivation in life and how much you engage with other people and activities?',

        ]);
        DB::table('answers')->insert([
            'question_id' => 5,
            'answer' => 'Yes',

        ]);
        DB::table('answers')->insert([
            'question_id' => 5,
            'answer' => 'No',

        ]);

        // Q2
        DB::table('questions')->insert([
            'question_category_id' => 2,
            'question' => 'Are you concerned about anything in your social context (relationships, your home, finances, employment, or any changes for the worse)?',

        ]);
        DB::table('answers')->insert([
            'question_id' => 6,
            'answer' => 'Yes',

        ]);
        DB::table('answers')->insert([
            'question_id' => 6,
            'answer' => 'No',

        ]);

        // Q3
        DB::table('questions')->insert([
            'question_category_id' => 2,
            'question' => 'Are you concerned about how you are and things you are doing at the moment (eg risk-taking, sleep patterns, daily activities, losing your temper with people)?',

        ]);
        DB::table('answers')->insert([
            'question_id' => 7,
            'answer' => 'Yes',

        ]);
        DB::table('answers')->insert([
            'question_id' => 7,
            'answer' => 'No',

        ]);

        // Q4
        DB::table('questions')->insert([
            'question_category_id' => 2,
            'question' => 'Do you have a history of misusing drugs or alcohol?',

        ]);
        DB::table('answers')->insert([
            'question_id' => 8,
            'answer' => 'Yes',

        ]);
        DB::table('answers')->insert([
            'question_id' => 8,
            'answer' => 'No',

        ]);
        DB::table('answers')->insert([
            'question_id' => 8,
            'answer' => "Don't know",

        ]);

        // QuestionCategory 3 - My health and care
        DB::table('question_categories')->insert([
            'user_id' => 1,
            'question_type' => 'My health and care',
            'purpose' => 'These questions are concerning your mental health (history of mental health issues), physical health and care (current treatment for health problems)'
        ]);

        // Q1
        DB::table('questions')->insert([
            'question_category_id' => 3,
            'question' => 'Do you have any history of depression, mania, hallucinations, or delusions?',

        ]);
        DB::table('answers')->insert([
            'question_id' => 9,
            'answer' => 'Yes',

        ]);
        DB::table('answers')->insert([
            'question_id' => 9,
            'answer' => 'No',

        ]);
        DB::table('answers')->insert([
            'question_id' => 9,
            'answer' => "Don't know",

        ]);

        // Q2
        DB::table('questions')->insert([
            'question_category_id' => 3,
            'question' => 'Are you concerned about how any physical health problems are affecting you?',

        ]);
        DB::table('answers')->insert([
            'question_id' => 10,
            'answer' => 'Yes',

        ]);
        DB::table('answers')->insert([
            'question_id' => 10,
            'answer' => 'No',

        ]);

        // Q3
        DB::table('questions')->insert([
            'question_category_id' => 3,
            'question' => 'Are you having any treatment for health problems?',

        ]);
        DB::table('answers')->insert([
            'question_id' => 11,
            'answer' => 'Yes',

        ]);
        DB::table('answers')->insert([
            'question_id' => 11,
            'answer' => 'No',

        ]);

        // QuestionCategory 4 - My personality and way of thinking
        DB::table('question_categories')->insert([
            'user_id' => 1,
            'question_type' => 'My personality and way of thinking',
            'purpose' => 'These questions are concerning personality issues, thinking/memory (problems with thinking, memory, or concentration) and understanding risk and responsibility (problems with understanding risk and responsibility)'
        ]);

        // Q1
        DB::table('questions')->insert([
            'question_category_id' => 4,
            'question' => 'Do you think your personality causes difficulties in your life?',

        ]);
        DB::table('answers')->insert([
            'question_id' => 12,
            'answer' => 'Yes',

        ]);
        DB::table('answers')->insert([
            'question_id' => 12,
            'answer' => 'No',

        ]);

        // Q2
        DB::table('questions')->insert([
            'question_category_id' => 4,
            'question' => 'Do you have problems with being able to think clearly, remember things, or concentrate?',

        ]);
        DB::table('answers')->insert([
            'question_id' => 13,
            'answer' => 'Yes',

        ]);
        DB::table('answers')->insert([
            'question_id' => 13,
            'answer' => 'No',

        ]);
        DB::table('answers')->insert([
            'question_id' => 13,
            'answer' => "Don't know",

        ]);

        // Q3
        DB::table('questions')->insert([
            'question_category_id' => 4,
            'question' => 'Do you find it hard to understand why you behave as you do and your impact on other people?',

        ]);
        DB::table('answers')->insert([
            'question_id' => 14,
            'answer' => 'Yes',

        ]);
        DB::table('answers')->insert([
            'question_id' => 14,
            'answer' => 'No',

        ]);

        // QuestionCategory 5 - My life journey (bad events in my life journey)
        DB::table('question_categories')->insert([
            'user_id' => 1,
            'question_type' => 'My life journey (bad events in my life journey)',
            'purpose' => 'These questions are concerning the environment you grew up in, school days, easting disorders and traumatic experiences'
        ]);

        // Q1
        DB::table('questions')->insert([
            'question_category_id' => 5,
            'question' => 'Have bad things happened to you in your life (eg abuse, trouble with the law, serious injury, difficult childhood/education, eating disorders)?',

        ]);
        DB::table('answers')->insert([
            'question_id' => 15,
            'answer' => 'Yes',

        ]);
        DB::table('answers')->insert([
            'question_id' => 15,
            'answer' => 'No',

        ]);
        DB::table('answers')->insert([
            'question_id' => 15,
            'answer' => "Don't know",

        ]);

        // QuestionCategory 6 - Keeping safe
        DB::table('question_categories')->insert([
            'user_id' => 1,
            'question_type' => 'Keeping safe',
            'purpose' => 'These questions are concerning vulnerability, self-neglect, self-harm, harming others, damaging property and suicide'
        ]);

        // Q1
        DB::table('questions')->insert([
            'question_category_id' => 6,
            'question' => 'Are you concerned about your vulnerability?',

        ]);
        DB::table('answers')->insert([
            'question_id' => 16,
            'answer' => 'Yes',

        ]);
        DB::table('answers')->insert([
            'question_id' => 16,
            'answer' => 'No',

        ]);

        // Q2
        DB::table('questions')->insert([
            'question_category_id' => 6,
            'question' => 'Are you showing signs of not looking after yourself very well?',

        ]);
        DB::table('answers')->insert([
            'question_id' => 17,
            'answer' => 'Yes',

        ]);
        DB::table('answers')->insert([
            'question_id' => 17,
            'answer' => 'No',

        ]);
        DB::table('answers')->insert([
            'question_id' => 17,
            'answer' => "Don't know",

        ]);

        // Q3
        DB::table('questions')->insert([
            'question_category_id' => 6,
            'question' => 'Are you concerned about harming yourself?',

        ]);
        DB::table('answers')->insert([
            'question_id' => 18,
            'answer' => 'Yes',

        ]);
        DB::table('answers')->insert([
            'question_id' => 18,
            'answer' => 'No',

        ]);

        // Q4
        DB::table('questions')->insert([
            'question_category_id' => 6,
            'question' => 'Are you concerned about causing harm to others or any other destructive behaviour?',

        ]);
        DB::table('answers')->insert([
            'question_id' => 19,
            'answer' => 'Yes',

        ]);
        DB::table('answers')->insert([
            'question_id' => 19,
            'answer' => 'No',

        ]);

        // Q5
        DB::table('questions')->insert([
            'question_category_id' => 6,
            'question' => 'Are you concerned about wanting to end your life?',

        ]);
        DB::table('answers')->insert([
            'question_id' => 20,
            'answer' => 'Yes',

        ]);
        DB::table('answers')->insert([
            'question_id' => 20,
            'answer' => 'No',

        ]);


    }
}
