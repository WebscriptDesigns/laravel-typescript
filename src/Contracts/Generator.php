<?php

namespace Based\TypeScript\Contracts;

use ReflectionClass;
use ReflectionEnum;

interface Generator
{
    public function generate(ReflectionClass|ReflectionEnum $reflection): ?string;

    public function getDefinition(): ?string;
}
