<?php

class News_Model_DbTable_News extends Zend_Db_Table_Abstract
{   
    protected $_name = 'news';
    protected $_sequence = true;
   
     public function getNews($id){
    $val = (int)$val;
             
    $row = $this->fetchRow('id ='.$id);
    if(!$row){
    throw new Exception('Could not find row'.$id);}
    return $row;
    
    }
    
    public function addNews($head, $anons, $txt, $val) {
        //$this->view->title = "Добавить";
        
        $date = date('Y-m-d H:i:s');
        $data = array(
            'time_cd' => $date,
            'head' => $head, 
            'anons' => $anons,
            'txt' => $txt,
            'val' => $val
                );
        
        $this->insert($data);
    }
    
    public function updateNews($id, $head, $anons, $txt) {
       // $this->view->title = "save";
        $date = date('Y-m-d H:i:s');
        $data = array(
            'time_ed' => $date,
            'head' => $head,
            'anons' => $anons,
                'txt' => $txt
                );
        $this->update($data, 'id ='.$id);
        
    }
    
public function deleteNews($id)
    {        
    
    $this->delete('id =' . (int)$id);
    }
    
}