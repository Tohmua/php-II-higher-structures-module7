<?php

namespace FormDemo;

use App\Elements\ElementFactory;
use App\FormBuilder\Form;
use App\FormBuilder\FormException;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $form = new Form();

    $element = ElementFactory::make('InputText', 'FirstName');

    $element->setId('firstName');

    $element->addValidator(
        new \App\Validator\EmailValidator()
    );
    $element->addFilter(
        new \App\Filter\EmailFilter()
    );

    $form->addElement($element);

    if (!empty($_POST)) {
        $form->hydrate($_POST);
    }
} catch (FormException $e) {
    echo $e->getMessage();
}

include __DIR__ . '/templates/form.phtml';
