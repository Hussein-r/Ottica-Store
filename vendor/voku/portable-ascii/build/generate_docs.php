<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/vendor/autoload.php';

$readmeGenerator = new \voku\PhpReadmeHelper\GenerateApi();
$readmeGenerator->templateMethod = <<<RAW
#### %name%
<a href="#voku-php-readme-class-methods">↑</a>
%description%

**Parameters:**
%params%

**Return:**
<<<<<<< HEAD
- `%return%`
=======
%return%
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f

--------

RAW;
$readmeText = ($readmeGenerator)->generate(
    __DIR__ . '/../src/voku/helper/ASCII.php',
    __DIR__ . '/docs/base.md'
);

file_put_contents(__DIR__ . '/../README.md', $readmeText);
