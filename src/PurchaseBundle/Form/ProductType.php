<?php

namespace PurchaseBundle\Form;

use PurchaseBundle\Entity\ProductType as BaseProductType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', EntityType::class, array(
                'class' =>BaseProductType::class
            ))
            ->add('supplier')
            ->add('category', ChoiceType::class, array(
                'choices' => array(
                    'Fourniture bureau' => 'Fourniture bureau',
                    'Matériaux de construction' => 'Matériaux de construction',
                    'Piéces mécaniques' => 'Piéces mécaniques'
                    )
            ))
            ->add('quantity')
            ->add('price')
            ->add('supplier')
            ->add('project');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PurchaseBundle\Entity\Product'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'purchasebundle_product';
    }


}
