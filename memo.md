
## middleware auth
Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('news/create', 'NewsController@add');
    Route::post('news/create', 'NewsController@create');
});

## Auth::routes();

``` bash
laravel/vendor/laravel/framework/src/Illuminate/Routing/Router.php
```

``` php
    public function auth(array $options = [])
    {
        // Authentication Routes...
        $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
        $this->post('login', 'Auth\LoginController@login');
        $this->post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        if ($options['register'] ?? true) {
            $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
            $this->post('register', 'Auth\RegisterController@register');
        }

        // Password Reset Routes...
        if ($options['reset'] ?? true) {
            $this->resetPassword();
        }

        // Email Verification Routes...
        if ($options['verify'] ?? false) {
            $this->emailVerification();
        }
    }
```