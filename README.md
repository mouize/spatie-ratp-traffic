# spatie-ratp-traffic

Ratp traffic for spatie dashboard

Based on https://github.com/pgrimaud/horaires-ratp-api

## Installation

Install the package via composer:

    composer require mouize/ratp-traffic

## Usage

#### Publish the vendor assets

    php artisan vendor:publish --provider="RatpTraffic\ServiceProvider"

#### Update the ressources/assets/js/bootstrap.js:

    ...
    
    import RatpTraffic from './components/RatpTraffic';
    
    ...
    
    components: {
            ...
            RatpTraffic,
        },
        
#### Update the resources/views/dashboard.blade.php on need : 

If you need to display métro (subways):

    <ratp-traffic position="XX" transporter="metros"></ratp-traffic>

For RER (regional trains):
    
    <ratp-traffic position="XX" transporter="rers"></ratp-traffic>
    
Tramways:
    
    <ratp-traffic position="XX" transporter="tramways"></ratp-traffic>

NB: You must set position as defined in [spatie documentation](https://murze.be/building-a-realtime-dashboard-powered-by-laravel-and-vue-2017-edition)

#### Crontab

Add the artisan command **dashboard:ratp-traffic** in the crontab (kernel console, or dashboard command)

#### License

Toutes les données appartiennent à la RATP et sont utilisées dans un but strictement personnel ou de recherche et non dans un but commercial.