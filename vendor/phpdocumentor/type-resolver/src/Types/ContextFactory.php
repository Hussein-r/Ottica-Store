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

use ArrayIterator;
use InvalidArgumentException;
use ReflectionClass;
use ReflectionClassConstant;
use ReflectionMethod;
use ReflectionParameter;
use ReflectionProperty;
use Reflector;
use RuntimeException;
use UnexpectedValueException;
<<<<<<< HEAD
use function array_merge;
use function file_exists;
use function file_get_contents;
use function get_class;
=======
use function file_exists;
use function file_get_contents;
use function get_class;
use function in_array;
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
use function is_string;
use function token_get_all;
use function trim;
use const T_AS;
use const T_CLASS;
use const T_CURLY_OPEN;
use const T_DOLLAR_OPEN_CURLY_BRACES;
use const T_NAMESPACE;
use const T_NS_SEPARATOR;
use const T_STRING;
use const T_USE;

/**
 * Convenience class to create a Context for DocBlocks when not using the Reflection Component of phpDocumentor.
 *
 * For a DocBlock to be able to resolve types that use partial namespace names or rely on namespace imports we need to
 * provide a bit of context so that the DocBlock can read that and based on it decide how to resolve the types to
 * Fully Qualified names.
 *
 * @see Context for more information.
 */
final class ContextFactory
{
    /** The literal used at the end of a use statement. */
    private const T_LITERAL_END_OF_USE = ';';

    /** The literal used between sets of use statements */
    private const T_LITERAL_USE_SEPARATOR = ',';

    /**
     * Build a Context given a Class Reflection.
     *
     * @see Context for more information on Contexts.
     */
    public function createFromReflector(Reflector $reflector) : Context
    {
        if ($reflector instanceof ReflectionClass) {
<<<<<<< HEAD
=======
            //phpcs:ignore SlevomatCodingStandard.Commenting.InlineDocCommentDeclaration.MissingVariable
            /** @var ReflectionClass<object> $reflector */

>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
            return $this->createFromReflectionClass($reflector);
        }

        if ($reflector instanceof ReflectionParameter) {
            return $this->createFromReflectionParameter($reflector);
        }

        if ($reflector instanceof ReflectionMethod) {
            return $this->createFromReflectionMethod($reflector);
        }

        if ($reflector instanceof ReflectionProperty) {
            return $this->createFromReflectionProperty($reflector);
        }

        if ($reflector instanceof ReflectionClassConstant) {
            return $this->createFromReflectionClassConstant($reflector);
        }

        throw new UnexpectedValueException('Unhandled \Reflector instance given:  ' . get_class($reflector));
    }

    private function createFromReflectionParameter(ReflectionParameter $parameter) : Context
    {
        $class = $parameter->getDeclaringClass();
<<<<<<< HEAD
        if ($class) {
            return $this->createFromReflectionClass($class);
        }

        throw new InvalidArgumentException('Unable to get class of ' . $parameter->getName());
=======
        if (!$class) {
            throw new InvalidArgumentException('Unable to get class of ' . $parameter->getName());
        }

        //phpcs:ignore SlevomatCodingStandard.Commenting.InlineDocCommentDeclaration.MissingVariable
        /** @var ReflectionClass<object> $class */

        return $this->createFromReflectionClass($class);
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
    }

    private function createFromReflectionMethod(ReflectionMethod $method) : Context
    {
<<<<<<< HEAD
        return $this->createFromReflectionClass($method->getDeclaringClass());
=======
        //phpcs:ignore SlevomatCodingStandard.Commenting.InlineDocCommentDeclaration.MissingVariable
        /** @var ReflectionClass<object> $class */
        $class = $method->getDeclaringClass();

        return $this->createFromReflectionClass($class);
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
    }

    private function createFromReflectionProperty(ReflectionProperty $property) : Context
    {
<<<<<<< HEAD
        return $this->createFromReflectionClass($property->getDeclaringClass());
=======
        //phpcs:ignore SlevomatCodingStandard.Commenting.InlineDocCommentDeclaration.MissingVariable
        /** @var ReflectionClass<object> $class */
        $class = $property->getDeclaringClass();

        return $this->createFromReflectionClass($class);
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
    }

    private function createFromReflectionClassConstant(ReflectionClassConstant $constant) : Context
    {
<<<<<<< HEAD
        return $this->createFromReflectionClass($constant->getDeclaringClass());
    }

=======
        //phpcs:ignore SlevomatCodingStandard.Commenting.InlineDocCommentDeclaration.MissingVariable
        /** @var ReflectionClass<object> $class */
        $class = $constant->getDeclaringClass();

