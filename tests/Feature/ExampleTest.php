<?php

it('tests the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(302);
});
