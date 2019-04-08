<?php

class RandomNumberControllerTest extends TestCase
{
    public function testGetRandomNumber(): void
    {
        $this->json('GET', 'api/random-number?secret=some_secret_key&min=10&max=20')
            ->seeJsonStructure([
                'randomNumber'
            ]);

        $this->get('api/random-number?secret=wrongSecret&min=10&max=20')
            ->assertResponseStatus(400);

        $this->get('api/random-number?secret=some_secret_key&min=10&max=')
            ->assertResponseStatus(400);

        $this->get('api/random-number?secret=some_secret_key&max=20')
            ->assertResponseStatus(400);

        $this->get('api/random-number?secret=some_secret_key&min=10&max=5')
            ->assertResponseStatus(500);
    }
}
