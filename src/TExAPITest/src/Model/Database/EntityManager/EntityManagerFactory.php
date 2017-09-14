<?php


namespace TExAPITest\Model\Database\EntityManager;


use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Mapping\UnderscoreNamingStrategy;
use Psr\Container\ContainerInterface;

class EntityManagerFactory
{
    public function __invoke(ContainerInterface $container, string $name, $params): EntityManager
    {
        $configuration = $container->get('config');
        $mysqlData = $configuration['mysql'];

        $proxyDir = 'data/cache/EntityProxy';

        $proxyNamespace = 'EntityProxy';

        $autoGenerateProxyClasses = true;

        $underscoreNamingStrategy = true;

        // Doctrine ORM
        $doctrine = new Configuration();
        $doctrine->setProxyDir($proxyDir);
        $doctrine->setProxyNamespace($proxyNamespace);
        $doctrine->setAutoGenerateProxyClasses($autoGenerateProxyClasses);
        if ($underscoreNamingStrategy) {
            $doctrine->setNamingStrategy(new UnderscoreNamingStrategy());
        }

        // ORM mapping by Annotation
        AnnotationRegistry::registerFile('vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');

        $driver = new AnnotationDriver(
            new AnnotationReader(),
            ['src/Domain']
        );
        $doctrine->setMetadataDriverImpl($driver);

//        // Cache
//        $cache = $container->get(Cache::class);
//        $doctrine->setQueryCacheImpl($cache);
//        $doctrine->setResultCacheImpl($cache);
//        $doctrine->setMetadataCacheImpl($cache);

        // EntityManager
        return EntityManager::create($mysqlData, $doctrine);
    }

}