<?php

namespace App\Providers;

use App\GraphQL\Types\AlternateEntry;
use Illuminate\Support\ServiceProvider;
use Statamic\Facades\GraphQL;

class GraphQLServiceProvider extends ServiceProvider
{
    public function boot()
    {
        GraphQL::addType(AlternateEntry::class);
        GraphQL::addField('EntryInterface', 'alternates', function () {
            return [
                'type' => GraphQL::listOf(GraphQL::type(AlternateEntry::NAME)),
                'resolve' => function ($page) {
                    return $page->sites()
                        ->map(fn ($site) => $page->in($site))
                        ->filter(fn ($entry) => $entry && $entry->status() === 'published')
                        ->map(fn ($entry) => [
                            'title' => $entry->value('title'),
                            'url' => '/'.strtolower($entry->site()->locale()).$entry->uri(),
                            'locale' => $entry->locale(),
                            'language' => $entry->site()->locale(),
                            'is_root' => $entry->isRoot(),
                        ])->values();
                },
            ];
        });
    }
}
