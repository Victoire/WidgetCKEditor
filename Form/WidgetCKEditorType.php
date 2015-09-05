<?php

namespace Victoire\Widget\CKEditorBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Bundle\CoreBundle\Form\WidgetType;

/**
 * WidgetCKEditor form type
 */
class WidgetCKEditorType extends WidgetType
{
    /**
     * define form fields
     * @param FormBuilderInterface $builder
     * @param array                $options
     *
     * @return void
     *
     * @throws \Exception
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        //choose form mode
        if ($options['businessEntityId'] === null) {
            //if no entity is given, we generate the static form
            $builder
                ->add('content', 'ckeditor', array(
                    //     'config' => array(
                    //         'toolbar' => array(
                    //             array(
                    //                 'name'  => 'document',
                    //                 'items' => array('Source', '-', 'Save', 'NewPage', 'DocProps', 'Preview', 'Print', '-', 'Templates'),
                    //             ),
                    //             '/',
                    //             array(
                    //                 'name'  => 'basicstyles',
                    //                 'items' => array('Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'),
                    //             ),
                    //         ),
                    //         'uiColor' => '#ffffff'
                    //     ),
                    )
                );
        }

        parent::buildForm($builder, $options);

    }

    /**
     * bind form to WidgetCKEditor entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'data_class'         => 'Victoire\Widget\CKEditorBundle\Entity\WidgetCKEditor',
            'widget'             => 'CKEditor',
            'translation_domain' => 'victoire'
        ));
    }

    /**
     * get form name
     * @return string type
     */
    public function getName()
    {
        return 'victoire_widget_form_ckeditor';
    }
}
