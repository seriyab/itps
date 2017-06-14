<?php

namespace PurchaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
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
            ->add('deliverydate')
            ->add('location')
            ->add('status')
            ->add('currency', ChoiceType::class, array(
                'choices' => array('TND' => 'tnd', 'EURO' => 'Euro'),
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
