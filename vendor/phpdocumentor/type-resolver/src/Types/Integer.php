<?php

declare(strict_types=1);

/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Reflection\Types;

use phpDocumentor\Reflection\Type;

<<<<<<< HEAD
=======
/**
 * Value object representing Integer type
 *
 * @psalm-immutable
 */
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
final class Integer implements Type
{
    /**
     * Returns a rendered output of the Type as it would be used in a DocBlock.
     */
    public function __toString() : string
    {
        return 'int';
    }
}
