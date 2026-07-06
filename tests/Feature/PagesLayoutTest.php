<?php

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Industry;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed();
});

test('home page loads', function () {
    $this->get(route('home'))->assertStatus(200);
});

test('about page loads', function () {
    $this->get(route('about.index'))->assertStatus(200);
});

test('products index loads', function () {
    $this->get(route('products.index'))->assertStatus(200);
});

test('product detail page loads', function () {
    $product = Product::first();
    $this->get(route('products.show', $product->slug))->assertStatus(200);
});

test('category show page loads', function () {
    $category = Category::first();
    $this->get(route('categories.show', $category->slug))->assertStatus(200);
});

test('industries index page loads', function () {
    $this->get(route('industries.index'))->assertStatus(200);
});

test('industry show page loads', function () {
    $industry = Industry::first();
    $this->get(route('industries.show', $industry->slug))->assertStatus(200);
});

test('blogs index page loads', function () {
    $this->get(route('blogs.index'))->assertStatus(200);
});

test('blog show page loads', function () {
    $post = BlogPost::first() ?? BlogPost::factory()->create();
    $this->get(route('blogs.show', $post->slug))->assertStatus(200);
});

test('contact index page loads', function () {
    $this->get(route('contact.index'))->assertStatus(200);
});

test('galleries index page loads', function () {
    $this->get(route('galleries.index'))->assertStatus(200);
});

test('downloads index page loads', function () {
    $this->get(route('downloads.index'))->assertStatus(200);
});

test('certificates index page loads', function () {
    $this->get(route('certificates.index'))->assertStatus(200);
});
