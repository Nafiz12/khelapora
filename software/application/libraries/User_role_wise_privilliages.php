<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_role_wise_privilliages {

    public function generate_role_data() {
        $a = array();

        $a['Configuration']['branches']['name'] = 'Branch';
        $a['Configuration']['branches']['function']['index']['name'] = 'View';
        $a['Configuration']['branches']['function']['add']['name'] = 'Add';
        $a['Configuration']['branches']['function']['edit']['name'] = 'Edit';
        $a['Configuration']['branches']['function']['delete']['name'] = 'Delete';

        $a['Configuration']['organizations']['name'] = 'General Configuration';
        $a['Configuration']['organizations']['function']['index']['name'] = 'View';
        $a['Configuration']['organizations']['function']['add']['name'] = 'Add';
        $a['Configuration']['organizations']['function']['edit']['name'] = 'Edit';
        $a['Configuration']['organizations']['function']['delete']['name'] = 'Delete';

        $a['Configuration']['config_classes']['name'] = 'Manage Course';
        $a['Configuration']['config_classes']['function']['index']['name'] = 'View';
        $a['Configuration']['config_classes']['function']['add']['name'] = 'Add';
        $a['Configuration']['config_classes']['function']['edit']['name'] = 'Edit';
        $a['Configuration']['config_classes']['function']['delete']['name'] = 'Delete';

        // $a['Configuration']['config_sections']['name'] = 'Section/Batch';
        // $a['Configuration']['config_sections']['function']['index']['name'] = 'View';
        // $a['Configuration']['config_sections']['function']['add']['name'] = 'Add';
        // $a['Configuration']['config_sections']['function']['edit']['name'] = 'Edit';
        // $a['Configuration']['config_sections']['function']['delete']['name'] = 'Delete';

        $a['Configuration']['config_subjects']['name'] = 'Subject';
        $a['Configuration']['config_subjects']['function']['index']['name'] = 'View';
        $a['Configuration']['config_subjects']['function']['add']['name'] = 'Add';
        $a['Configuration']['config_subjects']['function']['edit']['name'] = 'Edit';
        $a['Configuration']['config_subjects']['function']['delete']['name'] = 'Delete';

        $a['Configuration']['config_class_periods']['name'] = 'Manage Batch';
        $a['Configuration']['config_class_periods']['function']['index']['name'] = 'View';
        $a['Configuration']['config_class_periods']['function']['add']['name'] = 'Add';
        $a['Configuration']['config_class_periods']['function']['edit']['name'] = 'Edit';
        $a['Configuration']['config_class_periods']['function']['delete']['name'] = 'Delete';


        // $a['Configuration']['config_class_routines']['name'] = 'Class Routine';
        // $a['Configuration']['config_class_routines']['function']['index']['name'] = 'View';
        // $a['Configuration']['config_class_routines']['function']['add']['name'] = 'Add';
        // $a['Configuration']['config_class_routines']['function']['edit']['name'] = 'Edit';
        // $a['Configuration']['config_class_routines']['function']['delete']['name'] = 'Delete';

        $a['Students']['students']['name'] = 'Students';
        $a['Students']['students']['function']['index']['name'] = 'View';
        $a['Students']['students']['function']['add']['name'] = 'Add';
        $a['Students']['students']['function']['edit']['name'] = 'Edit';
        $a['Students']['students']['function']['delete']['name'] = 'Delete';


        // $a['Students']['batch_students']['name'] = 'Student Migration';
        // $a['Students']['batch_students']['function']['index']['name'] = 'View';
        // $a['Students']['batch_students']['function']['add']['name'] = 'Add';
        // $a['Students']['batch_students']['function']['edit']['name'] = 'Edit';
        // $a['Students']['batch_students']['function']['delete']['name'] = 'Delete';

        $a['Students']['student_attendances']['name'] = 'Student Attendance';
        $a['Students']['student_attendances']['function']['index']['name'] = 'View';
        $a['Students']['student_attendances']['function']['add']['name'] = 'Add';
        $a['Students']['student_attendances']['function']['edit']['name'] = 'Edit';
        $a['Students']['student_attendances']['function']['delete']['name'] = 'Delete';


        $a['Fees']['fee_categories']['name'] = 'Fee Category';
        $a['Fees']['fee_categories']['function']['index']['name'] = 'View';
        $a['Fees']['fee_categories']['function']['add']['name'] = 'Add';
        $a['Fees']['fee_categories']['function']['edit']['name'] = 'Edit';
        $a['Fees']['fee_categories']['function']['delete']['name'] = 'Delete';

        $a['Fees']['fee_types']['name'] = 'Fee Types';
        $a['Fees']['fee_types']['function']['index']['name'] = 'View';
        $a['Fees']['fee_types']['function']['add']['name'] = 'Add';
        $a['Fees']['fee_types']['function']['edit']['name'] = 'Edit';
        $a['Fees']['fee_types']['function']['delete']['name'] = 'Delete';

        $a['Fees']['fee_configurations']['name'] = 'Fee Configuration';
        $a['Fees']['fee_configurations']['function']['index']['name'] = 'View';
        $a['Fees']['fee_configurations']['function']['add']['name'] = 'Add';
        $a['Fees']['fee_configurations']['function']['edit']['name'] = 'Edit';
        $a['Fees']['fee_configurations']['function']['delete']['name'] = 'Delete';

        $a['Fees']['fees']['name'] = 'Fee Collection';
        $a['Fees']['fees']['function']['index']['name'] = 'View';
        $a['Fees']['fees']['function']['add']['name'] = 'Add';
        $a['Fees']['fees']['function']['edit']['name'] = 'Edit';
        $a['Fees']['fees']['function']['delete']['name'] = 'Delete';



        $a['Exam']['exams']['name'] = 'Manage Exam';
        $a['Exam']['exams']['function']['index']['name'] = 'View';
        $a['Exam']['exams']['function']['add']['name'] = 'Add';
        $a['Exam']['exams']['function']['edit']['name'] = 'Edit';
        $a['Exam']['exams']['function']['delete']['name'] = 'Delete';

        // $a['Exam']['exam_routines']['name'] = 'Exam Routine';
        // $a['Exam']['exam_routines']['function']['index']['name'] = 'View';
        // $a['Exam']['exam_routines']['function']['add']['name'] = 'Add';
        // $a['Exam']['exam_routines']['function']['edit']['name'] = 'Edit';
        // $a['Exam']['exam_routines']['function']['delete']['name'] = 'Delete';

        // $a['Exam']['grade_points']['name'] = 'Grade Points';
        // $a['Exam']['grade_points']['function']['index']['name'] = 'View';
        // $a['Exam']['grade_points']['function']['add']['name'] = 'Add';
        // $a['Exam']['grade_points']['function']['edit']['name'] = 'Edit';
        // $a['Exam']['grade_points']['function']['delete']['name'] = 'Delete';



        // $a['Exam']['subject_wise_marks']['name'] = 'Subject Wise Marks';
        // $a['Exam']['subject_wise_marks']['function']['index']['name'] = 'View';
        // $a['Exam']['subject_wise_marks']['function']['add']['name'] = 'Add';
        // $a['Exam']['subject_wise_marks']['function']['edit']['name'] = 'Edit';
        // $a['Exam']['subject_wise_marks']['function']['delete']['name'] = 'Delete';

        // $a['Exam']['manage_marks']['name'] = 'Manage Marks';
        // $a['Exam']['manage_marks']['function']['index']['name'] = 'View';
        // $a['Exam']['manage_marks']['function']['add']['name'] = 'Add';
        // $a['Exam']['manage_marks']['function']['edit']['name'] = 'Edit';
        // $a['Exam']['manage_marks']['function']['delete']['name'] = 'Delete';

        // $a['Exam']['report_tabulation_sheets']['name'] = 'Tabulation Sheet';
        // $a['Exam']['report_tabulation_sheets']['function']['index']['name'] = 'View';
        // $a['Exam']['report_tabulation_sheets']['function']['add']['name'] = 'Add';
        // $a['Exam']['report_tabulation_sheets']['function']['edit']['name'] = 'Edit';
        // $a['Exam']['report_tabulation_sheets']['function']['delete']['name'] = 'Delete';

        // $a['Exam']['report_mark_sheets']['name'] = 'Student Mark Sheet';
        // $a['Exam']['report_mark_sheets']['function']['index']['name'] = 'View';
        // $a['Exam']['report_mark_sheets']['function']['add']['name'] = 'Add';
        // $a['Exam']['report_mark_sheets']['function']['edit']['name'] = 'Edit';
        // $a['Exam']['report_mark_sheets']['function']['delete']['name'] = 'Delete';

        // $a['Exam']['admit_cards']['name'] = 'Admit Card';
        // $a['Exam']['admit_cards']['function']['index']['name'] = 'View';
        // $a['Exam']['admit_cards']['function']['add']['name'] = 'Add';
        // $a['Exam']['admit_cards']['function']['edit']['name'] = 'Edit';
        // $a['Exam']['admit_cards']['function']['delete']['name'] = 'Delete';

        $a['Employees']['employees']['name'] = 'Employees';
        $a['Employees']['employees']['function']['index']['name'] = 'View';
        $a['Employees']['employees']['function']['add']['name'] = 'Add';
        $a['Employees']['employees']['function']['edit']['name'] = 'Edit';
        $a['Employees']['employees']['function']['delete']['name'] = 'Delete';

        // $a['Employees']['employee_departments']['name'] = 'Employee Department';
        // $a['Employees']['employee_departments']['function']['index']['name'] = 'View';
        // $a['Employees']['employee_departments']['function']['add']['name'] = 'Add';
        // $a['Employees']['employee_departments']['function']['edit']['name'] = 'Edit';
        // $a['Employees']['employee_departments']['function']['delete']['name'] = 'Delete';

        $a['Employees']['employee_designations']['name'] = 'Employee Designation';
        $a['Employees']['employee_designations']['function']['index']['name'] = 'View';
        $a['Employees']['employee_designations']['function']['add']['name'] = 'Add';
        $a['Employees']['employee_designations']['function']['edit']['name'] = 'Edit';
        $a['Employees']['employee_designations']['function']['delete']['name'] = 'Delete';

        // $a['Employees']['employee_branch_transfers']['name'] = 'Employee Branch Transfer';
        // $a['Employees']['employee_branch_transfers']['function']['index']['name'] = 'View';
        // $a['Employees']['employee_branch_transfers']['function']['add']['name'] = 'Add';
        // $a['Employees']['employee_branch_transfers']['function']['edit']['name'] = 'Edit';
        // $a['Employees']['employee_branch_transfers']['function']['delete']['name'] = 'Delete';

        // $a['Employees']['employee_promotions']['name'] = 'Employee Promotion/Demotion';
        // $a['Employees']['employee_promotions']['function']['index']['name'] = 'View';
        // $a['Employees']['employee_promotions']['function']['add']['name'] = 'Add';
        // $a['Employees']['employee_promotions']['function']['edit']['name'] = 'Edit';
        // $a['Employees']['employee_promotions']['function']['delete']['name'] = 'Delete';

        // $a['Employees']['employee_leave_managements']['name'] = 'Employee Leave Management';
        // $a['Employees']['employee_leave_managements']['function']['index']['name'] = 'View';
        // $a['Employees']['employee_leave_managements']['function']['add']['name'] = 'Add';
        // $a['Employees']['employee_leave_managements']['function']['edit']['name'] = 'Edit';
        // $a['Employees']['employee_leave_managements']['function']['delete']['name'] = 'Delete';

        // $a['Employees']['leave_managements']['name'] = 'Leave Category';
        // $a['Employees']['leave_managements']['function']['index']['name'] = 'View';
        // $a['Employees']['leave_managements']['function']['add']['name'] = 'Add';
        // $a['Employees']['leave_managements']['function']['edit']['name'] = 'Edit';
        // $a['Employees']['leave_managements']['function']['delete']['name'] = 'Delete';
        
        // $a['Employees']['leave_applies']['name'] = 'Leave Apply';
        // $a['Employees']['leave_applies']['function']['index']['name'] = 'View';
        // $a['Employees']['leave_applies']['function']['add']['name'] = 'Add';
        // $a['Employees']['leave_applies']['function']['edit']['name'] = 'Edit';
        // $a['Employees']['leave_applies']['function']['delete']['name'] = 'Delete';
        
        // $a['Employees']['leave_authorizations']['name'] = 'Leave Authorization';
        // $a['Employees']['leave_authorizations']['function']['index']['name'] = 'View';
        // $a['Employees']['leave_authorizations']['function']['add']['name'] = 'Add';
        // $a['Employees']['leave_authorizations']['function']['edit']['name'] = 'Edit';
        // $a['Employees']['leave_authorizations']['function']['delete']['name'] = 'Delete';
        
        // $a['Employees']['leave_calculations']['name'] = 'Leave Calculatios';
        // $a['Employees']['leave_calculations']['function']['index']['name'] = 'View';
        // $a['Employees']['leave_calculations']['function']['add']['name'] = 'Add';
        // $a['Employees']['leave_calculations']['function']['edit']['name'] = 'Edit';
        // $a['Employees']['leave_calculations']['function']['delete']['name'] = 'Delete';
        
        // $a['Employees']['employee_salary_disbursements']['name'] = 'Employee Salary Disbursement';
        // $a['Employees']['employee_salary_disbursements']['function']['index']['name'] = 'View';
        // $a['Employees']['employee_salary_disbursements']['function']['add']['name'] = 'Add';
        // $a['Employees']['employee_salary_disbursements']['function']['edit']['name'] = 'Edit';
        // $a['Employees']['employee_salary_disbursements']['function']['delete']['name'] = 'Delete';

        // $a['Employees']['employee_attendances']['name'] = 'Employee Attendance';
        // $a['Employees']['employee_attendances']['function']['index']['name'] = 'View';
        // $a['Employees']['employee_attendances']['function']['add']['name'] = 'Add';
        // $a['Employees']['employee_attendances']['function']['edit']['name'] = 'Edit';
        // $a['Employees']['employee_attendances']['function']['delete']['name'] = 'Delete';

        $a['Accounting']['ac_ledgers']['name'] = 'Ledger Accounts';
        $a['Accounting']['ac_ledgers']['function']['index']['name'] = 'View';
        $a['Accounting']['ac_ledgers']['function']['add']['name'] = 'Add';
        $a['Accounting']['ac_ledgers']['function']['edit']['name'] = 'Edit';
        $a['Accounting']['ac_ledgers']['function']['delete']['name'] = 'Delete';

        $a['Accounting']['ac_opening_balances']['name'] = 'Opening Balances';
        $a['Accounting']['ac_opening_balances']['function']['index']['name'] = 'View';
        $a['Accounting']['ac_opening_balances']['function']['add']['name'] = 'Add';
        $a['Accounting']['ac_opening_balances']['function']['edit']['name'] = 'Edit';
        $a['Accounting']['ac_opening_balances']['function']['delete']['name'] = 'Delete';

        $a['Accounting']['ac_vouchers']['name'] = 'Voucher List';
        $a['Accounting']['ac_vouchers']['function']['index']['name'] = 'View';
        $a['Accounting']['ac_vouchers']['function']['add']['name'] = 'Add';
        $a['Accounting']['ac_vouchers']['function']['edit']['name'] = 'Edit';
        $a['Accounting']['ac_vouchers']['function']['delete']['name'] = 'Delete';

        $a['Accounting']['ac_payment_vouchers']['name'] = 'Payment Voucher';
        $a['Accounting']['ac_payment_vouchers']['function']['index']['name'] = 'View';
        $a['Accounting']['ac_payment_vouchers']['function']['add']['name'] = 'Add';
        $a['Accounting']['ac_payment_vouchers']['function']['edit']['name'] = 'Edit';
        $a['Accounting']['ac_payment_vouchers']['function']['delete']['name'] = 'Delete';

        $a['Accounting']['ac_receipt_vouchers']['name'] = 'Receipt Voucher';
        $a['Accounting']['ac_receipt_vouchers']['function']['index']['name'] = 'View';
        $a['Accounting']['ac_receipt_vouchers']['function']['add']['name'] = 'Add';
        $a['Accounting']['ac_receipt_vouchers']['function']['edit']['name'] = 'Edit';
        $a['Accounting']['ac_receipt_vouchers']['function']['delete']['name'] = 'Delete';

        $a['SheetManagement']['authors']['name'] = 'Authors';
        $a['SheetManagement']['authors']['function']['index']['name'] = 'View';
        $a['SheetManagement']['authors']['function']['add']['name'] = 'Add';
        $a['SheetManagement']['authors']['function']['edit']['name'] = 'Edit';
        $a['SheetManagement']['authors']['function']['delete']['name'] = 'Delete';

        $a['SheetManagement']['book_types']['name'] = 'Sheet Types';
        $a['SheetManagement']['book_types']['function']['index']['name'] = 'View';
        $a['SheetManagement']['book_types']['function']['add']['name'] = 'Add';
        $a['SheetManagement']['book_types']['function']['edit']['name'] = 'Edit';
        $a['SheetManagement']['book_types']['function']['delete']['name'] = 'Delete';

        $a['SheetManagement']['books']['name'] = 'Sheets';
        $a['SheetManagement']['books']['function']['index']['name'] = 'View';
        $a['SheetManagement']['books']['function']['add']['name'] = 'Add';
        $a['SheetManagement']['books']['function']['edit']['name'] = 'Edit';
        $a['SheetManagement']['books']['function']['delete']['name'] = 'Delete';

        $a['SheetManagement']['manage_library_books']['name'] = 'Manage Sheets';
        $a['SheetManagement']['manage_library_books']['function']['index']['name'] = 'View';
        $a['SheetManagement']['manage_library_books']['function']['add']['name'] = 'Add';
        $a['SheetManagement']['manage_library_books']['function']['edit']['name'] = 'Edit';
        $a['SheetManagement']['manage_library_books']['function']['delete']['name'] = 'Delete';

        // $a['Dormitory']['dormitories']['name'] = 'Dormitory';
        // $a['Dormitory']['dormitories']['function']['index']['name'] = 'View';
        // $a['Dormitory']['dormitories']['function']['add']['name'] = 'Add';
        // $a['Dormitory']['dormitories']['function']['edit']['name'] = 'Edit';
        // $a['Dormitory']['dormitories']['function']['delete']['name'] = 'Delete';

        // $a['Dormitory']['student_dormitories']['name'] = 'Student Dormitory';
        // $a['Dormitory']['student_dormitories']['function']['index']['name'] = 'View';
        // $a['Dormitory']['student_dormitories']['function']['add']['name'] = 'Add';
        // $a['Dormitory']['student_dormitories']['function']['edit']['name'] = 'Edit';
        // $a['Dormitory']['student_dormitories']['function']['delete']['name'] = 'Delete';

        // $a['Transport']['transport_routes']['name'] = 'Routes';
        // $a['Transport']['transport_routes']['function']['index']['name'] = 'View';
        // $a['Transport']['transport_routes']['function']['add']['name'] = 'Add';
        // $a['Transport']['transport_routes']['function']['edit']['name'] = 'Edit';
        // $a['Transport']['transport_routes']['function']['delete']['name'] = 'Delete';

        // $a['Transport']['transports']['name'] = 'Transport';
        // $a['Transport']['transports']['function']['index']['name'] = 'View';
        // $a['Transport']['transports']['function']['add']['name'] = 'Add';
        // $a['Transport']['transports']['function']['edit']['name'] = 'Edit';
        // $a['Transport']['transports']['function']['delete']['name'] = 'Delete';

        $a['User Information']['users']['name'] = 'User';
        $a['User Information']['users']['function']['index']['name'] = 'View';
        $a['User Information']['users']['function']['add']['name'] = 'Add';
        $a['User Information']['users']['function']['edit']['name'] = 'Edit';
        $a['User Information']['users']['function']['delete']['name'] = 'Delete';
        $a['User Information']['users']['function']['change_password']['name'] = 'Change Password';

        $a['User Information']['student_parents']['name'] = 'Parent User';
        $a['User Information']['student_parents']['function']['index']['name'] = 'View';
        $a['User Information']['student_parents']['function']['add']['name'] = 'Add';
        $a['User Information']['student_parents']['function']['edit']['name'] = 'Edit';
        $a['User Information']['student_parents']['function']['delete']['name'] = 'Delete';

        $a['User Information']['user_roles']['name'] = 'User Role Manager';
        $a['User Information']['user_roles']['function']['index']['name'] = 'View';
        $a['User Information']['user_roles']['function']['add']['name'] = 'Add';
        $a['User Information']['user_roles']['function']['edit']['name'] = 'Edit';
        $a['User Information']['user_roles']['function']['delete']['name'] = 'Delete';
        $a['User Information']['user_roles']['function']['user_role_wise_privillige']['name'] = 'User Role Wise Privilege';


        // $a['Reports']['day_wise_class_routines']['name'] = 'Class Routine(Day Wise)';
        // $a['Reports']['day_wise_class_routines']['function']['index']['name'] = 'View';
        // $a['Reports']['day_wise_class_routines']['function']['add']['name'] = 'Add';
        // $a['Reports']['day_wise_class_routines']['function']['edit']['name'] = 'Edit';
        // $a['Reports']['day_wise_class_routines']['function']['delete']['name'] = 'Delete';

        $a['Reports']['report_attendance_registers']['name'] = 'Student Attendance Register';
        $a['Reports']['report_attendance_registers']['function']['index']['name'] = 'View';
        $a['Reports']['report_attendance_registers']['function']['add']['name'] = 'Add';
        $a['Reports']['report_attendance_registers']['function']['edit']['name'] = 'Edit';
        $a['Reports']['report_attendance_registers']['function']['delete']['name'] = 'Delete';

        $a['Reports']['report_student_registers']['name'] = 'Student Register Report';
        $a['Reports']['report_student_registers']['function']['index']['name'] = 'View';
        $a['Reports']['report_student_registers']['function']['add']['name'] = 'Add';
        $a['Reports']['report_student_registers']['function']['edit']['name'] = 'Edit';
        $a['Reports']['report_student_registers']['function']['delete']['name'] = 'Delete';

        // $a['Reports']['report_employee_registers']['name'] = 'Employee Register Report';
        // $a['Reports']['report_employee_registers']['function']['index']['name'] = 'View';
        // $a['Reports']['report_employee_registers']['function']['add']['name'] = 'Add';
        // $a['Reports']['report_employee_registers']['function']['edit']['name'] = 'Edit';
        // $a['Reports']['report_employee_registers']['function']['delete']['name'] = 'Delete';



        $a['Reports']['student_wise_lectures']['name'] = 'Student Wise Lecture Report';
        $a['Reports']['student_wise_lectures']['function']['index']['name'] = 'View';
        $a['Reports']['student_wise_lectures']['function']['add']['name'] = 'Add';
        $a['Reports']['student_wise_lectures']['function']['edit']['name'] = 'Edit';
        $a['Reports']['student_wise_lectures']['function']['delete']['name'] = 'Delete';

        $a['Reports']['exam_wise_attendance_reports']['name'] = 'Exam Wise Attendance Report';
        $a['Reports']['exam_wise_attendance_reports']['function']['index']['name'] = 'View';
        $a['Reports']['exam_wise_attendance_reports']['function']['add']['name'] = 'Add';
        $a['Reports']['exam_wise_attendance_reports']['function']['edit']['name'] = 'Edit';
        $a['Reports']['exam_wise_attendance_reports']['function']['delete']['name'] = 'Delete';





//        $a['Reports']['report_receipt_payments']['name'] = 'Receipt & Payment Statement';
//        $a['Reports']['report_receipt_payments']['function']['index']['name'] = 'View';
//        $a['Reports']['report_receipt_payments']['function']['add']['name'] = 'Add';
//        $a['Reports']['report_receipt_payments']['function']['edit']['name'] = 'Edit';
//        $a['Reports']['report_receipt_payments']['function']['delete']['name'] = 'Delete';



        $a['Fee Reports']['student_histories']['name'] = 'Student History Report';
        $a['Fee Reports']['student_histories']['function']['index']['name'] = 'View';
        $a['Fee Reports']['student_histories']['function']['add']['name'] = 'Add';
        $a['Fee Reports']['student_histories']['function']['edit']['name'] = 'Edit';
        $a['Fee Reports']['student_histories']['function']['delete']['name'] = 'Delete';


        // $a['Fee Reports']['report_fee_registers']['name'] = 'Fee Collection Register Report';
        // $a['Fee Reports']['report_fee_registers']['function']['index']['name'] = 'View';
        // $a['Fee Reports']['report_fee_registers']['function']['add']['name'] = 'Add';
        // $a['Fee Reports']['report_fee_registers']['function']['edit']['name'] = 'Edit';
        // $a['Fee Reports']['report_fee_registers']['function']['delete']['name'] = 'Delete';

        $a['Fee Reports']['report_daily_collection_registers']['name'] = 'Daily Collection Register';
        $a['Fee Reports']['report_daily_collection_registers']['function']['index']['name'] = 'View';
        $a['Fee Reports']['report_daily_collection_registers']['function']['add']['name'] = 'Add';
        $a['Fee Reports']['report_daily_collection_registers']['function']['edit']['name'] = 'Edit';
        $a['Fee Reports']['report_daily_collection_registers']['function']['delete']['name'] = 'Delete';

        $a['Fee Reports']['report_student_dues']['name'] = 'Student Due Report';
        $a['Fee Reports']['report_student_dues']['function']['index']['name'] = 'View';
        $a['Fee Reports']['report_student_dues']['function']['add']['name'] = 'Add';
        $a['Fee Reports']['report_student_dues']['function']['edit']['name'] = 'Edit';
        $a['Fee Reports']['report_student_dues']['function']['delete']['name'] = 'Delete';

        // $a['Fee Reports']['report_fee_waivers']['name'] = 'Fee Waiver Report';
        // $a['Fee Reports']['report_fee_waivers']['function']['index']['name'] = 'View';
        // $a['Fee Reports']['report_fee_waivers']['function']['add']['name'] = 'Add';
        // $a['Fee Reports']['report_fee_waivers']['function']['edit']['name'] = 'Edit';
        // $a['Fee Reports']['report_fee_waivers']['function']['delete']['name'] = 'Delete';

        $a['Accounting Reports']['ledger_reports']['name'] = 'Ledger Report';
        $a['Accounting Reports']['ledger_reports']['function']['index']['name'] = 'View';
        $a['Accounting Reports']['ledger_reports']['function']['add']['name'] = 'Add';
        $a['Accounting Reports']['ledger_reports']['function']['edit']['name'] = 'Edit';
        $a['Accounting Reports']['ledger_reports']['function']['delete']['name'] = 'Delete';
        
        $a['Accounting Reports']['report_daily_transactions']['name'] = 'Daily Transaction Report'; 
        $a['Accounting Reports']['report_daily_transactions']['function']['index']['name'] = 'View';
        $a['Accounting Reports']['report_daily_transactions']['function']['add']['name'] = 'Add';
        $a['Accounting Reports']['report_daily_transactions']['function']['edit']['name'] = 'Edit';
        $a['Accounting Reports']['report_daily_transactions']['function']['delete']['name'] = 'Delete';

        $a['Accounting Reports']['income_expense_reports']['name'] = 'Receipt & Payment Statement';
        $a['Accounting Reports']['income_expense_reports']['function']['index']['name'] = 'View';
        $a['Accounting Reports']['income_expense_reports']['function']['add']['name'] = 'Add';
        $a['Accounting Reports']['income_expense_reports']['function']['edit']['name'] = 'Edit';
        $a['Accounting Reports']['income_expense_reports']['function']['delete']['name'] = 'Delete';

        $a['Accounting Reports']['ac_income_statements']['name'] = 'Income Statement';
        $a['Accounting Reports']['ac_income_statements']['function']['index']['name'] = 'Index';

        return $a;
    }

    public function generate_menu_data() {
        $a = array();

        $a['Configuration']['organizations']['index']['name'] = 'General Configuration';
        $a['Configuration']['organizations']['index']['link'] = base_url() . "index.php/organizations/index";
        $a['Configuration']['organizations']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Configuration']['organizations']['index']['group'] = 'Configuration';

        $a['Configuration']['branches']['index']['name'] = 'Branch';
        $a['Configuration']['branches']['index']['link'] = base_url() . "index.php/branches/index";
        $a['Configuration']['branches']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Configuration']['branches']['index']['group'] = 'Configuration';

        $a['Configuration']['config_classes']['index']['name'] = 'Manage Course';
        $a['Configuration']['config_classes']['index']['link'] = base_url() . "index.php/config_classes/index";
        $a['Configuration']['config_classes']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Configuration']['config_classes']['index']['group'] = 'Configuration';

        // $a['Configuration']['config_sections']['index']['name'] = 'Section/Batch';
        // $a['Configuration']['config_sections']['index']['link'] = base_url() . "index.php/config_sections/index";
        // $a['Configuration']['config_sections']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Configuration']['config_sections']['index']['group'] = 'Configuration';

        $a['Configuration']['config_subjects']['index']['name'] = 'Subject';
        $a['Configuration']['config_subjects']['index']['link'] = base_url() . "index.php/config_subjects/index";
        $a['Configuration']['config_subjects']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Configuration']['config_subjects']['index']['group'] = 'Configuration';

        $a['Configuration']['config_class_periods']['index']['name'] = 'Manage Batch';
        $a['Configuration']['config_class_periods']['index']['link'] = base_url() . "index.php/config_class_periods/index";
        $a['Configuration']['config_class_periods']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Configuration']['config_class_periods']['index']['group'] = 'Configuration';

        // $a['Configuration']['config_class_routines']['index']['name'] = 'Class Routine';
        // $a['Configuration']['config_class_routines']['index']['link'] = base_url() . "index.php/config_class_routines/index";
        // $a['Configuration']['config_class_routines']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Configuration']['config_class_routines']['index']['group'] = 'Configuration';



        $a['Students']['students']['index']['name'] = 'Students';
        $a['Students']['students']['index']['link'] = base_url() . "index.php/students/index";
        $a['Students']['students']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Students']['students']['index']['group'] = 'Students';

        // $a['Students']['batch_students']['index']['name'] = 'Student Migration';
        // $a['Students']['batch_students']['index']['link'] = base_url() . "index.php/batch_students/add";
        // $a['Students']['batch_students']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Students']['batch_students']['index']['group'] = 'Students';

        $a['Students']['student_attendances']['index']['name'] = 'Student Attendance';
        $a['Students']['student_attendances']['index']['link'] = base_url() . "index.php/student_attendances/index";
        $a['Students']['student_attendances']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Students']['student_attendances']['index']['group'] = 'Students';

        $a['Fees']['fee_categories']['index']['name'] = 'Fee Category';
        $a['Fees']['fee_categories']['index']['link'] = base_url() . "index.php/fee_categories/index";
        $a['Fees']['fee_categories']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Fees']['fee_categories']['index']['group'] = 'Fees';


        $a['Fees']['fee_types']['index']['name'] = 'Fee Types';
        $a['Fees']['fee_types']['index']['link'] = base_url() . "index.php/fee_types/index";
        $a['Fees']['fee_types']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Fees']['fee_types']['index']['group'] = 'Fees';


        $a['Fees']['fee_configurations']['index']['name'] = 'Fee Configuration';
        $a['Fees']['fee_configurations']['index']['link'] = base_url() . "index.php/fee_configurations/index";
        $a['Fees']['fee_configurations']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Fees']['fee_configurations']['index']['group'] = 'Fees';

        $a['Fees']['fees']['index']['name'] = 'Fee Collection';
        $a['Fees']['fees']['index']['link'] = base_url() . "index.php/fees/index";
        $a['Fees']['fees']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Fees']['fees']['index']['group'] = 'Fees';


        $a['Fees']['fee_categories']['index']['name'] = 'Fee Category';
        $a['Fees']['fee_categories']['index']['link'] = base_url() . "index.php/fee_categories/index";
        $a['Fees']['fee_categories']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Fees']['fee_categories']['index']['group'] = 'Fees';

        $a['Exam']['exams']['index']['name'] = 'Manage Exam';
        $a['Exam']['exams']['index']['link'] = base_url() . "index.php/exams/index";
        $a['Exam']['exams']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Exam']['exams']['index']['group'] = 'Exam';

        // $a['Exam']['exam_routines']['index']['name'] = 'Exam Routine';
        // $a['Exam']['exam_routines']['index']['link'] = base_url() . "index.php/exam_routines/index";
        // $a['Exam']['exam_routines']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Exam']['exam_routines']['index']['group'] = 'Exam';

        // $a['Exam']['grade_points']['index']['name'] = 'Grade points';
        // $a['Exam']['grade_points']['index']['link'] = base_url() . "index.php/grade_points/index";
        // $a['Exam']['grade_points']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Exam']['grade_points']['index']['group'] = 'Exam';

        // $a['Exam']['subject_wise_marks']['index']['name'] = 'Subject Wise Marks';
        // $a['Exam']['subject_wise_marks']['index']['link'] = base_url() . "index.php/subject_wise_marks/index";
        // $a['Exam']['subject_wise_marks']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Exam']['subject_wise_marks']['index']['group'] = 'Exam';



        // $a['Exam']['manage_marks']['index']['name'] = 'Manage Marks';
        // $a['Exam']['manage_marks']['index']['link'] = base_url() . "index.php/manage_marks/index";
        // $a['Exam']['manage_marks']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Exam']['manage_marks']['index']['group'] = 'Exam';

        // $a['Exam']['report_tabulation_sheets']['index']['name'] = 'Tabulation Sheet';
        // $a['Exam']['report_tabulation_sheets']['index']['link'] = base_url() . "index.php/report_tabulation_sheets/index";
        // $a['Exam']['report_tabulation_sheets']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Exam']['report_tabulation_sheets']['index']['group'] = 'Exam';

        // $a['Exam']['report_mark_sheets']['index']['name'] = 'Mark Sheet';
        // $a['Exam']['report_mark_sheets']['index']['link'] = base_url() . "index.php/report_mark_sheets/index";
        // $a['Exam']['report_mark_sheets']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Exam']['report_mark_sheets']['index']['group'] = 'Exam';

        // $a['Exam']['admit_cards']['index']['name'] = 'Admit Card';
        // $a['Exam']['admit_cards']['index']['link'] = base_url() . "index.php/admit_cards/index";
        // $a['Exam']['admit_cards']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Exam']['admit_cards']['index']['group'] = 'Exam';


        $a['Employees']['employees']['index']['name'] = 'Employees';
        $a['Employees']['employees']['index']['link'] = base_url() . "index.php/employees/index";
        $a['Employees']['employees']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Employees']['employees']['index']['group'] = 'Employees';


        // $a['Employees']['employee_departments']['index']['name'] = 'Employee Department';
        // $a['Employees']['employee_departments']['index']['link'] = base_url() . "index.php/employee_departments/index";
        // $a['Employees']['employee_departments']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Employees']['employee_departments']['index']['group'] = 'Employees';


        $a['Employees']['employee_designations']['index']['name'] = 'Employee Designation';
        $a['Employees']['employee_designations']['index']['link'] = base_url() . "index.php/employee_designations/index";
        $a['Employees']['employee_designations']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Employees']['employee_designations']['index']['group'] = 'Employees';

        // $a['Employees']['employee_branch_transfers']['index']['name'] = 'Employee Branch Transfer';
        // $a['Employees']['employee_branch_transfers']['index']['link'] = base_url() . "index.php/employee_branch_transfers/index";
        // $a['Employees']['employee_branch_transfers']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Employees']['employee_branch_transfers']['index']['group'] = 'Employees';

        // $a['Employees']['employee_promotions']['index']['name'] = 'Employee Promotion/Demotion';
        // $a['Employees']['employee_promotions']['index']['link'] = base_url() . "index.php/employee_promotions/index";
        // $a['Employees']['employee_promotions']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Employees']['employee_promotions']['index']['group'] = 'Employees';

        // $a['Employees']['employee_leave_managements']['index']['name'] = 'Employee Leave Management';
        // $a['Employees']['employee_leave_managements']['index']['link'] = base_url() . "index.php/employee_leave_managements/index";
        // $a['Employees']['employee_leave_managements']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Employees']['employee_leave_managements']['index']['group'] = 'Employees';

        // $a['Employees']['leave_managements']['index']['name'] = 'Leave Category';
        // $a['Employees']['leave_managements']['index']['link'] = base_url() . "index.php/leave_managements/index";
        // $a['Employees']['leave_managements']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Employees']['leave_managements']['index']['group'] = 'Employees';
        
        // $a['Employees']['leave_applies']['index']['name'] = 'Leave Apply';
        // $a['Employees']['leave_applies']['index']['link'] = base_url() . "index.php/leave_applies/index";
        // $a['Employees']['leave_applies']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Employees']['leave_applies']['index']['group'] = 'Employees';
        
        // $a['Employees']['leave_authorizations']['index']['name'] = 'Leave Authorization';
        // $a['Employees']['leave_authorizations']['index']['link'] = base_url() . "index.php/leave_authorizations/index";
        // $a['Employees']['leave_authorizations']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Employees']['leave_authorizations']['index']['group'] = 'Employees';
        
        // $a['Employees']['leave_calculations']['index']['name'] = 'Leave Calculations';
        // $a['Employees']['leave_calculations']['index']['link'] = base_url() . "index.php/leave_calculations/index";
        // $a['Employees']['leave_calculations']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Employees']['leave_calculations']['index']['group'] = 'Employees';
        
        // $a['Employees']['employee_salary_disbursements']['index']['name'] = 'Employee Salary Disbursement';
        // $a['Employees']['employee_salary_disbursements']['index']['link'] = base_url() . "index.php/employee_salary_disbursements/index";
        // $a['Employees']['employee_salary_disbursements']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Employees']['employee_salary_disbursements']['index']['group'] = 'Employees';

        // $a['Employees']['employee_attendances']['index']['name'] = 'Employee Attendance';
        // $a['Employees']['employee_attendances']['index']['link'] = base_url() . "index.php/employee_attendances/index";
        // $a['Employees']['employee_attendances']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Employees']['employee_attendances']['index']['group'] = 'Employees';


        $a['Accounting']['ac_ledgers']['index']['name'] = 'Ledger Accounts';
        $a['Accounting']['ac_ledgers']['index']['link'] = base_url() . "index.php/ac_ledgers/index";
        $a['Accounting']['ac_ledgers']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Accounting']['ac_ledgers']['index']['group'] = 'Accounting';

        $a['Accounting']['ac_opening_balances']['index']['name'] = 'Opening Balances';
        $a['Accounting']['ac_opening_balances']['index']['link'] = base_url() . "index.php/ac_opening_balances/index";
        $a['Accounting']['ac_opening_balances']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Accounting']['ac_opening_balances']['index']['group'] = 'Accounting';

        $a['Accounting']['ac_vouchers']['index']['name'] = 'Voucher List';
        $a['Accounting']['ac_vouchers']['index']['link'] = base_url() . "index.php/ac_vouchers/index";
        $a['Accounting']['ac_vouchers']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Accounting']['ac_vouchers']['index']['group'] = 'Accounting';


        $a['Accounting']['ac_payment_vouchers']['index']['name'] = 'Payment Vouchers';
        $a['Accounting']['ac_payment_vouchers']['index']['link'] = base_url() . "index.php/ac_payment_vouchers/index";
        $a['Accounting']['ac_payment_vouchers']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Accounting']['ac_payment_vouchers']['index']['group'] = 'Accounting';

        $a['Accounting']['ac_receipt_vouchers']['index']['name'] = 'Receipt Vouchers';
        $a['Accounting']['ac_receipt_vouchers']['index']['link'] = base_url() . "index.php/ac_receipt_vouchers/index";
        $a['Accounting']['ac_receipt_vouchers']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Accounting']['ac_receipt_vouchers']['index']['group'] = 'Accounting';

        $a['SheetManagement']['authors']['index']['name'] = 'Authors';
        $a['SheetManagement']['authors']['index']['link'] = base_url() . "index.php/authors/index";
        $a['SheetManagement']['authors']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['SheetManagement']['authors']['index']['group'] = 'SheetManagement';

        $a['SheetManagement']['book_types']['index']['name'] = 'Sheet Types';
        $a['SheetManagement']['book_types']['index']['link'] = base_url() . "index.php/book_types/index";
        $a['SheetManagement']['book_types']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['SheetManagement']['book_types']['index']['group'] = 'SheetManagement';

        $a['SheetManagement']['books']['index']['name'] = 'Sheets';
        $a['SheetManagement']['books']['index']['link'] = base_url() . "index.php/books/index";
        $a['SheetManagement']['books']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['SheetManagement']['books']['index']['group'] = 'SheetManagement';

        $a['SheetManagement']['manage_library_books']['index']['name'] = 'Manage Sheets';
        $a['SheetManagement']['manage_library_books']['index']['link'] = base_url() . "index.php/manage_library_books/index";
        $a['SheetManagement']['manage_library_books']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['SheetManagement']['manage_library_books']['index']['group'] = 'SheetManagement';

        // $a['Dormitory']['dormitories']['index']['name'] = 'Dormitory';
        // $a['Dormitory']['dormitories']['index']['link'] = base_url() . "index.php/dormitories/index";
        // $a['Dormitory']['dormitories']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Dormitory']['dormitories']['index']['group'] = 'Dormitory';


        // $a['Dormitory']['student_dormitories']['index']['name'] = 'Manage Dormitory';
        // $a['Dormitory']['student_dormitories']['index']['link'] = base_url() . "index.php/student_dormitories/index";
        // $a['Dormitory']['student_dormitories']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Dormitory']['student_dormitories']['index']['group'] = 'Dormitory';


        // $a['Transport']['transport_routes']['index']['name'] = 'Routes';
        // $a['Transport']['transport_routes']['index']['link'] = base_url() . "index.php/transport_routes/index";
        // $a['Transport']['transport_routes']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Transport']['transport_routes']['index']['group'] = 'Transport';

        // $a['Transport']['transports']['index']['name'] = 'Transports';
        // $a['Transport']['transports']['index']['link'] = base_url() . "index.php/transports/index";
        // $a['Transport']['transports']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Transport']['transports']['index']['group'] = 'Transport';

        // $a['Reports']['day_wise_class_routines']['index']['name'] = 'Class Routine ( Day Wise )';
        // $a['Reports']['day_wise_class_routines']['index']['link'] = base_url() . "index.php/day_wise_class_routines/index";
        // $a['Reports']['day_wise_class_routines']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Reports']['day_wise_class_routines']['index']['group'] = 'Reports';


        $a['Reports']['student_wise_lectures']['index']['name'] = 'Student Wise Lecture Report';
        $a['Reports']['student_wise_lectures']['index']['link'] = base_url() . "index.php/student_wise_lectures/index";
        $a['Reports']['student_wise_lectures']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Reports']['student_wise_lectures']['index']['group'] = 'Reports';


        $a['Reports']['exam_wise_attendance_reports']['index']['name'] = 'Exam Wise Attendance Report';
        $a['Reports']['exam_wise_attendance_reports']['index']['link'] = base_url() . "index.php/exam_wise_attendance_reports/index";
        $a['Reports']['exam_wise_attendance_reports']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Reports']['exam_wise_attendance_reports']['index']['group'] = 'Reports';

        $a['Reports']['report_attendance_registers']['index']['name'] = 'Student Attendance Register';
        $a['Reports']['report_attendance_registers']['index']['link'] = base_url() . "index.php/report_attendance_registers/index";
        $a['Reports']['report_attendance_registers']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Reports']['report_attendance_registers']['index']['group'] = 'Reports';

        $a['Reports']['report_student_registers']['index']['name'] = 'Student Register Report';
        $a['Reports']['report_student_registers']['index']['link'] = base_url() . "index.php/report_student_registers/index";
        $a['Reports']['report_student_registers']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Reports']['report_student_registers']['index']['group'] = 'Reports';

        $a['Reports']['report_employee_registers']['index']['name'] = 'Employee Register Report';
        $a['Reports']['report_employee_registers']['index']['link'] = base_url() . "index.php/report_employee_registers/index";
        $a['Reports']['report_employee_registers']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Reports']['report_employee_registers']['index']['group'] = 'Reports';
//
//        $a['Reports']['report_receipt_payments']['index']['name'] = 'Receipt & Payment Statement';
//        $a['Reports']['report_receipt_payments']['index']['link'] = base_url() . "index.php/report_receipt_payments/index";
//        $a['Reports']['report_receipt_payments']['index']['img'] = 'glyphicon glyphicon-chevron-right';
//        $a['Reports']['report_receipt_payments']['index']['group'] = 'Reports';


        $a['Fee Reports']['student_histories']['index']['name'] = 'Student History Report';
        $a['Fee Reports']['student_histories']['index']['link'] = base_url() . "index.php/student_histories/index";
        $a['Fee Reports']['student_histories']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Fee Reports']['student_histories']['index']['group'] = 'Fee Reports';

        // $a['Fee Reports']['report_fee_registers']['index']['name'] = 'Fee Collection Register Report';
        // $a['Fee Reports']['report_fee_registers']['index']['link'] = base_url() . "index.php/report_fee_registers/index";
        // $a['Fee Reports']['report_fee_registers']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Fee Reports']['report_fee_registers']['index']['group'] = 'Fee Reports';

        $a['Fee Reports']['report_daily_collection_registers']['index']['name'] = 'Daily Collection Register';
        $a['Fee Reports']['report_daily_collection_registers']['index']['link'] = base_url() . "index.php/report_daily_collection_registers/index";
        $a['Fee Reports']['report_daily_collection_registers']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Fee Reports']['report_daily_collection_registers']['index']['group'] = 'Fee Reports';

        $a['Fee Reports']['report_student_dues']['index']['name'] = 'Student Wise Due Report';
        $a['Fee Reports']['report_student_dues']['index']['link'] = base_url() . "index.php/report_student_dues/index";
        $a['Fee Reports']['report_student_dues']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Fee Reports']['report_student_dues']['index']['group'] = 'Fee Reports';

        $a['Accounting Reports']['ledger_reports']['index']['name'] = 'Ledger Report';
        $a['Accounting Reports']['ledger_reports']['index']['link'] = base_url() . "index.php/ledger_reports/index";
        $a['Accounting Reports']['ledger_reports']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Accounting Reports']['ledger_reports']['index']['group'] = 'Accounting Reports';
        
        $a['Accounting Reports']['report_daily_transactions']['index']['name'] = 'Daily Transaction Report';
        $a['Accounting Reports']['report_daily_transactions']['index']['link'] = base_url() . "index.php/report_daily_transactions/index";
        $a['Accounting Reports']['report_daily_transactions']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Accounting Reports']['report_daily_transactions']['index']['group'] = 'Accounting Reports';



        $a['Accounting Reports']['income_expense_reports']['index']['name'] = 'Receipt & Payment Statement';
        $a['Accounting Reports']['income_expense_reports']['index']['link'] = base_url() . "index.php/income_expense_reports/index";
        $a['Accounting Reports']['income_expense_reports']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Accounting Reports']['income_expense_reports']['index']['group'] = 'Accounting Reports';


        $a['Accounting Reports']['ac_income_statements']['index']['name'] = 'Income Statement';
        $a['Accounting Reports']['ac_income_statements']['index']['link'] = base_url() . "index.php/ac_income_statements/index";
        $a['Accounting Reports']['ac_income_statements']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['Accounting Reports']['ac_income_statements']['index']['group'] = 'Accounting Reports';

//        $a['Reports']['report_fee_collections']['index']['name'] = 'Fee Collection Report';
//        $a['Reports']['report_fee_collections']['index']['link'] = base_url() . "index.php/report_fee_collections/index";
//        $a['Reports']['report_fee_collections']['index']['img'] = 'glyphicon glyphicon-chevron-right';
//        $a['Reports']['report_fee_collections']['index']['group'] = 'Reports';

        // $a['Fee Reports']['report_fee_waivers']['index']['name'] = 'Fee Waiver Report';
        // $a['Fee Reports']['report_fee_waivers']['index']['link'] = base_url() . "index.php/report_fee_waivers/index";
        // $a['Fee Reports']['report_fee_waivers']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        // $a['Fee Reports']['report_fee_waivers']['index']['group'] = 'Fee Reports';


        $a['User Information']['users']['index']['name'] = 'Users';
        $a['User Information']['users']['index']['link'] = base_url() . "index.php/users/index";
        $a['User Information']['users']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['User Information']['users']['index']['group'] = 'User Information';

        $a['User Information']['student_parents']['index']['name'] = 'Parent User';
        $a['User Information']['student_parents']['index']['link'] = base_url() . "index.php/student_parents/index";
        $a['User Information']['student_parents']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['User Information']['student_parents']['index']['group'] = 'User Information';

        $a['User Information']['user_roles']['index']['name'] = 'User Roll Manager';
        $a['User Information']['user_roles']['index']['link'] = base_url() . "index.php/user_roles/index";
        $a['User Information']['user_roles']['index']['img'] = 'glyphicon glyphicon-chevron-right';
        $a['User Information']['user_roles']['index']['group'] = 'User Information';


        //echo "<pre>"; print_r($a);
        return $a;
    }

}