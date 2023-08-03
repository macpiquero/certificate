<div id="page-title">
    

   <?php
      
   ?>

    <h2>Active Financial Year: 2023</h2>
    <p><b></b></p>


</div>
<script type="text/javascript" src="<?php echo base_url('assets/widgets/wizard/wizard.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/widgets/wizard/wizard-demo.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/widgets/tabs/tabs.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/widgets/tooltip/tooltip.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/widgets/popover/popover.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/widgets/xeditable/xeditable.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/widgets/xeditable/xeditable-demo.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/widgets/daterangepicker/moment.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/widgets/datepicker/datepicker.js');?>"></script>
<script type="text/javascript">
    /* Datepicker bootstrap */

    $(function() { "use strict";
        $('.bootstrap-datepicker').bsdatepicker({
            format: 'mm/dd/yyyy'
        });
    });

</script>
<script type="text/javascript" src="<?php echo base_url('assets/widgets/datepicker-ui/datepicker.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/widgets/datepicker-ui/datepicker-demo.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/widgets/daterangepicker/moment.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/widgets/daterangepicker/daterangepicker.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/widgets/daterangepicker/daterangepicker-demo.js');?>"></script>


<div class="panel">
    
    <div class="panel-body">
        <h3 class="title-hero">
            You can update here the employee status in your company.
        </h3>
         <div class="example-box-wrapper">
            <div id="form-wizard-2">
                <ul class="list-group list-group-separator row list-group-icons list-group-centered">
                    <li class="col-md-3 active">
                        <a href="#custom-step-1" data-toggle="tab" class="list-group-item">
                            <i class="glyph-icon icon-dashboard"></i>
                            Personal
                        </a>
                    </li>
                    <li class="col-md-3">
                        <a href="#custom-step-2" data-toggle="tab" class="list-group-item">
                            <i class="glyph-icon font-red icon-bullhorn"></i>
                            Company
                        </a>
                    </li>
                    <li class="col-md-3">
                        <a href="#custom-step-3" data-toggle="tab" class="list-group-item">
                            <i class="glyph-icon font-primary icon-camera"></i>
                            Loans
                        </a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="custom-step-1">
                        <div class="content-box">
                           

                            <div class="content-box-wrapper">
                              <div class="row">
                                 <?php 
                                   // Display Response
                                   if(session()->has('message_emp')){
                                   ?>
                                      <div class="alert <?= session()->getFlashdata('alert-class') ?>">
                                         <?= session()->getFlashdata('message_emp') ?>
                                      </div>
                                   <?php
                                   }
                                 ?>

                                   <?php $validation = \Config\Services::validation(); ?>
                            </div>
                                <h3 class="title-hero">
                                        Personal Information
                                    </h3>
                              <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate="" novalidate="">


                               <div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group">
                                            <label class="col-sm-3 control-label">Firstname</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="emp_firstname" value="<?php echo $employee_data['firstname'];?>">
                                            </div>
                                          
                                       </div>
                                       <div class="form-group">
                                            <label class="col-sm-3 control-label">Middlename</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="emp_middlename" value="<?php echo $employee_data['middlename'];?>">
                                            </div>
                                       </div>
                                       <div class="form-group">
                                            <label class="col-sm-3 control-label">Lastname</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="emp_lastname" value="<?php echo $employee_data['lastname'];?>">
                                            </div>
                                       </div>
                                       <div class="form-group">
                                           <label for="" class="col-sm-3 control-label">Birth Date</label>
                                           <div class="col-sm-6">
                                               <div class="input-prepend input-group">
                                                   <span class="add-on input-group-addon">
                                                       <i class="glyph-icon icon-calendar"></i>
                                                   </span>
                                                   <input type="text" class="bootstrap-datepicker form-control" id='emp_birthdate' value="<?php echo $employee_data['birthdate']?>" data-date-format="mm/dd/yy">
                                               </div>
                                           </div>
                                       </div>
                                       <div class="form-group">
                                            <label class="col-sm-3 control-label">Age</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="emp_age" value="<?php echo $age;?>">
                                            </div>
                                       </div>

                                       <div class="form-group">
                                            <label class="col-sm-3 control-label">Address</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="emp_address" value="<?php echo $employee_data['address'];?>">
                                            </div>
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Nationality</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="emp_nationality" value="<?php echo $employee_data['nationality'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Marital Status</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="emp_marital" value="<?php echo $employee_data['marital_status'];?>">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="col-sm-3 control-label">Email</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="emp_peremail" value="<?php echo $employee_data['personal_email'];?>">
                                            </div>
                                       </div>
                                       <div class="form-group">
                                            <label class="col-sm-3 control-label">Contact No.</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="emp_contactno" value="<?php echo $employee_data['contact_no'];?>">
                                            </div>
                                       </div>
                                     
                                   </div>
                               </div>
                                <h3 class="title-hero">
                                    Identification Number
                                </h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="col-sm-3 control-label">TIN #</label>
                                          <div class="col-sm-6">
                                             <input type="text" class="form-control" id="emp_tin" value="<?php echo $employee_data['tin_no'];?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-3 control-label">SSS #</label>
                                          <div class="col-sm-6">
                                             <input type="text" class="form-control" id="emp_sss" value="<?php echo $employee_data['sss_no'];?>">
                                          </div>
                                        </div>

                                         
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                          <label class="col-sm-3 control-label">PAG IBIG #</label>
                                          <div class="col-sm-6">
                                             <input type="text" class="form-control" id="emp_pagibig" value="<?php echo $employee_data['pag_ibig_no'];?>">
                                          </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="col-sm-3 control-label">PHILHEALTH #</label>
                                            <div class="col-sm-6">
                                             <input type="text" class="form-control" id="emp_philhealth" value="<?php echo $employee_data['philhealth_no'];?>">
                                            </div>
                                       </div>
                                   </div>
                                </div>

                                <h3 class="title-hero">
                                    Emergency Contact
                                </h3><div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="col-sm-3 control-label">Name</label>
                                          <div class="col-sm-6">
                                             <input type="text" class="form-control" id="emp_emercon_name" value="<?php echo $employee_data['emergency_contact_name'];?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-3 control-label">Relationship</label>
                                          <div class="col-sm-6">
                                             <input type="text" class="form-control" id="emp_emercon_relationship" value="<?php echo $employee_data['emergency_contact_relationship'];?>">
                                          </div>
                                        </div>

                                         
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                          <label class="col-sm-3 control-label">Contact No.</label>
                                          <div class="col-sm-6">
                                             <input type="text" class="form-control" id="emp_emercon_contactno" value="<?php echo $employee_data['emergency_contact_no'];?>">
                                          </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="col-sm-3 control-label">Address</label>
                                            <div class="col-sm-6">
                                             <input type="text" class="form-control" id="emp_emercon_address" value="<?php echo $employee_data['emergency_contact_address'];?>">
                                            </div>
                                       </div>
                                   </div>
                                </div>
                           </form>
                                
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="custom-step-2">
                        <div class="content-box">
                           
                            <div class="content-box-wrapper">
                                
                                 <form class="form-horizontal bordered-row" id="demo-form" data-parsley-validate="" novalidate="">
                                <h3 class="title-hero">
                                    JOB DETAILS
                                </h3>
                                <div class="row">

                                   <div class="col-md-6">
                                        <div class="form-group">
                                           <label class="col-sm-3 control-label">Date Hired</label>
                                           <div class="col-sm-6">
                                                <div class="input-prepend input-group">
                                                   <span class="add-on input-group-addon">
                                                       <i class="glyph-icon icon-calendar"></i>
                                                   </span>
                                                   <input type="text" class="bootstrap-datepicker form-control" id='emp_datehired' value="<?php echo $company_data['date_hired']?>" data-date-format="mm/dd/yy">
                                               </div>
                                           </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-sm-3 control-label">Job Title</label>
                                          <div class="col-sm-6">
                                             <input type="text" class="form-control" id="emp_job_title" value="<?php echo  $company_data['job_title'];?>">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-sm-3 control-label">Job Description</label>
                                          <div class="col-sm-6">
                                             <input type="text" class="form-control" id="emp_job_desc" value="<?php echo $company_data['job_desc'];?>">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-sm-3 control-label">Sub Unit</label>
                                          <div class="col-sm-6">
                                             <input type="text" class="form-control" id="emp_sub_unit" value="<?php echo $company_data['sub_unit'];?>">
                                          </div>
                                       </div>

                                       
                                    
                                   </div>
                                   <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="col-sm-3 control-label">Employement Status</label>
                                          <div class="col-sm-6">
                                             <input type="text" class="form-control" id="emp_status" value="<?php echo $company_data['emp_status'];?>">
                                          </div>
                                        </div>

                                         <div class="form-group">
                                          <label class="col-sm-3 control-label">Location</label>
                                          <div class="col-sm-6">
                                             <input type="text" class="form-control" id="emp_location" value="<?php echo $company_data['location'];?>">
                                          </div>
                                        </div>
                                     
                                   </div>
                                    </div>
                                   <h3 class="title-hero">
                                        SALARY DETAILS
                                    </h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Monthly Salary</label>
                                              <div class="col-sm-6">
                                                 <input type="text" class="form-control currency" id="emp_monthly_salary" value="<?php echo $company_data['monthly_salary'];?>">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Basic Salary</label>
                                              <div class="col-sm-6">
                                                 <input type="text" class="form-control currency" id="emp_basic_salary" value="<?php echo $company_data['basic_salary'];?>">
                                              </div>
                                            </div>

                                            
                                       </div>
                                       <div class="col-md-6">
                                         <div class="form-group">
                                              <label class="col-sm-3 control-label">Hours Per Rate</label>
                                              <div class="col-sm-6">
                                                 <input type="text" class="form-control currency" id="emp_hours_per_rate" value="<?php echo $company_data['hrs_per_rate'];?>">
                                              </div>
                                            </div>
                                           <div class="form-group">
                                                <label class="col-sm-3 control-label">Allowance</label>
                                                <div class="col-sm-6">
                                                 <input type="text" class="form-control currency" id="emp_allowance" value="<?php echo $company_data['allowance'];?>">
                                                </div>
                                           </div>
                                       </div>
                                    </div>

                                    <h3 class="title-hero">
                                        CONTRIBUTIONS
                                    </h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label ">SSS</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control currency" id="emp_contri_sss" value="<?php echo $company_data['contri_sss'];?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label ">PAG IBIG</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control currency" id="emp_contri_pagibig" value="<?php echo $company_data['contri_pagibig'];?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label ">PHIL-HEALTH</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control currency" id="emp_contri_philhealth" value="<?php echo $company_data['contri_philhealth'];?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                   </form>
                               </div>
                           
                        </div>
                    </div>
                    <div class="tab-pane" id="custom-step-3">
                        <div class="content-box">
                            <h3 class="content-box-header bg-green">
                                Reports
                            </h3>
                            <div class="content-box-wrapper">
                                Lorem ipsum dolor sic amet dixit tu.
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="custom-step-4">
                        <div class="content-box">
                            <h3 class="content-box-header bg-blue">
                                Forth
                            </h3>
                            <div class="content-box-wrapper">
                                Lorem ipsum dolor sic amet dixit tu.
                            </div>
                        </div>
                    </div>
                    <div class="bg-default text-center ">
                       <button class="btn  btn-primary" id="emp_btnupdate">Update</button>
                   </div>
                    <div class="pager">

                        
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" name="emp_id" id="emp_id" value="<?php echo $employee_data['id']; ?>">
<input type="hidden" name="emp_no" id="emp_no" value="<?php echo $employee_data['employee_id']; ?>">
<input type="hidden" name="pos_id" id="pos_id" value="<?php echo $employee_position['id']; ?>">



