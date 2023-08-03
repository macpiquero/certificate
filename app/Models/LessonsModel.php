<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class LessonsModel extends Model{
    protected $table = 'lessons';
    
    protected $allowedFields = [
        'id',
        'title',
    ];

    public function getLessons() {
      $sql = $this->select('*');
      $query = $sql->get();
       
      return $query->getResult();
    }   
}