<?php

declare(strict_types=1);

namespace Core\Workflow\Entity;

use Core\App\Entity\AbstractEntity;
use Core\App\Entity\TimestampsTrait;
use Core\Workflow\Repository\WorkflowRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WorkflowRepository::class)]
#[ORM\Table(name: 'workflow')]
#[ORM\HasLifecycleCallbacks]
class Workflow extends AbstractEntity
{
    use TimestampsTrait;

    public function __construct()
    {
        parent::__construct();

        $this->created();
    }

    /**
     * @return array{
     *      uuid: non-empty-string,
     *      created: DateTimeImmutable,
     *      updated: DateTimeImmutable|null,
     * }
     */
    public function getArrayCopy(): array
    {
        return [
            'uuid'    => $this->uuid->toString(),
            'created' => $this->created,
            'updated' => $this->updated,
        ];
    }
}
