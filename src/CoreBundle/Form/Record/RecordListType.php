<?php

namespace CoreBundle\Form\Record;

use CoreBundle\Entity\TrainType;
use CoreBundle\Model\Request\Record\RecordListRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormGetListType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;


/**
 * Class RecordListType
 */
class RecordListType extends AbstractFormGetListType
{
    const DATA_CLASS = RecordListRequest::class;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('type', EntityType::class, [
                    'class' => TrainType::class,
                    'required' => true,
                    'invalid_message' => 'Type is not found',
                ]
            );
    }
}
