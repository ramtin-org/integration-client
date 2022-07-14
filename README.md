# Integration Client
A PHP client package that helps to interact with Yaraplus integration API.

## installation
```shell
composer require yaraplus/integration-client
```

### Laravel applications
If your applications uses [Laravel framework](https://laravel.com) then copy this array item into your `config/services.php`:
```injectablephp
'integration_client' => [
    'api_key' => env('INTEGRATION_CLIENT_API_KEY')
] 
```
Then put `INTEGRATION_CLIENT_API_KEY` in your environment variables.
