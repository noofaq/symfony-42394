<?php

namespace App\Form;

use App\Entity\Notification;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NotificationType extends AbstractType
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        // when editing existing entity this will not show selected options
        $builder
            ->add('subscribedUsers', EntityType::class, [
                'class' => User::class,
                'choice_value' => 'id',
                'choice_label' => function(User $u) { return $u->getName(); },
                'multiple' => true,
            ])
        ;

//        // this works correctly
//        $builder
//            ->add('subscribedUsers', EntityType::class, [
//                'class' => User::class,
//                'choice_label' => function(User $u) { return $u->getName(); },
//                'multiple' => true,
//            ])
//        ;


//        // this also works correctly
//        $builder
//            ->add('subscribedUsers', EntityType::class, [
//                'class' => User::class,
//                'choice_value' => 'id',
//                'choice_label' => function(User $u) { return $u->getName(); },
//                'multiple' => true,
//                'choices' => $this->entityManager->getRepository(User::class)->findAll(),
//            ])
//        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Notification::class,
        ]);
    }
}
