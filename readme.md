# PHP Container

PHP Container is currently an experimental service container used by [aPHProach](https://www.aphproach.com/) for package development. Feel free to use it in your own packages.

The current documentation sucks. Like I said it is still experimental ;)

-----
# Attributes
The service container is configured via attributes. The main goal is making objects more understandable for other developers.


## Inject 
With the `inject` attribute you can flag a property for dependency injection.


```php
<?php

declare(strict_types=1);

use aphproach\container\Attributes\AutoWire;

class ProductInserter
{
    #[inject()]
    private Doctrine $doctrine;

    #[inject()]
    private ProductRepository $productRepository;

    #[inject()]
    private productFactory $productFactory;
}
```

## AutoWire `(default: false)`
When defining the `AutoWire` attribute all properties with an object as type 

I do not recommend to use auto wiring. this method is currently useless, and promotes bad practices. Use the `Inject` attribute instead.

```php
<?php

declare(strict_types=1);

use aphproach\container\Attributes\AutoWire;

#[AutoWire(true)]
class ProductInserter
{
    private Doctrine $doctrine;

    private ProductRepository $productRepository;

    private productFactory $productFactory;

    public function __construct()
    {
        // AutoWire injects dependencies via reflection.
    }
}
```



-----
# Testing

Coming soon! 



