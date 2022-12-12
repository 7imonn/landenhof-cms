<?php

namespace App\Fieldtypes;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Statamic\Facades\GlobalSet;
use Statamic\Fieldtypes\Replicator;

class Components extends Replicator
{
    protected $component = 'replicator';

    protected function performAugmentation($values, $shallow)
    {
        return collect($values)
            ->reject(function ($set, $key) {
                return array_get($set, 'enabled', true) === false;
            })
            ->map(function ($set) use ($shallow) {
                if (! $this->config("sets.{$set['type']}.fields")) {
                    return $set;
                }

                $augmentMethodName = 'augment'.Str::ucfirst(Str::camel($set['type'] ?? '')).'Set';

                if ($set['type'] && method_exists($this, $augmentMethodName)) {
                    $values = $this->$augmentMethodName($set, $shallow);
                } else {
                    $augmentMethod = $shallow ? 'shallowAugment' : 'augment';

                    $values = $this->fields($set['type'])->addValues($set)->{$augmentMethod}()->values();
                }

                // Allow augment method to remove component by returning null.
                if ($values === null) {
                    return null;
                }

                if (! $values instanceof Collection) {
                    $values = collect($values);
                }

                $values['type'] = Arr::get($values, 'type') ?: Arr::get($set, 'type');

                return $values->all();
            })
            ->filter()
            ->values()
            ->all();
    }

    /**
     * This is an example augment method. It enables the replicator set
     * named "image_with_text" to use a global set named
     * "default_image_with_text" as a default.
     *
     * @param $set
     * @param bool $shallow
     * @return ?Collection
     */
    protected function augmentImageWithTextSet($set, $shallow = false): ?Collection
    {
        $values = $this->getAugmentedSetValues($set);

        $values = $this->valuesWithDefaultComponent($values, 'default_image_with_text', keep: ['entries']);

        return $values;
    }

    // -----------------------------------------------
    // Global functions
    // -----------------------------------------------

    /**
     * @param $set
     * @return Collection
     */
    private function getAugmentedSetValues($set): Collection
    {
        return $this->fields($set['type'])->addValues($set)->augment()->values();
    }

    /**
     * @param Collection $values
     * @param string $defaultComponentGlobalHandle
     * @param array $keep
     * @return Collection
     */
    private function valuesWithDefaultComponent(Collection $values, string $defaultComponentGlobalHandle, array $keep = []): Collection
    {
        $global = GlobalSet::findByHandle($defaultComponentGlobalHandle)?->inCurrentSite();

        if (! $global) {
            return $values;
        }

        $overrideDefaultComponent = $values->get('override_default_component')?->value() ?? false;

        return $values->map(function ($value, $key) use ($global, $overrideDefaultComponent, $keep) {
            $overrideValue = $value?->value();

            if ($overrideDefaultComponent && $overrideValue != null) {
                return $value;
            }

            if (in_array($key, $keep) && $overrideValue != null) {
                return $value;
            }

            return $global->augmentedValue($key);
        });
    }
}
