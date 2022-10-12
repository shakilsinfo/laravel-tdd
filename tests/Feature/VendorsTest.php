<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
USE App\Models\ETVendor;
use Webpatser\Uuid\Uuid;
use Auth;
class VendorsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    

   

    public function a_user_can_create_vendor()
    {
        
        $createVendor = ETVendor::factory()->create();
        $findVendor = ETVendor::where('id',$createVendor->id)->first();

        $this->assertInstanceOf(ETVendor::class, $findVendor);
        $this->assertEquals($findVendor->name, $createVendor->name);
        $this->assertEquals($findVendor->email, $createVendor->email);
        $this->assertEquals($findVendor->contact_no, $createVendor->contact_no);

    }
    
    public function a_user_can_read_all_vendor(){

        $createVendor = ETVendor::factory()->create();

        $viewAllVendor = $this->get('/vendors');

        $viewAllVendor->assertSee($createVendor->name, $escaped = false);
        
    }

    public function a_user_can_update_vendor(){

        $createVendor = ETVendor::factory()->create();

        $updatevendor['name'] = 'something';
        $createVendor->update($updatevendor);
        $this->assertDatabaseHas('et_vendors',['id'=>$createVendor->id]);

    }

    public function a_user_can_delete_vendor(){

        //$createVendor = ETVendor::factory()->create();
        // $this->actingAs(ETVendor::factory()->create());
        $deleteVendor = ETVendor::factory()->create();
        ETVendor::find($deleteVendor->id)->delete();

        $this->assertDatabaseMissing('et_vendors',['id'=>$deleteVendor->id]);

    }
    
    
    
}
