<?php
/** application/libraries/MY_Form_validation **/
class MY_Form_validation extends CI_Form_validation
{
  public $CI;

  public function is_unique($str, $field) {
    sscanf($field, '%[^.].%[^.]', $table, $field);
    //return isset($this->CI->db)
    return is_object($this->CI->db)
    ? ($this->CI->db->limit(1)->get_where($table, array($field => $str))->num_rows() === 0)
    : FALSE;
  }
}