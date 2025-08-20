<?php
declare(strict_types=1);

namespace Core\Metadata;

use Doctrine\ORM\Mapping\Driver\AttributeDriver;
use Dot\DependencyInjection\Factory\AttributedRepositoryFactory;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'doctrine'     => $this->getDoctrineConfig(),
        ];
    }
    
    private function getDependencies(): array
    {
        return [
            'factories' => [
                Repository\MetadataTemplateRepository::class => AttributedRepositoryFactory::class,
            ],
        ];
    }
    
    private function getDoctrineConfig(): array
    {
        return [
            'driver' => [
                'orm_default'  => [
                    'drivers' => [
                        'Core\Metadata\Entity' => 'MetadataTemplateEntities',
                    ],
                ],
                'MetadataTemplateEntities' => [
                    'class' => AttributeDriver::class,
                    'cache' => 'array',
                    'paths' => [__DIR__ . '/Entity'],
                ],
            ],
        ];
    }
}