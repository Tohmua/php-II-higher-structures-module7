<?php

namespace FormDemo;

use App\Elements\ElementFactory;
use App\FormBuilder\Form;
use App\FormBuilder\FormException;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $form = new Form();

    /**
     * Add Email Address
     */
    $firstName = ElementFactory::make('InputText', 'FirstName');

    $firstName->setId('firstName');

    $firstName->addValidator(
        new \App\Validator\StringValidator()
    );
    $firstName->addFilter(
        new \App\Filter\WordFilter()
    );

    $form->addElement($firstName);

    /**
     * Add Email Address
     */
    $email = ElementFactory::make('InputText', 'email');

    $email->setId('email');

    $email->addValidator(
        new \App\Validator\EmailValidator()
    );
    $email->addFilter(
        new \App\Filter\EmailFilter()
    );

    $form->addElement($email);

    /**
     * Add Submit Button
     */
    $submit = ElementFactory::make('SubmitButton', 'submit');

    $submit->setValue('Run Me!');

    $form->addElement($submit);

    /**
     * Hydrate Form
     */
    if (!empty($_POST)) {
        $form->hydrate($_POST);
    }
} catch (FormException $e) {
    echo $e->getMessage();
}

include __DIR__ . '/templates/form.phtml';
