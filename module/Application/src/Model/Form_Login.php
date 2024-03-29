<?php 

namespace Application\Model;

class Form_Login extends \Zend\Form\Form {

    public function __construct()
    {
        parent::__construct();

        $this->add( [
            'name' => 'username',
            'type' => \Zend\Form\Element\Text::class,
            'options' => [
                'label' => 'Usuário'
            ],
            'attributes' => [
                'id' => 'username',
                'class' => 'form-control'
            ]
        ] );

        $this->add( [
            'name' => 'password',
            'type' => \Zend\Form\Element\Password::class,
            'options' => [
                'label' => 'Senha'
            ],
            'attributes' => [
                'id' => 'password',
                'class' => 'form-control'
            ]
        ] );
        
        $this->add( [
            'name' => 'submit',
            'type' => \Zend\Form\Element\Submit::class,
            'attributes' => [
                'id' => 'submit',
                'value' => 'Logar',
                'class' => 'btn btn-success'
            ]
        ] );
    }
}