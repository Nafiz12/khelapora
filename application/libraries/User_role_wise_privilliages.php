<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_role_wise_privilliages {

    public function generate_role_data() {
        $a = array();

       

        $a['General Configuration']['Organization_configurations']['name'] = 'Organization Configurations';
        $a['General Configuration']['Organization_configurations']['function']['index']['name'] = 'View';
        $a['General Configuration']['Organization_configurations']['function']['add']['name'] = 'Add';
        $a['General Configuration']['Organization_configurations']['function']['edit']['name'] = 'Edit';
        $a['General Configuration']['Organization_configurations']['function']['delete']['name'] = 'Delete';

        
        // $a['General Configuration']['Admins']['name'] = 'Admins';
        // $a['General Configuration']['Admins']['function']['index']['name'] = 'View';
        // $a['General Configuration']['Admins']['function']['add']['name'] = 'Add';
        // $a['General Configuration']['Admins']['function']['edit']['name'] = 'Edit';
        // $a['General Configuration']['Admins']['function']['delete']['name'] = 'Delete';

        // $a['General Configuration']['Change_passwords']['name'] = 'Change_passwords';
        // $a['General Configuration']['Change_passwords']['function']['index']['name'] = 'View';
        // $a['General Configuration']['Change_passwords']['function']['add']['name'] = 'Add';
        // $a['General Configuration']['Change_passwords']['function']['edit']['name'] = 'Edit';
        // $a['General Configuration']['Change_passwords']['function']['delete']['name'] = 'Delete';

        $a['General Configuration']['Feature_slideshows']['name'] = 'Manage Feature Slideshow';
        $a['General Configuration']['Feature_slideshows']['function']['index']['name'] = 'View';
        $a['General Configuration']['Feature_slideshows']['function']['add']['name'] = 'Add';
        $a['General Configuration']['Feature_slideshows']['function']['edit']['name'] = 'Edit';
        $a['General Configuration']['Feature_slideshows']['function']['delete']['name'] = 'Delete';

        $a['General Configuration']['Notice_boards']['name'] = 'Manage Notice';
        $a['General Configuration']['Notice_boards']['function']['index']['name'] = 'View';
        $a['General Configuration']['Notice_boards']['function']['add']['name'] = 'Add';
        $a['General Configuration']['Notice_boards']['function']['edit']['name'] = 'Edit';
        $a['General Configuration']['Notice_boards']['function']['delete']['name'] = 'Delete';

        $a['General Configuration']['Manage_speches']['name'] = 'Manage Spech';
        $a['General Configuration']['Manage_speches']['function']['index']['name'] = 'View';
        $a['General Configuration']['Manage_speches']['function']['add']['name'] = 'Add';
        $a['General Configuration']['Manage_speches']['function']['edit']['name'] = 'Edit';
        $a['General Configuration']['Manage_speches']['function']['delete']['name'] = 'Delete';

        $a['General Configuration']['News_events']['name'] = 'Manage News & Events';
        $a['General Configuration']['News_events']['function']['index']['name'] = 'View';
        $a['General Configuration']['News_events']['function']['add']['name'] = 'Add';
        $a['General Configuration']['News_events']['function']['edit']['name'] = 'Edit';
        $a['General Configuration']['News_events']['function']['delete']['name'] = 'Delete';

        $a['General Configuration']['Achievements']['name'] = 'Manage Achievements';
        $a['General Configuration']['Achievements']['function']['index']['name'] = 'View';
        $a['General Configuration']['Achievements']['function']['add']['name'] = 'Add';
        $a['General Configuration']['Achievements']['function']['edit']['name'] = 'Edit';
        $a['General Configuration']['Achievements']['function']['delete']['name'] = 'Delete';

        $a['General Configuration']['Lectures']['name'] = 'Manage Lectures';
        $a['General Configuration']['Lectures']['function']['index']['name'] = 'View';
        $a['General Configuration']['Lectures']['function']['add']['name'] = 'Add';
        $a['General Configuration']['Lectures']['function']['edit']['name'] = 'Edit';
        $a['General Configuration']['Lectures']['function']['delete']['name'] = 'Delete';


        $a['General Configuration']['Important_links']['name'] = 'Important links';
        $a['General Configuration']['Important_links']['function']['index']['name'] = 'View';
        $a['General Configuration']['Important_links']['function']['add']['name'] = 'Add';
        $a['General Configuration']['Important_links']['function']['edit']['name'] = 'Edit';
        $a['General Configuration']['Important_links']['function']['delete']['name'] = 'Delete';


        // $a['Holiday Notice']['Holiday_configs']['name'] = 'Config Holiday';
        // $a['Holiday Notice']['Holiday_configs']['function']['index']['name'] = 'View';
        // $a['Holiday Notice']['Holiday_configs']['function']['add']['name'] = 'Add';
        // $a['Holiday Notice']['Holiday_configs']['function']['edit']['name'] = 'Edit';
        // $a['Holiday Notice']['Holiday_configs']['function']['delete']['name'] = 'Delete';


        // $a['Holiday Notice']['Create_notices']['name'] = 'Create Notice';
        // $a['Holiday Notice']['Create_notices']['function']['index']['name'] = 'View';
        // $a['Holiday Notice']['Create_notices']['function']['add']['name'] = 'Add';
        // $a['Holiday Notice']['Create_notices']['function']['edit']['name'] = 'Edit';
        // $a['Holiday Notice']['Create_notices']['function']['delete']['name'] = 'Delete';





        // $a['Employee']['Employee_designations']['name'] = 'Employee Designations';
        // $a['Employee']['Employee_designations']['function']['index']['name'] = 'View';
        // $a['Employee']['Employee_designations']['function']['add']['name'] = 'Add';
        // $a['Employee']['Employee_designations']['function']['edit']['name'] = 'Edit';
        // $a['Employee']['Employee_designations']['function']['delete']['name'] = 'Delete';

        // $a['Employee']['Employees']['name'] = 'Employee ';
        // $a['Employee']['Employees']['function']['index']['name'] = 'View';
        // $a['Employee']['Employees']['function']['add']['name'] = 'Add';
        // $a['Employee']['Employees']['function']['edit']['name'] = 'Edit';
        // $a['Employee']['Employees']['function']['delete']['name'] = 'Delete';

        
 
        // $a['Student Management']['Student_admissions']['name'] = 'Student Admission';
        // $a['Student Management']['Student_admissions']['function']['index']['name'] = 'View';
        // $a['Student Management']['Student_admissions']['function']['add']['name'] = 'Add';
        // $a['Student Management']['Student_admissions']['function']['edit']['name'] = 'Edit';
        // $a['Student Management']['Student_admissions']['function']['delete']['name'] = 'Delete';
        

        
        $a['Manage Users']['users']['name'] = 'User';
        $a['Manage Users']['users']['function']['index']['name'] = 'View';
        $a['Manage Users']['users']['function']['add']['name'] = 'Add';
        $a['Manage Users']['users']['function']['edit']['name'] = 'Edit';
        $a['Manage Users']['users']['function']['delete']['name'] = 'Delete';
        $a['Manage Users']['users']['function']['change_password']['name'] = 'Change Password';

        

        $a['Manage Users']['user_roles']['name'] = 'User Role Manager';
        $a['Manage Users']['user_roles']['function']['index']['name'] = 'View';
        $a['Manage Users']['user_roles']['function']['add']['name'] = 'Add';
        $a['Manage Users']['user_roles']['function']['edit']['name'] = 'Edit';
        $a['Manage Users']['user_roles']['function']['delete']['name'] = 'Delete';
        $a['Manage Users']['user_roles']['function']['user_role_wise_privillige']['name'] = 'User Role Wise Previlize';



        return $a;
    }

    public function generate_menu_data() {
        $a = array();

        // $a['General Configuration']['Admins']['index']['name'] = 'Admins ';
        // $a['General Configuration']['Admins']['index']['link'] = base_url() . "index.php/Admins/index";
        // $a['General Configuration']['Admins']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['General Configuration']['Admins']['function']['edit']['name'] = 'Edit';
        // $a['General Configuration']['Admins']['index']['group'] = 'General Configuration';

        // $a['General Configuration']['Change_passwords']['index']['name'] = 'Change Passwords ';
        // $a['General Configuration']['Change_passwords']['index']['link'] = base_url() . "index.php/Change_passwords/index";
        // $a['General Configuration']['Change_passwords']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['General Configuration']['Change_passwords']['function']['edit']['name'] = 'Edit';
        // $a['General Configuration']['Change_passwords']['index']['group'] = 'General Configuration';

      
        $a['General Configuration']['Organization_configurations']['index']['name'] = 'Organization Configurations ';
        $a['General Configuration']['Organization_configurations']['index']['link'] = base_url() . "index.php/Organization_configurations/index";
        $a['General Configuration']['Organization_configurations']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['General Configuration']['Organization_configurations']['function']['edit']['name'] = 'Edit';
        $a['General Configuration']['Organization_configurations']['index']['group'] = 'General Configuration';

        
      
        $a['General Configuration']['Feature_slideshows']['index']['name'] = 'Manage Feature Slideshow ';
        $a['General Configuration']['Feature_slideshows']['index']['link'] = base_url() . "index.php/Feature_slideshows/index";
        $a['General Configuration']['Feature_slideshows']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['General Configuration']['Feature_slideshows']['function']['edit']['name'] = 'Edit';
        $a['General Configuration']['Feature_slideshows']['index']['group'] = 'General Configuration';

        $a['General Configuration']['Notice_boards']['index']['name'] = 'Manage Notice ';
        $a['General Configuration']['Notice_boards']['index']['link'] = base_url() . "index.php/Notice_boards/index";
        $a['General Configuration']['Notice_boards']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['General Configuration']['Notice_boards']['function']['edit']['name'] = 'Edit';
        $a['General Configuration']['Notice_boards']['index']['group'] = 'General Configuration';

        $a['General Configuration']['Manage_speches']['index']['name'] = 'Manage Spech ';
        $a['General Configuration']['Manage_speches']['index']['link'] = base_url() . "index.php/Manage_speches/index";
        $a['General Configuration']['Manage_speches']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['General Configuration']['Manage_speches']['function']['edit']['name'] = 'Edit';
        $a['General Configuration']['Manage_speches']['index']['group'] = 'General Configuration';


        $a['General Configuration']['News_events']['index']['name'] = 'Manage News & Events ';
        $a['General Configuration']['News_events']['index']['link'] = base_url() . "index.php/News_events/index";
        $a['General Configuration']['News_events']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['General Configuration']['News_events']['function']['edit']['name'] = 'Edit';
        $a['General Configuration']['News_events']['index']['group'] = 'General Configuration';


        $a['General Configuration']['Achievements']['index']['name'] = 'Manage Achievements ';
        $a['General Configuration']['Achievements']['index']['link'] = base_url() . "index.php/Achievements/index";
        $a['General Configuration']['Achievements']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['General Configuration']['Achievements']['function']['edit']['name'] = 'Edit';
        $a['General Configuration']['Achievements']['index']['group'] = 'General Configuration';

        $a['General Configuration']['Lectures']['index']['name'] = 'Manage Lectures ';
        $a['General Configuration']['Lectures']['index']['link'] = base_url() . "index.php/Lectures/index";
        $a['General Configuration']['Lectures']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['General Configuration']['Lectures']['function']['edit']['name'] = 'Edit';
        $a['General Configuration']['Lectures']['index']['group'] = 'General Configuration';


        $a['General Configuration']['Important_links']['index']['name'] = 'Important links ';
        $a['General Configuration']['Important_links']['index']['link'] = base_url() . "index.php/Important_links/index";
        $a['General Configuration']['Important_links']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['General Configuration']['Important_links']['function']['edit']['name'] = 'Edit';
        $a['General Configuration']['Important_links']['index']['group'] = 'General Configuration';

        // $a['Holiday Notice']['Holiday_configs']['index']['name'] = 'Holiday Config ';
        // $a['Holiday Notice']['Holiday_configs']['index']['link'] = base_url() . "index.php/Holiday_configs/add";
        // $a['Holiday Notice']['Holiday_configs']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Holiday Notice']['Holiday_configs']['function']['edit']['name'] = 'Edit';
        // $a['Holiday Notice']['Holiday_configs']['index']['group'] = 'Holiday Notice';


        // $a['Holiday Notice']['Create_notices']['index']['name'] = 'Create Notice ';
        // $a['Holiday Notice']['Create_notices']['index']['link'] = base_url() . "index.php/Create_notices/add";
        // $a['Holiday Notice']['Create_notices']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Holiday Notice']['Create_notices']['function']['edit']['name'] = 'Edit';
        // $a['Holiday Notice']['Create_notices']['index']['group'] = 'Holiday Notice';




        // $a['Employee']['Employee_designations']['index']['name'] = 'Employee Designations';
        // $a['Employee']['Employee_designations']['index']['link'] = base_url() . "index.php/Employee_designations/add";
        // $a['Employee']['Employee_designations']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Employee']['Employee_designations']['function']['edit']['name'] = 'Edit';
        // $a['Employee']['Employee_designations']['index']['group'] = 'Employee';

        // $a['Employee']['Employees']['index']['name'] = 'Employees';
        // $a['Employee']['Employees']['index']['link'] = base_url() . "index.php/Employees/index";
        // $a['Employee']['Employees']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Employee']['Employees']['function']['edit']['name'] = 'Edit';
        // $a['Employee']['Employees']['index']['group'] = 'Employee';

       

       

       

        // $a['Student Management']['Student_admissions']['index']['name'] = 'Student Admission';
        // $a['Student Management']['Student_admissions']['index']['link'] = base_url() . "index.php/Student_admissions/index";
        // $a['Student Management']['Student_admissions']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Student Management']['Student_admissions']['index']['group'] = 'Student Management';


        $a['Manage Users']['users']['index']['name'] = 'Users';
        $a['Manage Users']['users']['index']['link'] = base_url() . "index.php/users/index";
        $a['Manage Users']['users']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Manage Users']['users']['index']['group'] = 'Manage Users';

       
        $a['Manage Users']['user_roles']['index']['name'] = 'User Roll Manager';
        $a['Manage Users']['user_roles']['index']['link'] = base_url() . "index.php/user_roles/index";
        $a['Manage Users']['user_roles']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Manage Users']['user_roles']['index']['group'] = 'Manage Users';




        //echo "<pre>"; print_r($a);
        return $a;
    }

}