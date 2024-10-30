# Simple Social Share

## Shortcode
Use the shortcode [ignite-social-share].

## Available filters
The plugin offer a variety of filter that you can use to modify it's behaviour. 
Here's a list of the available ones:

- `ignite-share-endpoints` can be used to modify/add additional endpoints to the default list. A new endpoint can be defined as per example
```php
add_filter('ignite-share-endpoints', function($providers){
    $providers['test-provider'] = [
        'label' => 'Test provider',
        'icon' => 'fab fab-cog',
        'url' => 'http://example.com',
    ];
    return $providers;
});
```

- `ignite-social-enable-fa` allows you to control the FontAwesome default stylesheet inclusion. To turn it off you can use:
```php
add_filter('ignite-social-enable-fa', '__return_false');
```

- `ignite-social-template` allows you to define your own template. The template path must be in a form valid to be passed to `include`. For example
```php
add_filter('ignite-social-template', function(){
    return get_stylesheet_directory() . '/templates/social-share.php';
});
```

## Variable handling in provider URL
Quite often, the link to the social platform requires additional parameters. Because of this, the plugin offers a simple regular expression to replace custom variables within the provider URL before the url itself is passed to the template.
For example a URL could be defined as:
```
$providers['facebook'] = [
    'label' => 'Facebook',
    'url' => 'http://www.facebook.com/sharer.php?u={URL}',
    'icon' => 'fab fa-facebook',
];
```

The following filters is available to tell the plugin which variables to look for and replace:
```php
add_filter('ignite-social-replace-params', function($params){
    $params = [
        'url' => urlencode(get_permalink()),
    ];
    return $params;
});
```
