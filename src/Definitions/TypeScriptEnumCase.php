<?php

namespace Based\TypeScript\Definitions;

use Illuminate\Support\Collection;
use ReflectionEnumBackedCase;
use ReflectionEnumUnitCase;

class TypeScriptEnumCase
{
    public function __construct(
        public ReflectionEnumBackedCase|ReflectionEnumUnitCase $column,
    ) {
    }

    public function getValue(): string
    {
        if ($this->column instanceof ReflectionEnumBackedCase) {
            $value = $this->column->getBackingValue();
            return collect(' = ')
                ->when(is_string($value), fn (Collection $types) => $types->push('"'))
                ->push($value)
                ->when(is_string($value), fn (Collection $types) => $types->push('"'))
                ->join('');
        } else {
            '';
        }
    }

    public function __toString(): string
    {
        return collect($this->column->name)
            ->push($this->getValue())
            ->push(',')
            ->join('');
    }
}
