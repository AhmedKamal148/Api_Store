<?php

namespace Tests\controller;

use App\Models\Admin;
use App\Models\Products;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use  WithFaker;

    private $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $admin = User::where('email', 'a@a.com')->first();
        $this->admin = $this->actingAs($admin);
    }

    public function test_can_admin_visit_index_page()
    {
        $response = $this->get('api/products');
        $response->assertStatus(200);
    }

    public function test_can_admin_store_data()
    {
        $data = [
            'ar' => ['name' => 'كرسي'],
            'en' => ['name' => 'chair'],
            'price' => 100,
            'stock' => 1000,
        ];
        $response = $this->post('api/products/store', $data);
        $response->assertStatus(200);
    }

// Begin Validation Tests
    // public function test_arabic_product_name_is_required()
    // {
    //     $data = [
    //         'en' => ['name' => 'ahmed'],
    //         'price' => 111,
    //         'stock' => 100
    //     ];

    //     $response = $this->post('api/products/store', $data);
    //     $response->assertSessionHasErrors();

    // }

    // public function test_english_product_name_is_required()
    // {
    //     $data = [

    //         'ar' => ['name' => 'احمد'],
    //         'price' => 111,
    //         'stock' => 100
    //     ];

    //     $response = $this->post('api/products/store', $data);
    //     $response->assertSessionHasErrors();

    // }

    // public function test_product_price_is_integer()
    // {
    //     $data = [

    //         'ar' => ['name' => 'احمد'],
    //         'en' => ['name' => 'ahmed'],
    //         'price' => 11.1,
    //         'stock' => 100
    //     ];

    //     $response = $this->post('api/products/store', $data);
    //     $response->assertSessionHasErrors();

    // }

    /**
     * @dataProvider data
     */
    public function test_validataionData($data)
    {

        $response = $this->post('api/products/store', $data);
        $response->assertSessionHasErrors();
    }

    public function data()
    {
        return [
            [
                [
                    'ar' => ['name' => 'احمد'],
                    'en' => ['name' => 'ahmed'],
                    'price' => 11.1,
                    'stock' => 100
                ]
            ]
        ];
    }

// End Validation Tests

    /*
     * Is Response Should Be Return  Tow Language Or Based On Local Lang ?
     *
    */
    public function test_can_admin_visit_show_product_page()
    {
        $data = ['product_id' => 1];
        $response = $this->post('api/products/show', $data);
        $response->assertJson([
            'status' => 200,
        ]);
    }


    public function test_can_admin_update_product()
    {
        $product_id = Products::first()->id;

        $data = [
            'product_id' => $product_id,
            'ar' => ['name' => 'كوره'],
            'en' => ['name' => 'ball'],
            'price' => 100000,
            'stock' => 5
        ];

        $response = $this->post('api/products/update', $data);

        $response->assertJson([
            'status' => 200,
            'message' => "Updated Product Successfully"
        ]);
    }


    public function test_can_admin_delete_product()
    {
        $product_id = Products::latest()->first()->id;

        $response = $this->post('api/products/delete',[
            'product_id' => $product_id
        ]);

        $this->assertDeleted('products', ['id' => $product_id]);
    }


}
