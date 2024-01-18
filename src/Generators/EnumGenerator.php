<?php

namespace Based\TypeScript\Generators;

use Based\TypeScript\Definitions\TypeScriptEnumCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use ReflectionEnumBackedCase;
use ReflectionEnumUnitCase;
use ReflectionException;

class EnumGenerator extends AbstractGenerator
{
    protected Model $model;
    /** @var Collection<ReflectionEnumBackedCase|ReflectionEnumUnitCase> */
    protected Collection $columns;

    public function getDefinition(): ?string
    {
        return collect([
            $this->getCases(),
        ])
            ->filter(fn (string $part) => !empty($part))
            ->join(PHP_EOL . '        ');
    }

    /**
     * @throws \ReflectionException
     */
    protected function boot(): void
    {
        $this->columns = collect(
            $this->reflection->getCases()
        );
    }

    protected function getCases(): string
    {
        return $this->columns->map(function (ReflectionEnumBackedCase|ReflectionEnumUnitCase $column) {
            return (string) new TypeScriptEnumCase(
                column: $column,
            );
        })
            ->join(PHP_EOL . '        ');
    }
}
