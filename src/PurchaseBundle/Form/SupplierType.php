<?php

namespace PurchaseBundle\Form;

use PurchaseBundle\Entity\PartnerCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SupplierType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('type', ChoiceType::class, array(
                'choices' => array('Société' => 'Société', 'Individuel' => 'Individuel')
            ))
            ->add('category', EntityType::class, array(
                'class' => PartnerCategory::class
            ))
            ->add('address')
            ->add('city')
            ->add('phone')
            ->add('fax')
            ->add('mail')
            ->add('contactName')
            ->add('siretNumber')
            ->add('tvaNumber');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PurchaseBundle\Entity\Supplier'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'purchasebundle_supplier';
    }


}
