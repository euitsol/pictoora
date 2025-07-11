<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class FontendBaseController extends Controller
{

    protected function setupSEO($title, $description = null, $keywords = null, $image = null)
    {
        // Default values from config
        $defaultDescription = config('app.description');

        if(empty($description)) {
            $description = $defaultDescription;
        }

        if(empty($keywords)) {
            $keywords = config('app.keywords');
        }

        if(empty($image)) {
            $image = url(config('app.image'));
        }

        $siteName = config('app.name');
        $siteUrl = config('app.url');

        // Clean and prepare values
        $title = strip_tags($title);

        // Meta tags with enhanced SEO attributes
        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        if ($keywords) {
            SEOMeta::setKeywords($keywords);
        }

        // Essential meta tags for better SEO
        SEOMeta::addMeta('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1');
        SEOMeta::addMeta('author', $siteName);
        SEOMeta::addMeta('viewport', 'width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=5, minimum-scale=1');
        SEOMeta::addMeta('format-detection', 'telephone=no');
        SEOMeta::addMeta('theme-color', '#099CF4');
        SEOMeta::addMeta('mobile-web-app-capable', 'yes');
        SEOMeta::addMeta('apple-mobile-web-app-capable', 'yes');
        SEOMeta::addMeta('apple-mobile-web-app-status-bar-style', 'black-translucent');
        SEOMeta::addMeta('revisit-after', '1 days');

        // Language and region meta tags
        SEOMeta::addMeta('content-language', 'en');
        SEOMeta::addMeta('geo.region', 'US');
        SEOMeta::addMeta('geo.position', '');
        SEOMeta::addMeta('ICBM', '');

        // OpenGraph with enhanced social sharing
        OpenGraph::setTitle($title);
        OpenGraph::setDescription($description);
        OpenGraph::setSiteName($siteName);
        OpenGraph::setUrl($siteUrl);
        OpenGraph::setType('website');
        OpenGraph::addProperty('locale', 'en_US');
        OpenGraph::addProperty('locale:alternate', ['en_GB', 'bn_BD']);
        if ($image) {
            OpenGraph::addImage($image, [
                'width' => 1200,
                'height' => 630,
                'type' => 'image/png'
            ]);
        }

        // Twitter Card with enhanced social sharing
        TwitterCard::setTitle($title);
        TwitterCard::setDescription($description);
        TwitterCard::setSite('@' . str_replace(' ', '', $siteName));
        TwitterCard::setType('summary_large_image');
        TwitterCard::addValue('app:name:iphone', $siteName);
        TwitterCard::addValue('app:name:ipad', $siteName);
        TwitterCard::addValue('app:name:googleplay', $siteName);
        if ($image) {
            TwitterCard::setImage($image);
        }

        // JSON-LD with enhanced structured data
        JsonLd::setType('WebPage');
        JsonLd::setTitle($title);
        JsonLd::setDescription($description);
        JsonLd::addValue('@context', 'https://schema.org');
        JsonLd::addValue('url', $siteUrl);
        JsonLd::addValue('inLanguage', 'en-US');
        JsonLd::addValue('datePublished', now()->toIso8601String());
        JsonLd::addValue('dateModified', now()->toIso8601String());

        // Add Organization structured data
        JsonLd::addValue('publisher', [
            '@type' => 'Organization',
            'name' => $siteName,
            'url' => $siteUrl,
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('frontend/img/logos/logo.png'),
                'width' => 600,
                'height' => 60
            ],
            'sameAs' => [
                'https://www.linkedin.com/in/al-kafi-sohag/',
                'https://github.com/al-kafi-sohag',
                'https://wa.me/8801773301138'
            ],
            'contactPoint' => [
                [
                    '@type' => 'ContactPoint',
                    'telephone' => '+8801773301138',
                    'contactType' => 'customer service',
                    'email' => 'ceo@scrapeniche.com',
                    'areaServed' => 'Worldwide',
                    'availableLanguage' => ['English', 'Bengali']
                ]
            ]
        ]);

        // Add BreadcrumbList structured data
        JsonLd::addValue('breadcrumb', [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => $siteUrl
                ]
            ]
        ]);

        if ($image) {
            JsonLd::addImage($image);
        }
    }
}
