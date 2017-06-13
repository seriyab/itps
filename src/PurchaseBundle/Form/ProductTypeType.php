<?php

namespace PurchaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductTypeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')->add('priceMin')->add('priceMax')
            ->add('unitOfMeasurement', ChoiceType::class, array(
                'choices' => array(
                    'Kg' => 'Kg',
                    'm3' => 'm3',
                    'm2' => 'm2',
                    'km2' => 'km2',
                    'hm2' => 'hm2',
                    'L'   => 'L',
                    'Ml'  => 'Ml'
                ),
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PurchaseBundle\Entity\ProductType'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'purchase_bundle_producttype';
    }


}