<!-- jQueryUI Autocomplete -->

<script type="text/javascript" src="<?php echo base_url("assets/widgets/autocomplete/autocomplete.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/widgets/autocomplete/menu.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/widgets/input-switch/inputswitch-alt.js");?>"></script>



<?php
  $base_url_getemployee = base_url('employee/get_employee');
  $json_base_url_getemployee = json_encode(['base_url' => $base_url_getemployee]);


  $url_update_employee = base_url('employee/update_employee');
  $json_url_update_employee = json_encode(['base_url' => $url_update_employee]);
  // echo $json_base_url;
?>

<script>
   $(document).ready(function() {
      var base_url = <?php echo $json_url_update_employee; ?>;

      $('#emp_btnupdate').on('click', function(e){
         e.preventDefault();

         var emp_id = $('#emp_id').val();
         var emp_no = $('#emp_no').val();

         var firstname = $('#emp_firstname').val();
         var middlename = $('#emp_middlename').val();
         var lastname = $('#emp_lastname').val();
         var birthdate = $('#emp_birthdate').val();
         var address = $('#emp_address').val();
         var personal_email = $('#emp_peremail').val();
         var contactno = $('#emp_contactno').val();
         var nationality = $('#emp_nationality').val();
         var marital_status = $('#emp_marital').val();
         var tin_no = $('#emp_tin').val();
         var sss_no = $('#emp_sss').val();
         var pagibig_no = $('#emp_pagibig').val();
         var philhealth_no = $('#emp_philhealth').val();
         var emergency_contact_name = $('#emp_emercon_name').val();
         var emergency_contact_relationship = $('#emp_emercon_relationship').val();
         var emergency_contact_no = $('#emp_emercon_contactno').val();
         var emergency_contact_address = $('#emp_emercon_address').val();


        var emp_datehired = $('#emp_datehired').val();
        var emp_job_title = $('#emp_job_title').val();
        var emp_job_desc = $('#emp_job_desc').val();
        var emp_sub_unit = $('#emp_sub_unit').val();
        var emp_status = $('#emp_status').val();
        var emp_location = $('#emp_location').val();
        var emp_monthly_salary = $('#emp_monthly_salary').val();
        var emp_basic_salary = $('#emp_basic_salary').val();
        var emp_hours_per_rate = $('#emp_hours_per_rate').val();
        var emp_allowance = $('#emp_allowance').val();
        var emp_contri_sss = $('#emp_contri_sss').val();
        var emp_contri_pagibig = $('#emp_contri_pagibig').val();
        var emp_contri_philhealth = $('#emp_contri_philhealth').val();

            // alert(emp_id + " " + emp_no);
       
            $.ajax({
                  url: base_url.base_url,
                  headers: {'X-Requested-With': 'XMLHttpRequest'},
                  type: 'post',
                  data: {
                     id: emp_id,
                     firstname: firstname,
                     middlename: middlename,
                     lastname: lastname,
                     birthdate: birthdate,
                     address: address,
                     personal_email: personal_email,
                     contact_no: contactno,
                     nationality: nationality,
                     marital_status: marital_status,
                     tin_no: tin_no,
                     sss_no: sss_no,
                     pagibig_no: pagibig_no,
                     philhealth_no: philhealth_no,
                     emergency_contact_name: emergency_contact_name,
                     emergency_contact_relationship: emergency_contact_relationship,
                     emergency_contact_no: emergency_contact_no,
                     emergency_contact_address: emergency_contact_address,
                     emp_no: emp_no,
                     emp_datehired: emp_datehired,
                     emp_job_title: emp_job_title,
                     emp_job_desc: emp_job_desc,
                     emp_sub_unit: emp_sub_unit,
                     emp_status: emp_status,
                     emp_location: emp_location,
                     emp_monthly_salary: emp_monthly_salary,
                     emp_basic_salary: emp_basic_salary,
                     emp_hours_per_rate: emp_hours_per_rate,
                     emp_allowance: emp_allowance,
                     emp_contri_sss: emp_contri_sss,
                     emp_contri_pagibig: emp_contri_pagibig,
                     emp_contri_philhealth: emp_contri_philhealth
                  },
                  success: function(data){
                      if(data == 'success'){
                           location.reload();
                      }
                  },
                  error: function(xhr, status, error){
                       console.log("xhr: "+ xhr + "\n status: "+ status + "\n error: " + error);
                  }


            });
         
      });


        $('.currency').on('change click keyup input paste',(function (event) {
            $(this).val(function (index, value) {
                return '' + value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            });
        }));
   });

</script>

<script type="text/javascript" src="<?php echo base_url("assets/widgets/autocomplete/autocomplete-demo.js");?>"></script>



<!-- <script type="text/javascript" src="<?php echo base_url('assets/js-file/church_member.js');?>"></script> -->