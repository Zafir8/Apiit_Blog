<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;

uses(RefreshDatabase::class);

beforeEach(function () {
    // Assuming you have a factory for Posts
    Post::factory()->count(5)->create();
});

test('Focus Room button redirects to the correct form', function () {
    $response = $this->get('/');
    $response->assertSee('FOCUS ROOM')
        ->assertSee('https://forms.office.com/Pages/ResponsePage.aspx?id=vnsShoAUrkevNR_ModMj5MRdGLgV-01LkdjXpXD5ZmhUNExBVU8zNzdOVkVPSzJMRkZSTURCQTNDNi4u')
        ->assertSee('href="https://forms.office.com/Pages/ResponsePage.aspx?id=vnsShoAUrkevNR_ModMj5MRdGLgV-01LkdjXpXD5ZmhUNExBVU8zNzdOVkVPSzJMRkZSTURCQTNDNi4u"', false);
});

test('Blogger button redirects to the correct form', function () {
    $response = $this->get('/');
    $response->assertSee('BLOGGER')
        ->assertSee('https://forms.office.com/Pages/ResponsePage.aspx?id=vnsShoAUrkevNR_ModMj5MRdGLgV-01LkdjXpXD5ZmhUQlU2SEVVQjVGVE42TEM5R1kzMFFJVEJZVy4u')
        ->assertSee('href="https://forms.office.com/Pages/ResponsePage.aspx?id=vnsShoAUrkevNR_ModMj5MRdGLgV-01LkdjXpXD5ZmhUQlU2SEVVQjVGVE42TEM5R1kzMFFJVEJZVy4u"', false);
});

test('Events button uses the correct route', function () {
    $response = $this->get('/');
    $response->assertSee('EVENTS')
        ->assertSee('href="' . route('events.index') . '"', false);
});
