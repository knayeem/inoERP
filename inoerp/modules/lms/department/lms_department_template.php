<!-- * 
inoERP
 *
 * @copyright   2016 Nishit R. Das
 * @license     https://www.mozilla.org/MPL/2.0/
 * @link        http://inoideas.org
 * @source code https://github.com/inoerp/inoERP
-->

<div id="form_all">
 <span class="heading"><?php echo gettext('Learning Management Departments') ?></span>
 <form  method="post" id="lms_department"  name="lms_department" class="lms_department">
  <div id ="form_header">
   <div id="tabsHeader">
    <ul class="tabMain">
     <li><a href="#tabsHeader-1"><?php echo gettext('Basic Info') ?></a></li>
     <li><a href="#tabsHeader-2"><?php echo gettext('Attachments') ?></a></li>
     <li><a href="#tabsHeader-3"><?php echo gettext('Notes') ?></a></li>
    </ul>
    <div class="tabContainer"> 
     <div id="tabsHeader-1" class="tabContent">
			<ul class="column header_field">
			 <li><?php $f->l_text_field_dr_withSearch('lms_department_id'); ?>
				<a name="show" href="form.php?class_name=lms_department&<?php echo "mode=$mode"; ?>" class="show document_id lms_department_id"><i class="fa fa-refresh"></i></a> 
			 </li>
			 <li><?php $f->l_select_field_from_object('org_id', org::find_all_inventory(), 'org_id', 'org', $$class->org_id, 'org_id', '', '', $readonly); ?>        </li>
			 <li><?php $f->l_text_field_d('department'); ?></li>
			 <li><?php $f->l_text_field_d('description'); ?></li>
			 <li><?php $f->l_select_field_from_object('department_type', option_header::find_options_byName('LMS_DEPARTMENT_TYPE'), 'option_line_code', 'option_line_value', $$class->department_type, 'department_type', '', '', $readonly); ?>        </li>
			 <li><?php $f->l_status_field_d('status'); ?></li>
			</ul>
     </div>
     <div id="tabsHeader-2" class="tabContent">
      <div> <?php echo ino_attachement($file) ?> </div>
     </div>
     <div id="tabsHeader-3" class="tabContent">
      <div> 
       <div id="comments">
        <div id="comment_list">
						<?php echo!(empty($comments)) ? $comments : ""; ?>
        </div>
        <div id ="display_comment_form">
						<?php
						$reference_table = 'lms_department';
						$reference_id = $$class->lms_department_id;
						?>
        </div>
        <div id="new_comment">
        </div>
       </div>
      </div>
     </div>
    </div>

   </div>
  </div>
 </form>
 <div id ="form_line" class="form_line"><span class="heading"><?php echo gettext('Department Details') ?></span>
  <div id="tabsLine">
   <ul class="tabMain">
    <li><a href="#tabsLine-1"><?php echo gettext('Resource Assignment') ?></a></li>
    <li><a href="#tabsLine-2"><?php echo gettext('Overhead Rate - Future') ?> </a></li>
   </ul>
   <div class="tabContainer"> 
    <form  method="post" id="lms_dept_res_assignment_line"  name="lms_dept_res_assignment_line">
     <div id="tabsLine-1" class="tabContent">
      <table class="form_line_data_table">
       <thead> 
        <tr>
         <th><?php echo gettext('Action') ?></th>
         <th><?php echo gettext('Assignment Id') ?></th>
         <th><?php echo gettext('Cost Type') ?></th>
         <th><?php echo gettext('Resource') ?></th>
         <th><?php echo gettext('Efficiency') ?> %</th>
         <th><?php echo gettext('Utilization') ?> %</th>
         <th><?php echo gettext('No Of Units') ?></th>
        </tr>
       </thead>
       <tbody class="form_data_line_tbody lms_dept_res_assignment_values" >
					 <?php
					 $count = 0;
					 foreach ($lms_dept_res_assignment_object as $lms_dept_res_assignment) {
						?>         
 				<tr class="lms_dept_res_assignment<?php echo $count ?>">
 				 <td>
							<?php
							echo ino_inline_action($$class_second->lms_dept_res_assignment_id, array('lms_department_id' => $$class->lms_department_id));
							?>
 				 </td>
 				 <td><?php $f->text_field_wid2r('lms_dept_res_assignment_id', 'always_readonly'); ?></td>
 				 <td><?php echo $f->select_field_from_object('cost_type_id', bom_cost_type::find_all(), 'bom_cost_type_id', 'cost_type', $$class_second->cost_type_id, '', 'cost_type_id medium'); ?></td>
 				 <td><?php echo $f->select_field_from_object('resource_id', lms_resource::find_all(), 'lms_resource_id', 'resource', $$class_second->resource_id, '', 'resource_id medium'); ?></td>
 				 <td><?php form::number_field_wid2('efficiency') ?></td>
 				 <td><?php form::number_field_wid2('utilization') ?></td>
 				 <td><?php form::number_field_wid2('no_of_units') ?></td>
 				</tr>
				 <?php
				 $count = $count + 1;
				}
				?>
       </tbody>
      </table>
     </div>
    </form>
   </div>

  </div>
 </div> 
</div>


<div id="js_data">
 <ul id="js_saving_data">
  <li class="headerClassName" data-headerClassName="lms_department" ></li>
  <li class="lineClassName" data-lineClassName="lms_dept_res_assignment" ></li>
  <li class="savingOnlyHeader" data-savingOnlyHeader="false" ></li>
  <li class="primary_column_id" data-primary_column_id="lms_department_id" ></li>
  <li class="form_header_id" data-form_header_id="lms_department" ></li>
  <li class="line_key_field" data-line_key_field="resource_id" ></li>
  <li class="single_line" data-single_line="false" ></li>
 </ul>
 <ul id="js_contextMenu_data">
  <li class="docHedaderId" data-docHedaderId="lms_department_id" ></li>
  <li class="docLineId" data-docLineId="lms_oh_res_assignment_id" ></li>
  <li class="btn1DivId" data-btn1DivId="lms_department" ></li>
  <li class="btn2DivId" data-btn2DivId="form_line" ></li>
  <li class="trClass" data-docHedaderId="lms_overhead" ></li>
  <li class="tbodyClass" data-tbodyClass="form_data_line_tbody" ></li>
  <li class="noOfTabbs" data-noOfTabbs="1" ></li>
 </ul>
</div>
