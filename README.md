# php-int-to-alpha
A lib that take a base 10 integer and turns it into a base 26 alphabet string

# Thanks to:

The logic contained within this lib was inspired by this post:
[http://www.geeksforgeeks.org/find-excel-column-name-given-number/](http://www.geeksforgeeks.org/find-excel-column-name-given-number/)

# Installation

This lib requires the use of [Composer](https://getcomposer.org/)

Require entry:

```json
    "dcarbone/php-int-to-alpha": "1.0.*"
```

# Usage

```php

$alpha = \DCarbone\IntToAlpha::invoke($integer);
echo $alpha;

// OR

$intToAlpha = new \DCarbone\IntToAlpha();

$alpha = $intToAlpha($integer);

```