
<h1>Introduction</h1>
No Framework is a lightweight micro-framework built using PHP. It leverages a set of carefully 
selected packages to provide a simple, yet powerful structure for building web applications.
This framework is designed for developers who prefer minimalism and flexibility,
allowing them to use only what they need without the overhead of a full-stack framework.


<h1>Features</h1>

<h3 align="left">Dependency Injection:</h3> 
Managed through <a href="https://container.thephpleague.com/4.x/" target="_blank">league/container</a>, allowing for efficient and flexible service management.

<h3 align="left">Environment Management:</h3> 
Handled by <a href="https://github.com/vlucas/phpdotenv" target="_blank">vlucas/phpdotenv</a>, which loads environment variables from a .env file.

<h3 align="left">Routing:</h3> 
Powered by <a href="https://route.thephpleague.com/5.x/" target="_blank">league/route</a>, offering a robust and flexible routing system.

<h3 align="left">HTTP Handling:</h3> 
Implemented via <a href="https://docs.laminas.dev/laminas-diactoros/" target="_blank">laminas/laminas-diactoros</a> and <a href="https://docs.laminas.dev/laminas-httphandlerrunner/" target="_blank">laminas/laminas-httphandlerrunner</a> for PSR-7 compliant HTTP message interfaces.

<h3 align="left">Templating:</h3> 
Utilizes the <a href="https://twig.symfony.com/doc/3.x/" target="_blank">twig/twig</a> templating engine for rendering views.

<h3 align="left">Database Interaction:</h3> 
Managed by <a href="https://laravel.com/docs/11.x/eloquent" target="_blank">illuminate/database</a>, providing a powerful ORM and fluent query builder.

<h3 align="left">Event Handling:</h3> 
Powered by <a href="https://laravel.com/docs/11.x/events" target="_blank">illuminate/events</a> to handle application events.

<h3 align="left">Security:</h3> 
CSRF protection through <a href="https://github.com/slimphp/Slim-Csrf" target="_blank">slim/csrf</a> and user authentication via <a href="https://cartalyst.com/manual/sentinel" target="_blank">cartalyst/sentinel</a>.

<h3 align="left">Validation:</h3> 
Form validation made easy with <a href="https://respect-validation.readthedocs.io/en/latest/" target="_blank">respect/validation</a>.

<h3 align="left">Pagination:</h3> 
Built-in pagination support via <a href="https://laravel.com/docs/11.x/pagination" target="_blank">illuminate/pagination</a>.

<h3 align="left">Error Handling:</h3> 
Enhanced with <a href="https://spatie.be/docs/ignition/v1/introduction" target="_blank">spatie/ignition</a> for detailed error reporting and debugging.

<h3 align="left">Dot Notation:</h3> 
Facilitated by <a href="https://github.com/adbario/php-dot-notation" target="_blank">adbario/php-dot-notation</a> for managing deeply nested arrays using dot notation.
