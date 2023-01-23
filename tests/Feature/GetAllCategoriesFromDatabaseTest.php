<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Categories;
use App\Models\Questions;
use App\Models\Answers;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GetAllCategoriesFromDatabaseTest extends TestCase
{
    use DatabaseTransactions;

    /* @test */
    public function test_user_can_see_categories()
    {
        $response = $this->get('/api/category');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'success',
            'data' => [
                '*' => [
                    'category_id', 'category_name', 'category_desc', 'created_at', 'updated_at'
                ]
            ],
            'message',
        ]);

        $response->assertJson([
            'success' => true,
            'message' => 'User register successfully',
        ]);
    }

    /* @test */
    public function test_user_can_see_all_questions_of_particular_catID()
    {
        $question_catId = Categories::first()->category_id;
        $response = $this->get("/api/questions/$question_catId");

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'success',
            'data' => [
                '*' => [
                    'question_id', 'question_title', 'question_desc', 'question_cat_id', 'question_email', 'created_at', 'updated_at'
                ]
            ]
        ]);

        $response->assertJson([
            'success' => true,
        ]);
    }

    /* @test */
    public function test_user_can_post_answer()
    {
        $user = User::first();
        $questionId = Questions::first()->question_id;
        $response = $this->actingAs($user)->json("post", "api/answer/$questionId", [
            "ans" => "TESTING nowwww",
        ]);

        $response->assertStatus(201);
    }

    /* @test */
    public function test_user_can_see_all_answer_on_particular_questionID()
    {
        $ans_questionId = Answers::first()->ans_que_id;
        $response = $this->get("/api/answer/$ans_questionId");

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'success',
            'data' => [
                '*' => [
                    'ans_id', 'ans', 'ans_que_id', 'ans_email', 'created_at', 'updated_at'
                ]
            ]
        ]);

        $response->assertJson([
            'success' => true,
        ]);
    }


    /* @test */
    public function test_successfully_redirect_to_home_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /* @test */
    // public function test_user_can_post_questions()
    // {
    //     $user = User::first();
    //     $response = $this->actingAs($user, "api")->json("post", "api/questions", [
    //         "title " => "this is new",
    //         "description " => "enw QQQQ",
    //         "ques_cat_id " => 4
    //     ]);

    //     $response->assertStatus(201);
    // }
}