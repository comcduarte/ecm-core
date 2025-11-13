<?php
declare(strict_types=1);

namespace Core\Contract;

use Core\Contract\Repository\ContractRepository;
use Doctrine\ORM\Mapping\Driver\AttributeDriver;
use Laminas\ServiceManager\Factory\InvokableFactory;

class ConfigProvider
{
    public const REGEXP_UUID = '{uuid:[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}}';
    public const REGEXP_BOX_ID = '{id:[0-9-]*}';
    
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
//             'doctrine'     => $this->getDoctrineConfig(),
        ];
    }
    
    private function getDependencies(): array
    {
        return [
            'factories' => [
                ContractRepository::class => InvokableFactory::class,
            ],
        ];
    }
    
    private function getDoctrineConfig(): array
    {
        return [
            'driver' => [
                'orm_default'  => [
                    'drivers' => [
                        'Core\Contract\Entity' => 'ContractEntities',
                    ],
                ],
                'ContractEntities' => [
                    'class' => AttributeDriver::class,
                    'cache' => 'array',
                    'paths' => [__DIR__ . '/Entity'],
                ],
            ],
        ];
    }
}