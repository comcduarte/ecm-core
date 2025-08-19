<?php
declare(strict_types=1);

namespace Core\Contract\Repository;

use Core\App\Repository\AbstractRepository;
use Core\Contract\Entity\Contract;
use Doctrine\ORM\QueryBuilder;
use Dot\DependencyInjection\Attribute\Entity;

#[Entity(name: Contract::class)]
class ContractRepository extends AbstractRepository
{
    public function getContracts(array $params, array $filters = []): QueryBuilder
    {
        return $this
            ->getQueryBuilder()
            ->select('contract')
            ->from(Contract::class, 'contract');
    }
}