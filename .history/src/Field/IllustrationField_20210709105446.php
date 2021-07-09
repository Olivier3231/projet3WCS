<?php

namespace App\Field;

use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;

final class IllustrationField implements FieldInterface 
{
    use FieldTrait;

    public static function new(string $propertyName, ?string $label = null): self
    {
        return (new self())
            ->setProperty($propertyName)
            ->setLabel($label)
            ->setFormType(ImageType::class)
            ->setCustomOptions([
                'allowAdd' => true,
                'allowDelete' => true,
                'entryType' => 'App\Form\ImageType',
                'showEntryLabel' => false,
            ])
            
    }
}