<?php

class RandomNumberControllerTest extends TestCase
{
    public function testGetRandomNumber(): void
    {
        $this->json('GET', 'api/random-number/d20ae04725ecdde4882f307c844deef0/10/20')
            ->seeJsonStructure([
                'randomNumber'
            ]);

        $this->get('api/random-number/wronghash/10/20')
            ->assertResponseStatus(400);
    }
}
