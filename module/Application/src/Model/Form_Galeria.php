<?php 

namespace Application\Model;

class Form_Galeria extends \Zend\Form\Form {

    public function __construct()
    {
        parent::__construct();

        $this->add( [
            'name' => 'descricao',
            'type' => \Zend\Form\Element\Text::class,
            'options' => [
                'label' => 'Descrição'
            ],
            'attributes' => [
                'id' => 'descricao',
                'class' => 'form-control'
            ]
        ] );
        
        $this->add( [
            'name' => 'arquivo',
            'type' => \Zend\Form\Element\File::class,
            'options' => [
                'label' => 'Arquivo'
            ],
            'attributes' => [
                'id' => 'arquivo',
                'class' => 'form-control'
            ]
        ] );
        
        $this->add( [
            'name' => 'submit',
            'type' => \Zend\Form\Element\Submit::class,
            'attributes' => [
                'id' => 'submit',
                'value' => 'Enviar',
                'class' => 'btn btn-success'
            ]
        ] );

        $this->addInputFilter();
    }

    public function addInputFilter()
    {
        $inputFilter = new \Zend\InputFilter\InputFilter();

        // File Input
        $fileInput = new \Zend\InputFilter\FileInput('arquivo');
        //$fileInput->setRequired(true);
        $fileInput->getFilterChain()->attachByName(
            'filerenameupload',
            array(
                'target'    => './data/avatar.png',
                'randomize' => true,
            )
        );
        $inputFilter->add($fileInput);

        $this->setInputFilter($inputFilter);

    }
}