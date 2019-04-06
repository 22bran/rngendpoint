# Endpoint for random number generator

## Instalation
* run `composer install`
* copy .env.example to .env and fill secret key
* go to `api/random-number/{hash}/{min}/{max}` e.g. `api/random-number/d20ae04725ecdde4882f307c844deef0/10/20`

## Notes
* hash is calculated as `md5($min . $secret . $max)`
