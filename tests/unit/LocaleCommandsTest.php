<?php

declare(strict_types=1);

namespace Drush\Commands\core;

use PHPUnit\Framework\TestCase;

class LocaleCommandsTest extends TestCase
{
    /**
     * locale:export --template has no language code, so it asks for the language of null.
     */
    public function testNoLanguageCodeGivesNoLanguage(): void
    {
        $commands = (new \ReflectionClass(LocaleCommands::class))->newInstanceWithoutConstructor();
        $method = new \ReflectionMethod($commands, 'getTranslatableLanguage');

        $this->assertNull($method->invoke($commands, null));
        $this->assertNull($method->invoke($commands, ''));
    }
}
