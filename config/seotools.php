<?php
/**
 * @see https://github.com/artesaos/seotools
 */

$prod = env('APP_ENV') === 'production';

return [
    'inertia' => env('SEO_TOOLS_INERTIA', false),
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => false, // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'Bring your child\'s imagination to life with fully personalized storybooks — where their face, name, and spirit become the heart of every adventure.', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => [
                'pictoora',
                'personalized storybooks',
            ],
            'canonical'    => $prod ? 'full' : false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => $prod ? 'all' : false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => false, // set false to total remove
            'description' => 'Bring your child\'s imagination to life with fully personalized storybooks — where their face, name, and spirit become the heart of every adventure.', // set false to total remove
            'url'         => $prod ? null : false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => false, // set false to total remove
            'description' => 'Bring your child\'s imagination to life with fully personalized storybooks — where their face, name, and spirit become the heart of every adventure.', // set false to total remove
            'url'         => $prod ? 'full' : false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'BookStore',
            'images'      => [],
        ],
    ],
];
