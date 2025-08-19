<?php
declare(strict_types=1);

namespace Core\Contract\Repository;

use Core\App\Repository\AbstractRepository;
use Doctrine\ORM\QueryBuilder;

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