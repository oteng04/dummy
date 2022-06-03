<!DOCTYPE html>


<html lang="en" <?php
if (!$this->ion_auth->in_group(array('superadmin'))) {
    $this->db->where('hospital_id', $this->hospital_id);
    $settings_lang = $this->db->get('settings')->row()->language;
    if ($settings_lang == '') {
        ?>     
              dir="rtl"
          <?php } else { ?>
              dir="ltr"
              <?php
          }
      } else {
          $this->db->where('hospital_id', 'superadmin');
          $settings_lang = $this->db->get('settings')->row()->language;
          if ($settings_lang == '') {
              ?>
              dir="rtl"     
          <?php } else { ?> 
              dir="ltr"
              <?php
          }
      }
      ?>>
    <head>
        <base href="<?php echo base_url(); ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Rizvi">
        <meta name="keyword" content="Php, Hospital, Clinic, Management, Software, Php, CodeIgniter, Pdms, Accounting">
        <link rel="shortcut icon" href="uploads/favicon.png">
        <title> STU Clinic  </title>
        <!-- Bootstrap core CSS -->
        <link href="common/css/bootstrap.min.css" rel="stylesheet">
        <link href="common/css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="common/assets/DataTables/datatables.min.css" rel="stylesheet" />
        <link href="common/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="common/css/style.css" rel="stylesheet">
        <link href="common/css/style-responsive.css" rel="stylesheet" />
        <link rel="stylesheet" href="common/assets/bootstrap-datepicker/css/datepicker.css" />
        <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
        <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
        <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-timepicker/compiled/timepicker.css">
        <link rel="stylesheet" type="text/css" href="common/assets/jquery-multi-select/css/multi-select.css" />
        <link href="common/css/invoice-print.css" rel="stylesheet" media="print">
        <link href="common/assets/fullcalendar/fullcalendar.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="common/assets/select2/css/select2.min.css"/>
        <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
        <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />

        <style>
            .round-but {
          background: #222;
         padding:8px;
         color: #fff;
         border-radius: 8px;
            }
        </style>

        <?php
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            if ($settings_lang == 'arabic') {
                ?>
                <style>
                    #main-content {
                        margin-right: 211px;
                        margin-left: 0px; 
                    }

                    body {
                        background: #f1f1f1;

                    }
                </style>

                <?php
            }
        } else {
            if ($settings_lang == '') {
                ?>
                <style>
                    #main-content {
                        margin-right: 211px;
                        margin-left: 0px; 
                    }

                    body {
                        background: #f1f1f1;

                    }
                </style>

                <?php
            }
        }
        ?>

    </head>
    
    

    
    

    <body>
        <section id="container" class="">
            <!--header start-->
            <header class="header white-bg">
                <div class="sidebar-toggle-box">
                    <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-bars tooltips "></div>
                </div>
                <!--logo start-->
                <?php
                if (!$this->ion_auth->in_group(array('superadmin'))) {
                    $this->db->where('hospital_id', $this->hospital_id);
                    $settings_title = $this->db->get('settings')->row()->title;
                    $settings_title = explode(' ', $settings_title);
                    ?>
                    <a href="" class="logo">
                        <strong style="color: #222;">
                          STU Clinic Data Management System
                        </strong>
                    </a>
 
                <?php } else { ?>

                    <a href="" class="logo">
                        <strong style="color: #222;">
                        STU Clinic Data Management System
                        </strong>
                    </a>

                <?php } ?>
                <!--logo end-->
                <div class="nav notify-row" id="top_menu">
                    <!--  notification start -->
                    <ul class="nav top-menu">
                     
                        
                    </ul>
                </div>
                <div class="top-nav ">

                    <ul class="nav pull-right top-menu">
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <!-- <img alt="" src="uploads/favicon.png" width="21" height="23"> -->
                                <i class="fa fa-user"></i> 
                              
                                <?php if ($this->ion_auth->in_group('admin')) { ?> 
                                  <span class="username"><?php echo 'Koranteng'; ?></span>
                                  <?php } else { ?>
                                    <span class="username"><?php echo $this->ion_auth->user()->row()->username; ?></span>
                                   <?php } ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <?php if (!$this->ion_auth->in_group('admin')) { ?> 
                                    <li><a href=""><i class="fa fa-dashboard"></i> <?php echo lang('dashboard'); ?></a></li>
                                <?php } ?>
                                <li><a href="profile"><i class=" fa fa-suitcase"></i><?php echo lang('profile'); ?></a></li>
                                <?php if ($this->ion_auth->in_group('admin')) { ?> 
                                    <li><a href="settings"><i class="fa fa-cog"></i> <?php echo lang('settings'); ?></a></li>
                                <?php } ?>

                                <li><a><i class="fa fa-user"></i> <?php echo $this->ion_auth->get_users_groups()->row()->name ?></a></li>
                                <li><a href="auth/logout"><i class="fa fa-key"></i> <?php echo lang('log_out'); ?></a></li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <?php
                    $message = $this->session->flashdata('feedback');
                    if (!empty($message)) {
                        ?>
                        <code class="flashmessage pull-right"> <?php echo $message; ?></code>
                    <?php } ?> 
                </div>
            </header>
            <!--header end-->
            <!--sidebar start-->

            <!--sidebar start-->
            <aside>
                <div id="sidebar"  class="nav-collapse">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a href="home"> 
                                <i class="fa fa-dashboard"></i>
                                <span><?php echo lang('dashboard'); ?></span>
                            </a>
                        </li>
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <?php if (in_array('department', $this->modules)) { ?>
                                <li>
                                    <a href="department">
                                        <i class="fa fa-sitemap"></i>
                                        <span><?php echo lang('departments'); ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <?php if (in_array('doctor', $this->modules)) { ?>
                                <li> <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa fa-users"></i>
                                        <span><?php echo lang('doctor'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a href="doctor"><i class="fa fa-user"></i><?php echo lang('list_of_doctors'); ?></a></li>
                                        <li><a href="appointment/treatmentReport"><i class="fa fa-money"></i><?php echo lang('treatment_history'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Nurse', 'Doctor', 'Laboratorist', 'Receptionist'))) { ?>
                            <?php if (in_array('patient', $this->modules)) { ?>
                                <li> <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa fa-users"></i> 
                                        <span><?php echo lang('patient'); ?></span>
                                    </a>
                                    <ul class="sub"> 
                                        <li><a href="patient"><i class="fa fa-user"></i><?php echo lang('patient_list'); ?></a></li>
                                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor', 'Receptionist'))) { ?>
                                            <li><a href="patient/patientPayments"><i class="fa fa-dollar"></i><?php echo lang('payments'); ?></a></li>
                                        <?php } ?>
                                        <?php if (!$this->ion_auth->in_group(array('Accountant', 'Receptionist'))) { ?>
                                            <li><a href="patient/caseList"><i class="fa fa-book"></i><?php echo lang('case'); ?> <?php echo lang('manager'); ?></a></li>
                                            <li><a href="patient/documents"><i class="fa fa-file-text"></i><?php echo lang('documents'); ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>


                        <?php if ($this->ion_auth->in_group(array('admin', 'Nurse', 'Receptionist'))) { ?>
                            <?php if (in_array('appointment', $this->modules)) { ?>
                                <li> <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa fa-stethoscope"></i> 
                                        <span><?php echo lang('schedule'); ?></span>
                                    </a>
                                    <ul class="sub"> 
                                        <li><a href="schedule"><i class="fa fa-list-alt"></i><?php echo lang('all'); ?> <?php echo lang('schedule'); ?></a></li>
                                        <li><a href="schedule/allHolidays"><i class="fa fa-list-alt"></i><?php echo lang('holidays'); ?></a></li> 
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php
                        if ($this->ion_auth->in_group(array('Doctor'))) {
                            ?>
                            <?php if (in_array('appointment', $this->modules)) { ?>
                                <li> <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa fa-file"></i> 
                                        <span><?php echo lang('schedule'); ?></span>
                                    </a>
                                    <ul class="sub"> 
                                        <li><a href="schedule/timeSchedule"><i class="fa fa-list-alt"></i><?php echo lang('all'); ?> <?php echo lang('schedule'); ?></a></li>
                                        <li><a href="schedule/holidays"><i class="fa fa-list-alt"></i><?php echo lang('holidays'); ?></a></li> 
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Receptionist'))) { ?>
                            <?php if (in_array('appointment', $this->modules)) { ?>
                                <li> <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa fa-stethoscope"></i> 
                                        <span><?php echo lang('appointment'); ?></span>
                                    </a>
                                    <ul class="sub"> 
                                        <li><a href="appointment"><i class="fa fa-list-alt"></i><?php echo lang('all'); ?></a></li>
                                        <li><a href="appointment/addNewView"><i class="fa fa-plus-circle"></i><?php echo lang('add'); ?></a></li>
                                        <li><a href="appointment/todays"><i class="fa fa-list-alt"></i><?php echo lang('todays'); ?></a></li>
                                        <li><a href="appointment/upcoming"><i class="fa fa-list-alt"></i><?php echo lang('upcoming'); ?></a></li>
                                        <li><a href="appointment/calendar"><i class="fa fa-list-alt"></i><?php echo lang('calendar'); ?></a></li>
                                        <li><a href="appointment/request"><i class="fa fa-list-alt"></i><?php echo lang('request'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <li> <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa fa-users"></i>
                                    <span><?php echo lang('human_resources'); ?></span>
                                </a>
                                <ul class="sub">
                                    <?php if (in_array('nurse', $this->modules)) { ?>
                                        <li><a href="nurse"><i class="fa fa-user"></i><?php echo lang('nurse'); ?></a></li>
                                    <?php } ?>
                                    <?php if (in_array('pharmacist', $this->modules)) { ?>
                                        <li><a href="pharmacist"><i class="fa fa-user"></i><?php echo lang('pharmacist'); ?></a></li>
                                    <?php } ?>
                                    <?php if (in_array('laboratorist', $this->modules)) { ?>
                                        <li><a href="laboratorist"><i class="fa fa-user"></i><?php echo lang('laboratorist'); ?></a></li>
                                    <?php } ?>
                                    <?php if (in_array('accountant', $this->modules)) { ?>
                                        <li><a href="accountant"><i class="fa fa-user"></i><?php echo lang('accountant'); ?></a></li>
                                    <?php } ?>
                                    <?php if (in_array('receptionist', $this->modules)) { ?>
                                        <li><a href="receptionist"><i class="fa fa-user"></i><?php echo lang('receptionist'); ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <?php if (in_array('finance', $this->modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa fa-money"></i>
                                        <span><?php echo lang('financial_activities'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a  href="finance/payment"><i class="fa fa-money"></i> <?php echo lang('payments'); ?></a></li>
                                        <li><a  href="finance/addPaymentView"><i class="fa fa-plus-circle"></i><?php echo lang('add_payment'); ?></a></li>
                                        <li><a  href="finance/paymentCategory"><i class="fa fa-edit"></i><?php echo lang('payment_procedures'); ?></a></li>
                                        <li><a  href="finance/expense"><i class="fa fa-money"></i><?php echo lang('expense'); ?></a></li>
                                        <li><a  href="finance/addExpenseView"><i class="fa fa-plus-circle"></i><?php echo lang('add_expense'); ?></a></li>
                                        <li><a  href="finance/expenseCategory"><i class="fa fa-edit"></i><?php echo lang('expense_categories'); ?> </a></li>
                                    </ul>
                                </li> 
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('Receptionist')) { ?>
                            <?php if (in_array('appointment', $this->modules)) { ?>
                                <li>
                                    <a href="appointment/calendar" >
                                        <i class="fa fa-calendar"></i>
                                        <span> <?php echo lang('calendar'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('finance', $this->modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa fa-dollar"></i>
                                        <span><?php echo lang('financial_activities'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a  href="finance/payment"><i class="fa fa-money"></i> <?php echo lang('payments'); ?></a></li>
                                        <li><a  href="finance/addPaymentView"><i class="fa fa-plus-circle"></i><?php echo lang('add_payment'); ?></a></li>
                                    </ul>
                                </li> 
                            <?php } ?>
                        <?php } ?>



                        <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist'))) { ?>
                            <?php if (in_array('prescription', $this->modules)) { ?>
                                <li>
                                    <a href="prescription/all" >
                                        <i class="fa fa-stethoscope"></i>
                                        <span> <?php echo lang('prescription'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php
                        if ($this->ion_auth->in_group(array('Receptionist'))) {
                            ?>
                            <?php if (in_array('lab', $this->modules)) { ?>
                                <li>
                                    <a href="lab/lab1">
                                        <i class="fa fa-medkit"></i>
                                        <span><?php echo lang('lab_reports'); ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php
                        }
                        ?>

                        <?php
                        if ($this->ion_auth->in_group(array('Accountant', 'Receptionist'))) {
                            ?>
                            <?php if (in_array('finance', $this->modules)) { ?>
                                <li>
                                    <a href="finance/UserActivityReport">
                                        <i class="fa fa-dashboard"></i>
                                        <span><?php echo lang('user_activity_report'); ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php
                        }
                        ?>








                        <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                            <?php if (in_array('prescription', $this->modules)) { ?>
                                <li>
                                    <a href="prescription">
                                        <i class="fa fa-dashboard"></i>
                                        <span><?php echo lang('prescription'); ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>



                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Laboratorist'))) { ?>
                            <?php if (in_array('lab', $this->modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa  fa-flask"></i>
                                        <span><?php echo lang('labs'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a  href="lab"><i class="fa fa-file"></i><?php echo lang('lab_reports'); ?></a></li>
                                        <li><a  href="lab/addLabView"><i class="fa fa-plus-circle"></i><?php echo lang('add_lab_report'); ?></a></li>
                                        <li><a  href="lab/template"><i class="fa fa-plus-circle"></i><?php echo lang('template'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>





                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <?php if (in_array('medicine', $this->modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa  fa-medkit"></i>
                                        <span><?php echo lang('medicine'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a  href="medicine"><i class="fa fa-medkit"></i><?php echo lang('medicine_list'); ?></a></li>
                                        <li><a  href="medicine/addMedicineView"><i class="fa fa-plus-circle"></i><?php echo lang('add_medicine'); ?></a></li>
                                        <li><a  href="medicine/medicineCategory"><i class="fa fa-edit"></i><?php echo lang('medicine_category'); ?></a></li>
                                        <li><a  href="medicine/addCategoryView"><i class="fa fa-plus-circle"></i><?php echo lang('add_medicine_category'); ?></a></li>
                                        <li><a  href="medicine/medicineStockAlert"><i class="fa fa-plus-circle"></i><?php echo lang('medicine_stock_alert'); ?></a></li>

                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>








                        <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist'))) { ?>
                            <?php if (in_array('pharmacy', $this->modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa fa-plus-square"></i>
                                        <span><?php echo lang('pharmacy'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <?php if (!$this->ion_auth->in_group(array('Pharmacist'))) { ?>
                                            <li><a  href="finance/pharmacy/home"><i class="fa fa-money"></i> <?php echo lang('dashboard'); ?></a></li>
                                        <?php } ?>
                                        <li><a  href="finance/pharmacy/payment"><i class="fa fa-money"></i> <?php echo lang('sales'); ?></a></li>
                                        <li><a  href="finance/pharmacy/addPaymentView"><i class="fa fa-plus-circle"></i><?php echo lang('add_new_sale'); ?></a></li>
                                        <li><a  href="finance/pharmacy/expense"><i class="fa fa-money"></i><?php echo lang('expense'); ?></a></li>
                                        <li><a  href="finance/pharmacy/addExpenseView"><i class="fa fa-plus-circle"></i><?php echo lang('add_expense'); ?></a></li>
                                        <li><a  href="finance/pharmacy/expenseCategory"><i class="fa fa-edit"></i><?php echo lang('expense_categories'); ?> </a></li>
                                        <li><a  href="finance/pharmacy/financialReport"><i class="fa fa-book"></i><?php echo lang('pharmacy'); ?> <?php echo lang('report'); ?> </a></li>
                                    </ul>
                                </li> 
                            <?php } ?>
                        <?php } ?>








                        <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) { ?>
                            <?php if (in_array('donor', $this->modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa  fa-user"></i>
                                        <span><?php echo lang('donor') ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a  href="donor"><i class="fa fa-user"></i><?php echo lang('donor_list'); ?></a></li>
                                        <li><a  href="donor/addDonorView"><i class="fa fa-plus-circle"></i><?php echo lang('add_donor'); ?></a></li>
                                        <li><a  href="donor/bloodBank"><i class="fa fa-tint"></i><?php echo lang('blood_bank'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <?php if (in_array('bed', $this->modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa  fa-hdd-o"></i>
                                        <span><?php echo lang('bed'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a  href="bed"><i class="fa fa-hdd-o"></i><?php echo lang('bed_list'); ?></a></li>
                                        <li><a  href="bed/addBedView"><i class="fa fa-plus-circle"></i><?php echo lang('add_bed'); ?></a></li>
                                        <li><a  href="bed/bedCategory"><i class="fa fa-edit"></i><?php echo lang('bed_category'); ?></a></li>
                                        <li><a  href="bed/bedAllotment"><i class="fa fa-plus-square-o"></i><?php echo lang('bed_allotments'); ?></a></li>
                                        <li><a  href="bed/addAllotmentView"><i class="fa fa-plus-circle"></i><?php echo lang('add_allotment'); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Nurse', 'Laboratorist', 'Doctor'))) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;" >
                                    <i class="fa  fa-file"></i>
                                    <span><?php echo lang('report'); ?></span>
                                </a>
                                <ul class="sub">
                                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                        <?php if (in_array('finance', $this->modules)) { ?>
                                            <li><a  href="finance/financialReport"><i class="fa fa-book"></i><?php echo lang('financial_report'); ?></a></li>
                                            <li> <a href="finance/AllUserActivityReport">  <i class="fa fa-dashboard"></i>   <span><?php echo lang('user_activity_report'); ?></span> </a></li>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if (in_array('report', $this->modules)) { ?>
                                        <li><a  href="report/birth"><i class="fa fa-smile-o"></i><?php echo lang('birth_report'); ?></a></li>
                                        <li><a  href="report/operation"><i class="fa fa-wheelchair"></i><?php echo lang('operation_report'); ?></a></li>
                                        <li><a  href="report/expire"><i class="fa fa-minus-square-o"></i><?php echo lang('expire_report'); ?></a></li>
                                    <?php } ?>
                                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                        <?php if (in_array('finance', $this->modules)) { ?>
                                            <li><a  href="finance/doctorsCommission"><i class="fa fa-edit"></i><?php echo lang('doctors_commission'); ?> </a></li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>


                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <?php if (in_array('notice', $this->modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa fa-microphone"></i>
                                        <span><?php echo lang('notice'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a  href="notice"><i class="fa fa-location-arrow"></i><?php echo lang('notice'); ?></a></li>
                                        <li><a  href="notice/addNewView"><i class="fa fa-list-alt"></i><?php echo lang('add_new'); ?></a></li>
                                    </ul>
                                </li> 
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <?php if (in_array('email', $this->modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa fa-envelope-o"></i>
                                        <span><?php echo lang('email'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a  href="email/sendView"><i class="fa fa-location-arrow"></i><?php echo lang('new'); ?></a></li>
                                        <li><a  href="email/sent"><i class="fa fa-list-alt"></i><?php echo lang('sent'); ?></a></li>
                                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                            <li><a  href="email/settings"><i class="fa fa-gear"></i><?php echo lang('settings'); ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li> 
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <?php if (in_array('sms', $this->modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa fa-envelope-o"></i>
                                        <span><?php echo lang('sms'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li><a  href="sms/sendView"><i class="fa fa-location-arrow"></i><?php echo lang('write_message'); ?></a></li>
                                        <li><a  href="sms/sent"><i class="fa fa-list-alt"></i><?php echo lang('sent_messages'); ?></a></li>
                                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                            <li><a  href="sms"><i class="fa fa-gear"></i><?php echo lang('sms_settings'); ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li> 
                            <?php } ?>
                        <?php } ?>


                     




                        <?php if ($this->ion_auth->in_group('Accountant')) { ?>
                            <?php if (in_array('finance', $this->modules)) { ?>
                                <li class="sub-menu">
                                    <a href="javascript:;" >
                                        <i class="fa  fa-hospital-o"></i>
                                        <span><?php echo lang('payments'); ?></span>
                                    </a>
                                    <ul class="sub">
                                        <li>
                                            <a href="finance/payment" >
                                                <i class="fa fa-money"></i>
                                                <span> <?php echo lang('payments'); ?> </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="finance/addPaymentView" >
                                                <i class="fa fa-plus-circle"></i>
                                                <span> <?php echo lang('add_payment'); ?> </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="finance/paymentCategory" >
                                                <i class="fa fa-edit"></i>
                                                <span> <?php echo lang('payment_procedures'); ?> </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="finance/expense" >
                                        <i class="fa fa-money"></i>
                                        <span> <?php echo lang('expense'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="finance/addExpenseView" >
                                        <i class="fa fa-plus-circle"></i>
                                        <span> <?php echo lang('add_expense'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="finance/expenseCategory" >
                                        <i class="fa fa-edit"></i>
                                        <span> <?php echo lang('expense_categories'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="finance/doctorsCommission" >
                                        <i class="fa fa-edit"></i>
                                        <span> <?php echo lang('doctors_commission'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="finance/financialReport" >
                                        <i class="fa fa-book"></i>
                                        <span> <?php echo lang('financial_report'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('Pharmacist')) { ?>
                            <?php if (in_array('medicine', $this->modules)) { ?>
                                <li>
                                    <a href="medicine" >
                                        <i class="fa fa-medkit"></i>
                                        <span> <?php echo lang('medicine_list'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="medicine/addMedicineView" >
                                        <i class="fa fa-plus-circle"></i>
                                        <span> <?php echo lang('add_medicine'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="medicine/medicineCategory" >
                                        <i class="fa fa-medkit"></i>
                                        <span> <?php echo lang('medicine_category'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="medicine/addCategoryView" >
                                        <i class="fa fa-plus-circle"></i>
                                        <span> <?php echo lang('add_medicine_category'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group('Nurse')) { ?>
                            <?php if (in_array('bed', $this->modules)) { ?>
                                <li>
                                    <a href="bed" >
                                        <i class="fa fa-hdd-o"></i>
                                        <span> <?php echo lang('bed_list'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="bed/bedCategory" >
                                        <i class="fa fa-edit"></i>
                                        <span> <?php echo lang('bed_category'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="bed/bedAllotment" >
                                        <i class="fa fa-plus-square-o"></i>
                                        <span> <?php echo lang('bed_allotments'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>

                            <?php if (in_array('donor', $this->modules)) { ?>
                                <li>
                                    <a href="donor" >
                                        <i class="fa fa-medkit"></i>
                                        <span> <?php echo lang('donor'); ?> </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="donor/bloodBank" >
                                        <i class="fa fa-tint"></i>
                                        <span> <?php echo lang('blood_bank'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('Patient')) { ?>
                            <?php if (in_array('donor', $this->modules)) { ?>
                                <li>
                                    <a href="donor" >
                                        <i class="fa fa-user"></i>
                                        <span><?php echo lang('donor'); ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('report', $this->modules)) { ?>
                                <li>
                                    <a href="report/myreports" >
                                        <i class="fa fa-file-o"></i>
                                        <span> <?php echo lang('my_report'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('appointment', $this->modules)) { ?>
                                <li>
                                    <a href="patient/calendar" >
                                        <i class="fa fa-calendar-o"></i>
                                        <span> <?php echo lang('appointment'); ?> <?php echo lang('calendar'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('patient', $this->modules)) { ?>
                                <li>
                                    <a href="patient/myCaseList" >
                                        <i class="fa fa-file-text"></i>
                                        <span>  <?php echo lang('cases'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (in_array('prescription', $this->modules)) { ?>
                                <li>
                                    <a href="patient/myPrescription" >
                                        <i class="fa fa-medkit"></i>
                                        <span> <?php echo lang('prescription'); ?>  </span>
                                    </a>
                                </li>

                            <?php } ?>

                            <?php if (in_array('patient', $this->modules)) { ?>

                                <li>
                                    <a href="patient/myDocuments" >
                                        <i class="fa fa-file-o"></i>
                                        <span> <?php echo lang('documents'); ?> </span>
                                    </a>
                                </li>

                            <?php } ?>

                            <?php if (in_array('finance', $this->modules)) { ?>
                                <li>
                                    <a href="patient/myPaymentHistory" >
                                        <i class="fa fa-money"></i>
                                        <span> <?php echo lang('payment'); ?> </span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('im')) { ?>
                            <li>
                                <a href="patient/addNewView" >
                                    <i class="fa fa-user"></i>
                                    <span> <?php echo lang('add_patient'); ?> </span>
                                </a>
                            </li>
                            <li>
                                <a href="finance/addPaymentView" >
                                    <i class="fa fa-user"></i>
                                    <span> <?php echo lang('add_payment'); ?>  </span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('superadmin')) { ?>

                            <li>
                                <a href="hospital">
                                    <i class="fa fa-sitemap"></i>
                                    <span><?php echo lang('all_hospitals'); ?></span>
                                </a>
                            </li>
                            <li>
                                <a href="hospital/addNewView">
                                    <i class="fa fa-plus-circle"></i>
                                    <span><?php echo lang('create_new_hospital'); ?></span>
                                </a>
                            </li>


  

                            <li>
                                <a href="request">
                                    <i class="fa fa-sitemap"></i>
                                    <span><?php echo lang('requests'); ?></span>
                                </a>
                            </li>

 

                        <?php } ?>

 

                        <li>
                            <a href="profile" >
                                <i class="fa fa-user"></i>
                                <span> <?php echo lang('profile'); ?> </span>
                            </a>
                        </li>


                    
                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->




