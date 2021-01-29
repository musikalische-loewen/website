<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use DOMDocument;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @param $html
     */
    public function assertValidHtml($html)
    {
        libxml_use_internal_errors(true);
        $dom = New DOMDocument();
        $dom->loadHTML($html);
        $errors = collect(libxml_get_errors());
        $errors = $errors->filter(function ($error) {
            return !in_array($error->message, [
                "Tag nav invalid\n",
                "Tag header invalid\n",
                "Tag main invalid\n",
                "Tag footer invalid\n",
            ]);
        });
        if ($errors->count() > 0) {
            $lines = preg_split("/((\r?\n)|(\r\n?))/", $html);
            $lines = $errors->map(function ($error) use ($lines) {
                return implode("\n", [
                    trim($lines[$error->line-2]),
                    trim($lines[$error->line-1]),
                    trim($lines[$error->line])
                ]);
            });
            $this->fail(sprintf("The HTML is probably invalid near:\n%s", $lines->implode("\n\nAnd near:\n")));
        }
        $this->assertTrue(true);
    }
}
