<?php

namespace PurchaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PurchaseOrderType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference')
            ->add('buyer')
            ->add('supplier')
            ->add('deliverydate', DateType::class, array (
                'html5' => true,
                'widget' => 'single_text'
            ))
            ->add('location', ChoiceType::class, array (
                'choices' => array(
                    'Chantier' => 'Chantier',
                    'Lotissement' => 'Lotissement',
                    'Bureau' => 'Bureau'
                ),
                'data' => 'Chantier'
            ))
            ->add('status', ChoiceType::class, array(
                'choices' => array (
                    'Demandé' => 'Demandé',
                    'Validé'  => 'Validé',
                    'Terminé' => 'Terminé',
                    'Annulé' => 'Annulé'
                ),
                'expanded' => true,
                'multiple' => false,
                'data' => 'Demandé'
            ))
            ->add('project')
            ->add('currency', ChoiceType::class, array(
                'choices' => array ('TND' => 'tnd', 'EURO' => 'Euro'),
            ))
            ->add('orderLines', CollectionType::class, array(
                'entry_type' => OrderLineType::class,
                'allow_add' => true,
                'allow_delete' => true
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PurchaseBundle\Entity\PurchaseOrder'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'purchasebundle_purchaseorder';
    }


}
