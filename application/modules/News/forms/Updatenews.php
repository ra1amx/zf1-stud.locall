<?php
class News_Form_Updatenews extends Zend_Form
{
    public function init()
    {
        $this->setName('Update');
      //  $this->setMethod('post');
        
        $head = new Zend_Form_Element_Text('head');
        $head->setLabel('head')
                ->setRequired(true)
                ->addValidator('NotEmpty')
                ->addFilter('StripTags')
                ->addFilter('StringTrim');
        
        $anons = new Zend_Form_Element_Text('anons');
        $anons->setLabel('anons')
                ->setRequired(true)
                ->addValidator('NotEmpty')
                ->addFilter('StripTags')
                ->addFilter('StringTrim');
        
        $txt = new Zend_Form_Element_Text('txt');
        $txt->setLabel('txt')
                ->setRequired(true)
                ->addValidator('NotEmpty')
                ->addFilter('StripTags')
                ->addFilter('StringTrim');
        
        $update = new Zend_Form_Element_Submit('update');
        $update->setLabel('update');
        $this->setElements(array($head, $anons, $txt, $update));
    }


}