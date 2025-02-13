<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_product_creation() {
        // $response = $this->postJson('/api/products', [
        //     'name' => 'Sample Product',
        //     'description' => 'Sample Description',
        //     'sku' => 'SKU12345',
        //     'price' => 100.99,
        //     'category_id' => 1
        // ]);
        // $response->assertStatus(201);
        // ✅ Create a category first
        $category = Category::factory()->create();

        // ✅ Use the created category ID
        $response = $this->postJson('/api/products', [
            'name' => 'Sample Product',
            'description' => 'Sample Description',
            'sku' => 'SKU12345',
            'price' => 100.99,
            'category_id' => $category->id, // Correct category ID
        ]);

        $response->assertStatus(201);
    }

}
