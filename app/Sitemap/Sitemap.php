<?php

namespace App\Sitemap;

use Illuminate\Support\Carbon;
use Spatie\Sitemap\Sitemap as SpatieSitemap;
use Spatie\Sitemap\Tags\Url;
use Statamic\Entries\Collection;
use Statamic\Entries\Entry;
use Statamic\Facades\Collection as CollectionFacade;
use Statamic\Facades\Taxonomy as TaxonomyFacade;
use Statamic\Taxonomies\Taxonomy;
use Statamic\Taxonomies\Term;

class Sitemap
{
    public static function make(array $excludeCollections = [], array $excludeTaxonomies = []): self
    {
        return (new self($excludeCollections, $excludeTaxonomies))->generate();
    }

    protected SpatieSitemap|null $sitemap = null;

    protected function __construct(
        public array $excludeCollections = [],
        public array $excludeTaxonomies = [],
    ) {
    }

    protected function generate(): self
    {
        $sitemap = SpatieSitemap::create();

        $this->publishedEntries()
            ->each(function (Entry $entry) use ($sitemap) {
                $url = Url::create($entry->absoluteUrl())
                    ->setLastModificationDate(Carbon::createFromTimestamp($entry->value('updated_at')))
                    ->setChangeFrequency('')
                    ->setPriority(0);

                $entry->sites()
                    ->map(fn ($site) => $entry->in($site))
                    ->filter(fn (Entry|null $e) => $e && $this->shouldBeIndexed($e) && $e->locale() !== $entry->locale())
                    ->each(fn (Entry $e) => $url->addAlternate($e->absoluteUrl()));

                $sitemap->add($url);
            });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->sitemap = $sitemap;

        return $this;
    }

    protected function publishedEntries(): \Illuminate\Support\Collection
    {
        return CollectionFacade::all()
            ->reject(fn (Collection $collection) => in_array($collection->handle(), $this->excludeCollections))
            ->flatMap(fn (Collection $collection) => $collection->queryEntries()->get())
            ->filter(fn (Entry $e) => $this->shouldBeIndexed($e));
    }

    protected function publishedTerms(): \Illuminate\Support\Collection
    {
        return TaxonomyFacade::all()
            ->reject(fn (Taxonomy $taxonomy) => in_array($taxonomy->handle(), $this->excludeTaxonomies))
            ->flatMap(fn (Taxonomy $taxonomy) => $taxonomy->queryTerms()->get())
            ->filter(fn (Term $t) => $this->shouldBeIndexed($t));
    }

    private function shouldBeIndexed(Entry|Term $item): bool
    {
        if (is_null($item->absoluteUrl())) {
            return false;
        }

        if (! $this->isAbsoluteUrl($item->absoluteUrl())) {
            return false;
        }

        if (! $item->published()) {
            return false;
        }

        if ($item->get('seo_hidden') === true) {
            return false;
        }

        return true;
    }

    private function isAbsoluteUrl(string $url): bool
    {
        return preg_match('#^https?://#', $url);
    }
}
