<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;

class EditPhotoFormType extends AbstractType
{

    /**
     * Liste des types MIME autorisés
     */
    private $allowedMimeTypes = [
        'jpg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
    ];

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('photo', FileType::class, [
                'label' => 'Sélectionnez une nouvelle photo',
                'attr' => [
                    'accept' => implode(', ', $this->allowedMimeTypes),
                ],
                'constraints' => [

                    new NotBlank([
                        'message' => 'Vous devez sélectionner un fichier',
                    ]),

                    new File([
                        'maxSize' => '5M',   // Taille maximum du fichier
                        'maxSizeMessage' => 'Fichier trop volumineux ({{ size }} {{ suffix }}). La taille maximum autorisée est de {{ limit }} {{ suffix }}',
                        'mimeTypes' => $this->allowedMimeTypes,
                        'mimeTypesMessage' => 'Ce type de fichier n\'est pas autorisé ({{ type }}). Les types autorisés sont {{ types }}.',
                    ]),

                ],
            ])

            ->add('save', SubmitType::class, [
                'label' => 'Changer la photo',
                'attr' => [
                    'class' => 'btn btn-outline-primary w-100',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
