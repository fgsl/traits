<?php
/**
 * Fgsl Traits
 * @author Flávio Gomes da Silva Lisboa <flavio.lisboa@fgsl.eti.br>
 * @copyright FGSL 2020
 * @license   AGPL 3.0
 **/
namespace Fgsl\Traits;

use Laminas\Cache\Storage\StorageInterface;
use Laminas\Cache\StorageFactory;
use Psr\SimpleCache\CacheInterface;

trait CacheTrait
{    
    /** @var CacheInterface */
    private static $cache = null;
    
    private static $cacheDir = APP_ROOT . '/data/cache';
    
    private static $cacheNamespace;
        
    private $cacheEnabled = false;
        
    /**
     *
     * @return StorageInterface
     */
    private function getCache()
    {
        if (self::$cache == null){
            self::$cache = StorageFactory::factory([
                'adapter' => [
                    'name' => 'filesystem',
                    'options' => [
                        'namespace' => self::$cacheNamespace,
                        'ttl' => 3600
                    ],
                    'cache_dir' => self::$cacheDir
                ],
                'plugins' => [
                    'exception_handler' => [
                        'throw_exceptions' => false
                    ]
                ]
            ]);
        }
        return self::$cache;
    }
}