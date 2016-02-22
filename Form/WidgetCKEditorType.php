<?php

namespace Victoire\Widget\CKEditorBundle\Form;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Bundle\CoreBundle\Form\WidgetType;

/**
 * WidgetCKEditor form type.
 */
class WidgetCKEditorType extends WidgetType
{
    /**
     * define form fields.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     *
     * @throws \Exception
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        //choose form mode
        if ($options['businessEntityId'] === null) {
            //if no entity is given, we generate the static form
            $builder->add('content', CKEditorType::class);
        }

        parent::buildForm($builder, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\CKEditorBundle\Entity\WidgetCKEditor',
            'widget'             => 'CKEditor',
            'translation_domain' => 'victoire',
        ]);
    }
}
