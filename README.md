## AppServiceProvider.php

````
Relation::morphMap([
    'resource' => 'App\MyResource'
]);
\Carbon\Carbon::setLocale(config('app.locale'));
if (config('app.env') != 'local') {
    URL::forceScheme('https');
}
````