        return $this->createFromReflectionClass($class);
    }

    /**
     * @param ReflectionClass<object> $class
     */
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
    private function createFromReflectionClass(ReflectionClass $class) : Context
    {
        $fileName  = $class->getFileName();
        $namespace = $class->getNamespaceName();

        if (is_string($fileName) && file_exists($fileName)) {
            $contents = file_get_contents($fileName);
            if ($contents === false) {
                throw new RuntimeException('Unable to read file "' . $fileName . '"');
            }

            return $this->createForNamespace($namespace, $contents);
        }

        return new Context($namespace, []);
    }

    /**
     * Build a Context for a namespace in the provided file contents.
     *
     * @see Context for more information on Contexts.
     *
     * @param string $namespace    It does not matter if a `\` precedes the namespace name,
     * this method first normalizes.
     * @param string $fileContents The file's contents to retrieve the aliases from with the given namespace.
     */
    public function createForNamespace(string $namespace, string $fileContents) : Context
    {
        $namespace        = trim($namespace, '\\');
        $useStatements    = [];
        $currentNamespace = '';
        $tokens           = new ArrayIterator(token_get_all($fileContents));

        while ($tokens->valid()) {
<<<<<<< HEAD
            switch ($tokens->current()[0]) {
=======
            $currentToken = $tokens->current();
            switch ($currentToken[0]) {
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
                case T_NAMESPACE:
                    $currentNamespace = $this->parseNamespace($tokens);
                    break;
                case T_CLASS:
                    // Fast-forward the iterator through the class so that any
                    // T_USE tokens found within are skipped - these are not
                    // valid namespace use statements so should be ignored.
                    $braceLevel      = 0;
                    $firstBraceFound = false;
                    while ($tokens->valid() && ($braceLevel > 0 || !$firstBraceFound)) {
<<<<<<< HEAD
                        if ($tokens->current() === '{'
                            || $tokens->current()[0] === T_CURLY_OPEN
                            || $tokens->current()[0] === T_DOLLAR_OPEN_CURLY_BRACES) {
=======
                        $currentToken = $tokens->current();
                        if ($currentToken === '{'
                            || in_array($currentToken[0], [T_CURLY_OPEN, T_DOLLAR_OPEN_CURLY_BRACES], true)) {
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
                            if (!$firstBraceFound) {
                                $firstBraceFound = true;
                            }

                            ++$braceLevel;
                        }

<<<<<<< HEAD
                        if ($tokens->current() === '}') {
=======
                        if ($currentToken === '}') {
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
                            --$braceLevel;
                        }

                        $tokens->next();
                    }

                    break;
                case T_USE:
                    if ($currentNamespace === $namespace) {
<<<<<<< HEAD
                        $useStatements = array_merge($useStatements, $this->parseUseStatement($tokens));
=======
                        $useStatements += $this->parseUseStatement($tokens);
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
                    }

                    break;
            }

            $tokens->next();
        }

        return new Context($namespace, $useStatements);
    }

    /**
     * Deduce the name from tokens when we are at the T_NAMESPACE token.
<<<<<<< HEAD
=======
     *
     * @param ArrayIterator<int, string|array{0:int,1:string,2:int}> $tokens
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
     */
    private function parseNamespace(ArrayIterator $tokens) : string
    {
        // skip to the first string or namespace separator
        $this->skipToNextStringOrNamespaceSeparator($tokens);

        $name = '';
<<<<<<< HEAD
        while ($tokens->valid() && ($tokens->current()[0] === T_STRING || $tokens->current()[0] === T_NS_SEPARATOR)
        ) {
=======
        while ($tokens->valid() && in_array($tokens->current()[0], [T_STRING, T_NS_SEPARATOR], true)) {
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
            $name .= $tokens->current()[1];
            $tokens->next();
        }

        return $name;
    }

    /**
     * Deduce the names of all imports when we are at the T_USE token.
     *
<<<<<<< HEAD
     * @return string[]
=======
     * @param ArrayIterator<int, string|array{0:int,1:string,2:int}> $tokens
     *
     * @return string[]
     *
     * @psalm-return array<string, string>
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
     */
    private function parseUseStatement(ArrayIterator $tokens) : array
    {
        $uses = [];

<<<<<<< HEAD
        while (true) {
            $this->skipToNextStringOrNamespaceSeparator($tokens);

            $uses = array_merge($uses, $this->extractUseStatements($tokens));
            if ($tokens->current()[0] === self::T_LITERAL_END_OF_USE) {
                return $uses;
            }

            if ($tokens->current() === false) {
                break;
            }
=======
        while ($tokens->valid()) {
            $this->skipToNextStringOrNamespaceSeparator($tokens);

            $uses += $this->extractUseStatements($tokens);
            $currentToken = $tokens->current();
            if ($currentToken[0] === self::T_LITERAL_END_OF_USE) {
                return $uses;
            }
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
        }

        return $uses;
    }

    /**
     * Fast-forwards the iterator as longs as we don't encounter a T_STRING or T_NS_SEPARATOR token.
<<<<<<< HEAD
     */
    private function skipToNextStringOrNamespaceSeparator(ArrayIterator $tokens) : void
    {
        while ($tokens->valid() && ($tokens->current()[0] !== T_STRING) && ($tokens->current()[0] !== T_NS_SEPARATOR)) {
=======
     *
     * @param ArrayIterator<int, string|array{0:int,1:string,2:int}> $tokens
     */
    private function skipToNextStringOrNamespaceSeparator(ArrayIterator $tokens) : void
    {
        while ($tokens->valid()) {
            $currentToken = $tokens->current();
            if (in_array($currentToken[0], [T_STRING, T_NS_SEPARATOR], true)) {
                break;
            }

>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
            $tokens->next();
        }
    }

    /**
     * Deduce the namespace name and alias of an import when we are at the T_USE token or have not reached the end of
     * a USE statement yet. This will return a key/value array of the alias => namespace.
     *
<<<<<<< HEAD
     * @return string[]
     *
     * @psalm-suppress TypeDoesNotContainType
=======
     * @param ArrayIterator<int, string|array{0:int,1:string,2:int}> $tokens
     *
     * @return string[]
     *
     * @psalm-suppress TypeDoesNotContainType
     *
     * @psalm-return array<string, string>
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
     */
    private function extractUseStatements(ArrayIterator $tokens) : array
    {
        $extractedUseStatements = [];
        $groupedNs              = '';
        $currentNs              = '';
        $currentAlias           = '';
        $state                  = 'start';

        while ($tokens->valid()) {
            $currentToken = $tokens->current();
            $tokenId      = is_string($currentToken) ? $currentToken : $currentToken[0];
            $tokenValue   = is_string($currentToken) ? null : $currentToken[1];
            switch ($state) {
                case 'start':
                    switch ($tokenId) {
                        case T_STRING:
                        case T_NS_SEPARATOR:
<<<<<<< HEAD
                            $currentNs   .= $tokenValue;
=======
                            $currentNs   .= (string) $tokenValue;
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
                            $currentAlias =  $tokenValue;
                            break;
                        case T_CURLY_OPEN:
                        case '{':
                            $state     = 'grouped';
                            $groupedNs = $currentNs;
                            break;
                        case T_AS:
                            $state = 'start-alias';
                            break;
                        case self::T_LITERAL_USE_SEPARATOR:
                        case self::T_LITERAL_END_OF_USE:
                            $state = 'end';
                            break;
                        default:
                            break;
                    }

                    break;
                case 'start-alias':
                    switch ($tokenId) {
                        case T_STRING:
                            $currentAlias = $tokenValue;
                            break;
                        case self::T_LITERAL_USE_SEPARATOR:
                        case self::T_LITERAL_END_OF_USE:
                            $state = 'end';
                            break;
                        default:
                            break;
                    }

                    break;
                case 'grouped':
                    switch ($tokenId) {
                        case T_STRING:
                        case T_NS_SEPARATOR:
<<<<<<< HEAD
                            $currentNs   .= $tokenValue;
=======
                            $currentNs   .= (string) $tokenValue;
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
                            $currentAlias = $tokenValue;
                            break;
                        case T_AS:
                            $state = 'grouped-alias';
                            break;
                        case self::T_LITERAL_USE_SEPARATOR:
<<<<<<< HEAD
                            $state                                 = 'grouped';
                            $extractedUseStatements[$currentAlias] = $currentNs;
                            $currentNs                             = $groupedNs;
                            $currentAlias                          = '';
=======
                            $state                                          = 'grouped';
                            $extractedUseStatements[(string) $currentAlias] = $currentNs;
                            $currentNs                                      = $groupedNs;
                            $currentAlias                                   = '';
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
                            break;
                        case self::T_LITERAL_END_OF_USE:
                            $state = 'end';
                            break;
                        default:
                            break;
                    }

                    break;
                case 'grouped-alias':
                    switch ($tokenId) {
                        case T_STRING:
                            $currentAlias = $tokenValue;
                            break;
                        case self::T_LITERAL_USE_SEPARATOR:
<<<<<<< HEAD
                            $state                                 = 'grouped';
                            $extractedUseStatements[$currentAlias] = $currentNs;
                            $currentNs                             = $groupedNs;
                            $currentAlias                          = '';
=======
                            $state                                          = 'grouped';
                            $extractedUseStatements[(string) $currentAlias] = $currentNs;
                            $currentNs                                      = $groupedNs;
                            $currentAlias                                   = '';
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
                            break;
                        case self::T_LITERAL_END_OF_USE:
                            $state = 'end';
                            break;
                        default:
                            break;
                    }
            }

            if ($state === 'end') {
                break;
            }

            $tokens->next();
        }

        if ($groupedNs !== $currentNs) {
<<<<<<< HEAD
            $extractedUseStatements[$currentAlias] = $currentNs;
=======
            $extractedUseStatements[(string) $currentAlias] = $currentNs;
>>>>>>> 98dd4b87aba509854b5b11cb014f5f5075dbb62f
        }

        return $extractedUseStatements;
    }
}
