<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class BookType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array('label' => 'general.head.title', 'translation_domain' => 'app'))
            ->add('author', null, array('label' => 'general.head.author', 'translation_domain' => 'app'))
            ->add('kind', null, array('label' => 'general.head.kind', 'translation_domain' => 'app'))
            ->add('editor', null, array('label' => 'general.head.editor', 'translation_domain' => 'app'))
            ->add('shortDescription', TextareaType::class, array('label' => 'general.head.short_description', 'translation_domain' => 'app'))
            ->add('encryptName', FileType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Book'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_book';
    }


}
