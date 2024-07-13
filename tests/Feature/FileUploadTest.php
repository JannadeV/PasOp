<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

test('files can be uploaded', function () {
    Storage::fake('public');

    $file = UploadedFile::fake()->image('hondje.jpg');

    $response = $this->post('/upload', [
        'foto' => $file,
    ]);

    $response->assertStatus(200);

    $path = json_decode($response->getContent(), true)['path'];

    Storage::disk('public')->assertExists($path);
});
