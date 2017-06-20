<?php

namespace MaterialsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipmentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('family')
            ->add('subFamily')
            ->add('registrationNumber')
            ->add('dateOfCirculation', DateType::class, array(
                'html5' => true,
                'widget' => 'single_text'
            ))
            ->add('numberOfPlaces')
            ->add('bodywork')
            ->add('energy', ChoiceType::class, array(
                'choices' => array('Diesel' => 'Diesel', 'Essence' => 'Essence', 'Hybride' => 'Hybride', 'Electrique - GPL - Autres' => 'Electrique - GPL - Autres')
            ))
            ->add('fiscalPower')
            ->add('status', ChoiceType::class, array(
                'choices' => array(
                    'En circualation' => 'En circualation',
                    'En arrêt' => 'En arrêt',
                    'En panne' => 'En panne'
                )
            ))
            ->add('greyCarte')
            ->add('brand')
            ->add('model')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MaterialsBundle\Entity\Equipment'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'materialsbundle_equipment';
    }


}
