<?php

namespace Based\TypeScript\Generators;

use Based\TypeScript\Contracts\Generator;
use ReflectionClass;
use ReflectionEnum;

abstract class AbstractGenerator implements Generator
{
    protected ReflectionClass|ReflectionEnum $reflection;

    public function generate(ReflectionClass|ReflectionEnum $reflection): ?string
    {
        $this->reflection = $reflection;
        $this->boot();

        $reflectionType = $reflection instanceof ReflectionEnum ? 'enum' : 'interface';

        if (empty(trim($definition = $this->getDefinition()))) {
            return "    export $reflectionType {$this->tsClassName()} {}" . PHP_EOL;
        }

        return <<<TS
            export $reflectionType {$this->tsClassName()} {
                $definition
            }

        TS;
    }

    protected function boot(): void
    {
        //
    }

    protected function tsClassName(): string
    {
        return str_replace('\\', '.', $this->reflection->getShortName());
    }
}
