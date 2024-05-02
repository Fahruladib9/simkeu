<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseFilters
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array<string, class-string|list<class-string>>
     *
     * [filter_name => classname]
     * or [filter_name => [classname1, classname2, ...]]
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => Cors::class,
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,
        'login'         => \App\Filters\F_Auth::class,
        'is_login'      => \App\Filters\F_IsLogin::class,
        'is_admin'      => \App\Filters\F_Admin::class,
        'is_superAdmin' => \App\Filters\F_SuperAdmin::class,
        'is_kepala'     => \App\Filters\F_Kepala::class,
    ];

    /**
     * List of special required filters.
     *
     * The filters listed here are special. They are applied before and after
     * other kinds of filters, and always applied even if a route does not exist.
     *
     * Filters set by default provide framework functionality. If removed,
     * those functions will no longer work.
     *
     * @see https://codeigniter.com/user_guide/incoming/filters.html#provided-filters
     *
     * @var array{before: list<string>, after: list<string>}
     */
    public array $required = [
        'before' => [
            'forcehttps', // Force Global Secure Requests
            'pagecache',  // Web Page Caching
        ],
        'after' => [
            'pagecache',   // Web Page Caching
            'performance', // Performance Metrics
            'toolbar',     // Debug Toolbar
        ],
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array<string, array<string, array<string, string>>>|array<string, list<string>>
     */
    public array $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'POST' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don't expect could bypass the filter.
     *
     * @var array<string, list<string>>
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array<string, array<string, list<string>>>
     */
    public array $filters = [
        'login' => [
            'before' => [
                '/', '/users', '/users/*', '/user/*', '/santri', '/santri/*', '/donatur', '/donatur/*', '/kelas', '/kelas/*', '/spp', '/spp/*', '/masuk/*', '/keluar', '/keluar/*', '/laporan/*'
            ]
        ],
        'is_login' => [
            'before' => [
                '/login'
            ]
        ],
        'is_admin' => [
            'before' => [
                '/', '/users', '/users/*', '/user/*', '/santri', '/santri/*', '/donatur', '/donatur/*', '/kelas', '/kelas/*', '/spp', '/spp/*', '/masuk/*', '/keluar', '/keluar/*', '/laporan/*', '/kepala', '/kepala/*'
            ]
        ],
        'is_superAdmin' => [
            'before' => [
                '/admin', '/admin/*', '/kepala', '/kepala/*'
            ]
        ],
        'is_kepala' => [
            'before' => [
                '/admin', '/admin/*', '/', '/users', '/users/*', '/user/*', '/santri', '/santri/*', '/donatur', '/donatur/*', '/kelas', '/kelas/*', '/spp', '/spp/*', '/masuk/*', '/keluar', '/keluar/*', '/laporan/spp', '/laporan/donatur', '/laporan/koperasi', '/laporan/barber'
            ]
        ],
    ];
}
