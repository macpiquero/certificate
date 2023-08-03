<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class CertificateModel extends Model{
    protected $table = 'certificate';
    
    protected $allowedFields = [
        'id',
        'participant_id',
        'lesson_id',
        'path',
        'created_at'
    ];

    public function getLessons() {
      $sql = $this->select('*');
      $query = $sql->get();
       
      return $query->getResult();
    }   
}