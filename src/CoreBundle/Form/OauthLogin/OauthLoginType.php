<?php

namespace CoreBundle\Form\OauthLogin;

use CoreBundle\Model\Request\OauthLogin\OauthLoginRequest;
use Doctrine\DBAL\Types\StringType;
use NorseDigital\Symfony\RestBundle\Form\TextType;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;


/**
 * Class OauthLoginType
 */
class OauthLoginType extends AbstractFormType
{
    const DATA_CLASS = OauthLoginRequest::class;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('code', TextType::class);
    }


}
