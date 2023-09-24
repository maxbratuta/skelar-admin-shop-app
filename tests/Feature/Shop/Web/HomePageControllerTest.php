<?php

namespace Tests\Feature\Shop\Web;

use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class HomePageControllerTest extends TestCase
{
    public function test_home_page_index()
    {
        $response = $this->get(route('shop.web.home.index'));

        $response->assertOk();
        $response->assertInertia(fn (AssertableInertia $page) => $page->component('Shop/Home'));
    }
}
