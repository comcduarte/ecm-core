<?php
declare(strict_types=1);

namespace Core\Contract\Entity;

use Core\App\Entity\AbstractEntity;
use Core\Contract\Repository\ContractRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContractRepository::class)]
#[ORM\Table("contract")]
#[ORM\HasLifecycleCallbacks]
class Contract extends AbstractEntity
{
    #[ORM\Column(name: "folder_id", type: "string", length: 100)]
    protected string $folder_id;
    
    #[ORM\Column(name: "project_name", type: "string", length: 100)]
    protected string $project_name;
    
    /**
     * @return string
     */
    public function getFolder_id()
    {
        return $this->folder_id;
    }

    /**
     * @return string
     */
    public function getProject_name()
    {
        return $this->project_name;
    }

    /**
     * @param string $folder_id
     */
    public function setFolder_id($folder_id)
    {
        $this->folder_id = $folder_id;
    }

    /**
     * @param string $project_name
     */
    public function setProject_name($project_name)
    {
        $this->project_name = $project_name;
    }

    public function getUpdated(): ?DateTimeImmutable
    {
        
    }

    public function getCreatedFormatted(string $dateFormat = 'Y-m-d H:i:s'): string
    {
        
    }

    public function getUpdatedFormatted(string $dateFormat = 'Y-m-d H:i:s'): ?string
    {
        
    }

    public function getCreated(): ?DateTimeImmutable
    {
        
    }
    
    public function getArrayCopy(): array
    {
        return [
            'uuid'         => $this->uuid->toString(),
            'folder_id'    => $this->getFolder_id(),
            'project_name' => $this->getProject_name(),
        ];
    }

}