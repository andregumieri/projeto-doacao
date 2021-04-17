<?php

use Laravel\Lumen\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }


    /**
     * Adds accept header with application/json by default
     *
     * @param string $method
     * @param string $uri
     * @param array $parameters
     * @param array $cookies
     * @param array $files
     * @param array $server
     * @param null $content
     * @return \Illuminate\Http\Response|void
     */
    public function call($method, $uri, $parameters = [], $cookies = [], $files = [], $server = [], $content = null)
    {
        $server['HTTP_ACCEPT'] = 'application/json';
        parent::call($method, $uri, $parameters, $cookies, $files, $server, $content);
    }

    /**
     * Dumps the reponse content
     */
    public function dump()
    {
        print_r($this->response->content());
    }
}
