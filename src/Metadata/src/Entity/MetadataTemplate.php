<?php
declare(strict_types=1);

namespace Core\Metadata\Entity;

use Core\App\Entity\AbstractEntity;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Core\Metadata\Repository\MetadataTemplateRepository;

#[ORM\Entity(repositoryClass: MetadataTemplateRepository::class)]
#[ORM\Table("metadata_template")]
#[ORM\HasLifecycleCallbacks]
class MetadataTemplate extends AbstractEntity
{
    #[ORM\Column(name: "id", type: "string", length: 100)]
    protected string $id;
    
    #[ORM\Column(name: "type", type: "string", length: 100)]
    protected string $type;
    
    #[ORM\Column(name: "copyInstanceOnItemCopy", type: "string", length: 100)]
    protected string $copyInstanceOnItemCopy;
    
    #[ORM\Column(name: "displayName", type: "string", length: 100)]
    protected string $displayName;
    
    #[ORM\Column(name: "hidden", type: "string", length: 100)]
    protected string $hidden;
    
    #[ORM\Column(name: "scope", type: "string", length: 100)]
    protected string $scope;
    
    #[ORM\Column(name: "templateKey", type: "string", length: 100)]
    protected string $templateKey;
    
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

    public function getArrayCopy()
    {
        return [
            'uuid'                      => $this->uuid->toString(),
            'id'                        => $this->id,
            'type'                      => $this->type,
            'copyInstanceOnItemCopy'    => $this->copyInstanceOnItemCopy,
            'displayName'               => $this->displayName,
            'hidden'                    => $this->hidden,
            'scope'                     => $this->scope,
            'templateKey'               => $this->templateKey,
        ];
    }

}