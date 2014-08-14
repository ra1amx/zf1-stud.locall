<?php
class News_Form_News extends Zend_Form
{

    private $options;

    public function __construct($options = null)
    {
        parent::__construct($options);
                $this->setName('news');
        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');
        $head = new Zend_Form_Element_Text('head');
        $head->setLabel('Заголовок')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty')
           ;
        
        $anons = new Zend_Form_Element_Textarea('anons');
        $anons->setLabel('Анонс')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty')
                ;
            
        $txt = new Zend_Form_Element_Textarea ('txt');
        $txt->setLabel('Текст новости')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty')            
                ;     
             //$val = new Zend_Form_Element_Text ('val');
        //$val->setLabel('Опубликовано 1/ Черновик 0')
            //->addFilter('StripTags')
            //->addFilter('StringTrim')
            //->addValidator('NotEmpty') ;     
        $val = new Zend_Form_Element_Checkbox('val');
      $val->setLabel('Сделать новость общедоступной')

              ->addValidator('NotEmpty');
        $submit = new Zend_Form_Element_Submit('submit');
        
        $submit->setAttrib('id', 'submitbutton');   
               
$this->addElements(array($id, $head, $anons, $txt, $submit, $val));
    }
}

