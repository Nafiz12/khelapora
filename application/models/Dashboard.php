<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property  session
 */
class Dashboard extends CI_Model
{

    /**
     * @param $login_data
     * @return bool
     */
    public function get_data_for_graph()
    {
//       echo "<pre>";print_r($login_data);die;
        $query = $this->db->query('SELECT COUNT(student_admission.id) AS total_student, class.class_name FROM student_admission JOIN class ON student_admission.class = class.id  GROUP BY class')->result_array();
        return $query;

        }





}
