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

/**
 * Value Object representing a Boolean type.
<<<<<<< HEAD
 */
final class Boolean implements Type
=======
 *
 * @psalm-immutable
 */
class Boolean implements Type
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
{
    /**
     * Returns a rendered output of the Type as it would be used in a DocBlock.
     */
    public function __toString() : string
    {
        return 'bool';
    }
}
