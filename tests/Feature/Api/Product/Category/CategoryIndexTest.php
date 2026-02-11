<?php

namespace Tests\Feature\Api\Product\Category;

use App\Models\Product\Category;
use Tests\TestCase;

class CategoryIndexTest extends TestCase
{
    public function test_index_returns_paginated_categories()
    {
        Category::factory()->count(15)->create();

        $response = $this->withHeaders([
//            'Authorization' => 'Bearer ' . env('ACCESS_TOKEN'),
        ])->getJson('/api/product/categories');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'result',
            'request_uuid',
            'data' => [
                [
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                ],
            ],
            'pagination' => [
                'total', 'count', 'per_page', 'current_page', 'total_pages'
            ],

        ]);
    }

    public function test_index_applies_sorting_and_pagination()
    {
        Category::factory()->count(20)->create();

        $response = $this->withHeaders([
//            'Authorization' => 'Bearer ' . env('ACCESS_TOKEN'),
        ])->getJson('/api/product/categories?sort_field=name&sort_direction=1&per_page=5');

        $response->assertStatus(200)
            ->assertJsonPath('pagination.per_page', 5)
            ->assertJsonPath('pagination.current_page', 1);
    }

}
