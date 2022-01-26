<?php
class Config_class_routine extends CI_Model{
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function get_list($limit = null, $offset = null, $cond = null)
    {
        if (is_array($cond)) {
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('config_class_routines.BranchId', $cond['BranchId']);
            }
        }
        $this->db->select('config_class_routines.*,config_classes.ClassName,config_sections.`SectionName`');
        $this->db->from('config_class_routines');
        $this->db->join('config_classes', 'config_class_routines.ClassId = config_classes.ClassId');
        $this->db->join('config_sections', 'config_class_routines.SectionId = config_sections.SectionId');
        $this->db->group_by('config_class_routines.ClassId');
        $this->db->group_by('config_class_routines.SectionId');
        if (isset($limit) && $limit > 0) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get()->result();

    }
    function row_count($cond = null)
    {
        if (is_array($cond)) {
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('config_class_routines.BranchId', $cond['BranchId']);
            }
        }
        $this->db->select('config_class_routines.*');
        return $this->db->count_all_results('config_class_routines');
    }
    function add($data) {
        return $this->db->insert('config_class_routines', $data);
    }
    function read($id){
        return $this->db->get_where('config_class_routines',array('RoutineId'=>$id))->row();
    }
    function read_routine($id){
        $this->db->select('config_class_routines.*,config_classes.ClassName,config_sections.`SectionName`');
        $this->db->from('config_class_routines');
        $this->db->join('config_classes', 'config_class_routines.ClassId = config_classes.ClassId');
        $this->db->join('config_sections', 'config_class_routines.SectionId = config_sections.SectionId');
        $this->db->where('config_class_routines.RoutineId', $id);
        return $this->db->get()->row();
    }
    function edit($data){
        //echo"<pre>"; print_r($data); die;
        return $this->db->update('config_class_routines', $data, array('RoutineId'=> $data['RoutineId']));
    }
    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('config_class_routines', array('RoutineId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function get_routine_information_by_routine_id($routine_id){
        $routine_information = $this->read($routine_id);
        $query = "SELECT config_class_routines.*,config_subjects.`SubjectName`,employees.`EmployeeName`,config_class_periods.`PeriodName`
                    FROM `config_class_routines`
                    JOIN `config_classes` ON config_class_routines.`ClassId` = config_classes.`ClassId`
                    JOIN `config_sections` ON config_class_routines.`SectionId` = config_sections.`SectionId`
                    JOIN `config_subjects` ON config_class_routines.`SubjectId` = config_subjects.`SubjectId`
                    JOIN `employees` ON config_class_routines.`EmployeeId` = employees.`EmployeeId`
                    JOIN `config_class_periods` ON config_class_routines.`PeriodId` = config_class_periods.`PeriodId`
                    WHERE config_class_routines.ClassId = $routine_information->ClassId
                    AND config_class_routines.SectionId = $routine_information->SectionId";
        $query = $this->db->query($query);
        $query = $query->result();
        $routine_array = array();
        foreach($query as $row){
            $routine_array[$row->Day][$row->PeriodId]['Day'] = $row->Day;
            $routine_array[$row->Day][$row->PeriodId]['PeriodId'] = $row->PeriodId;
            $routine_array[$row->Day][$row->PeriodId]['RoutineId'] = $row->RoutineId;
            $routine_array[$row->Day][$row->PeriodId]['PeriodName'] = $row->PeriodName;
            $routine_array[$row->Day][$row->PeriodId]['SubjectName'] = $row->SubjectName;
            $routine_array[$row->Day][$row->PeriodId]['EmployeeName'] = $row->EmployeeName;
            $routine_array[$row->Day][$row->PeriodId]['RoomNumber'] = $row->RoomNumber;
            $routine_array[$row->Day][$row->PeriodId]['Shift'] = $row->Shift;
            $routine_array[$row->Day][$row->PeriodId]['Medium'] = $row->Medium;
        }
        return $routine_array;
    }
    function get_routine_information_by_class_day($data){
        $classId=$data['ClassId'];
        $Shift=$data['Shift'];
        $day=$data['Day'];
        $query = "SELECT config_class_routines.*,config_subjects.`SubjectName`,employees.`EmployeeName`,config_class_periods.`PeriodName` 
                    FROM `config_class_routines`
                    JOIN `config_classes` ON config_class_routines.`ClassId` = config_classes.`ClassId`
                    JOIN `config_sections` ON config_class_routines.`SectionId` = config_sections.`SectionId`
                    JOIN `config_subjects` ON config_class_routines.`SubjectId` = config_subjects.`SubjectId`
                    JOIN `employees` ON config_class_routines.`EmployeeId` = employees.`EmployeeId`
                    JOIN `config_class_periods` ON config_class_routines.`PeriodId` = config_class_periods.`PeriodId`
                    WHERE config_class_routines.`ClassId`='$classId'
                    AND config_class_routines.`Shift` = '$Shift'
                    AND config_class_routines.`Day`='$day'";
        $query = $this->db->query($query);
        $query = $query->result();
        $routine_array = array();
        foreach($query as $row){
            $routine_array[$row->PeriodId][$row->SectionId]['Day'] = $row->Day;
            $routine_array[$row->PeriodId][$row->SectionId]['ClassId'] = $row->ClassId;
            $routine_array[$row->PeriodId][$row->SectionId]['PeriodId'] = $row->PeriodId;
            $routine_array[$row->PeriodId][$row->SectionId]['SectionId'] = $row->SectionId;
            $routine_array[$row->PeriodId][$row->SectionId]['RoutineId'] = $row->RoutineId;
            $routine_array[$row->PeriodId][$row->SectionId]['PeriodName'] = $row->PeriodName;
            $routine_array[$row->PeriodId][$row->SectionId]['SubjectName'] = $row->SubjectName;
            $routine_array[$row->PeriodId][$row->SectionId]['EmployeeName'] = $row->EmployeeName;
            $routine_array[$row->PeriodId][$row->SectionId]['RoomNumber'] = $row->RoomNumber;
            $routine_array[$row->PeriodId][$row->SectionId]['Shift'] = $row->Shift;
            $routine_array[$row->PeriodId][$row->SectionId]['Medium'] = $row->Medium;
        }
        return $routine_array;
    }
    function check_duplicate_entry($Day,$PeriodId,$ClassId,$SectionId){
        $query = "SELECT IFNULL(COUNT(RoutineId),0) AS RoutineId
                    FROM `config_class_routines`
                    WHERE ClassId = $ClassId
                    AND SectionId = $SectionId
                    AND PeriodId = $PeriodId
                    AND DAY='$Day'";
        return $this->db->query($query)->row()->RoutineId;
    }
    function check_duplicate_entry_for_subject($Day,$SubjectId,$ClassId,$SectionId){
        $query = "SELECT IFNULL(COUNT(RoutineId),0) AS RoutineId
                    FROM `config_class_routines`
                    WHERE ClassId = $ClassId
                    AND SectionId = $SectionId
                    AND SubjectId = $SubjectId
                    AND DAY='$Day'";
        return $this->db->query($query)->row()->RoutineId;
    }
}
