<?php

declare(strict_types=1);

namespace Drush\Commands\locale;

use PHPUnit\Framework\TestCase;

class LocaleTraitTest extends TestCase
{
    /**
     * locale:export --template has no language code, so it asks for the language of null.
     */
    public function testNoLanguageCodeGivesNoLanguage(): void
    {
        $command = new class {
            use LocaleTrait;

            public function language(?string $langcode): mixed
            {
                return $this->getTranslatableLanguage($langcode);
            }
        };

        $this->assertNull($command->language(null));
        $this->assertNull($command->language(''));
    }
}
