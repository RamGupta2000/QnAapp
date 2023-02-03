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
        $user = User::first();
        $response = $this->actingAs($user)->get('/api/category');

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
            'message' => 'Categories fetched Successfully',
        ]);
    }

    /* @test */
    public function test_user_can_post_questions()
    {
        $user = User::first();
        $Cat_id = Categories::first()->category_id;
        $response = $this->actingAs($user)->json("post", "api/questions", [
            "title" => "Test Title",
            "description" => "Test Description",
            "ques_cat_id" => $Cat_id
        ]);

        $response->assertStatus(201);
    }

    /* @test */
    public function test_user_cannot_fetch_questions_whose_cat_id_not_exist()
    {
        $user = User::first();

        $maxID = Categories::max('category_id');
        $randomID = $maxID + rand(1, 1000);
        $response = $this->actingAs($user)->json("get", "api/questions/$randomID");

        $response->assertStatus(500);
        $response->assertJsonStructure([
            'error',
        ]);

        $response->assertJson([
            'error' => 'Category_id does not exist',
        ]);
    }

    /* @test */
    public function test_user_cannot_post_questions_whose_cat_id_not_exist()
    {
        $user = User::first();

        $maxID = Categories::max('category_id');
        $randomID = $maxID + rand(1, 1000);

        $response = $this->actingAs($user)->json("post", "api/questions", [
            "title" => "Test Title",
            "description" => "Test Description",
            "ques_cat_id" => $randomID,
        ]);

        $response->assertStatus(500);
        $response->assertJsonStructure([
            'error',
        ]);

        $response->assertJson([
            'error' => 'Category_id does not exist',
        ]);
    }

    /* @test */
    public function test_user_can_post_answer()
    {
        $user = User::first();
        $questionId = Questions::first()->question_id;
        $response = $this->actingAs($user)->json("post", "api/answer/$questionId", [
            "ans" => "TESTING",
        ]);

        $response->assertStatus(201);
    }

    /* @test */
    public function test_user_cannot_fetch_answer_whose_question_id_not_exist()
    {
        $user = User::first();
        $maxID = Questions::max('question_id');
        $randomID = $maxID + rand(1, 1000);
        $response = $this->actingAs($user)->json("get", "api/answer/$randomID");

        $response->assertStatus(500);
        $response->assertJsonStructure([
            'error',
        ]);

        $response->assertJson([
            'error' => 'Question_id does not exist',
        ]);
    }

    /* @test */
    public function test_user_cannot_post_answer_whose_question_id_not_exist()
    {
        $user = User::first();
        $maxID = Questions::max('question_id');
        $randomID = $maxID + rand(1, 1000);
        $response = $this->actingAs($user)->json("post", "api/answer/$randomID", [
            "ans" => "Test answer",
        ]);

        $response->assertStatus(500);
        $response->assertJsonStructure([
            'error',
        ]);

        $response->assertJson([
            'error' => 'Question_id does not exist',
        ]);
    }

    /* @test */
    public function test_successfully_redirect_to_home_page()
    {

        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /* @test */
    public function test_user_can_delete_question_posted_by_him()
    {
        $questionID = Questions::first()->question_id;
        $user = User::first();
        $response = $this->actingAs($user)->delete("api/delete-question/$questionID");

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message',
        ]);

        $response->assertJson([
            'message' => 'Question deleted successfully.',
        ]);
    }

    /* @test */
    public function test_user_cannot_delete_question_whose_question_id_not_exist()
    {
        $user = User::first();
        $maxID = Questions::max('question_id');
        $randomID = $maxID + rand(1, 1000);
        $response = $this->actingAs($user)->delete("api/delete-question/$randomID");

        $response->assertStatus(404);

        $response->assertJsonStructure([
            'error',
        ]);

        $response->assertJson([
            'error' => 'Question_id not found.',
        ]);
    }

    /* @test */
    public function test_user_can_delete_answer_posted_by_him()
    {
        $ans_Id = Answers::first()->ans_id;
        $user = User::first();
        $response = $this->actingAs($user)->delete("api/delete-answer/$ans_Id");

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message',
        ]);

        $response->assertJson([
            'message' => 'Answer deleted successfully.',
        ]);
    }

    /* @test */
    public function test_user_cannot_delete_answer_whose_ans_id_not_exists()
    {
        $user = User::first();

        $maxID = Answers::max('ans_id');
        $randomID = $maxID + rand(1, 1000);
        $response = $this->actingAs($user)->delete("api/delete-answer/$randomID");

        $response->assertStatus(404);
        $response->assertJsonStructure([
            'error',
        ]);

        $response->assertJson([
            'error' => 'Answer_id not found.',
        ]);
    }

    /* @test */
    public function test_user_can_see_all_questions_of_particular_cat_id()
    {
        $user = User::first();

        $question_catId = Categories::first()->category_id;
        $response = $this->actingAs($user)->get("/api/questions/$question_catId");

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
    public function test_user_can_see_all_answer_on_particular_question_id()
    {
        $user = User::first();

        $ans_questionId = Answers::first()->ans_que_id;
        $response = $this->actingAs($user)->get("/api/answer/$ans_questionId");

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
}