<?php

declare(strict_types=1);

namespace Core\Workflow\Repository;

use Core\App\Repository\AbstractRepository;
use Core\Workflow\Entity\Workflow;
use Doctrine\ORM\QueryBuilder;
use Dot\DependencyInjection\Attribute\Entity;

#[Entity(name: Workflow::class)]
class WorkflowRepository extends AbstractRepository
{
    /**
     * @param array<non-empty-string, mixed> $params
     * @param array<non-empty-string, mixed> $filters
     */
    public function getWorkflows(
        array $params = [],
        array $filters = [],
    ): QueryBuilder {
        $queryBuilder = $this
            ->getQueryBuilder()
            ->select(['workflow'])
            ->from(Workflow::class, 'workflow');

        // add filters

        $queryBuilder
            ->orderBy($params['sort'], $params['dir'])
            ->setFirstResult($params['offset'])
            ->setMaxResults($params['limit'])
            ->groupBy('workflow.uuid');
        $queryBuilder->getQuery()->useQueryCache(true);

        return $queryBuilder;
    }
}
