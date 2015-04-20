<style>
td{
 font-size:11px;
 padding:2px;
}
</style>
<?php
	$user_table_name = $wpdb->prefix . "appointment_dbuser_data";
	$table_name = $wpdb->prefix . "appointment_fields";
	global $user_table_name,$table_name;
	add_action("init", "appointment_admin_init");
	add_action("admin_menu", "appointment_menu");
	
	$langplugin = get_bloginfo('language');
	/*------this all are email variables---------*/
	$username = " vrunda";
	$cancelurl =" www.temp.com";
	$adminname = " admin";
	$filelang = PLUGIN_PATH_APPOINTMENT."/lang/".$langplugin.".php";
	define("USER_NAME",$username);
	define("CANCEL_URL",$cancelurl);
	define("ADMIN_NAME",$adminname);
	$nl = "</br>";
	$href = "<a href='#'>";
	$ehref ="</a>";
	
	echo '<link href="'.get_template_directory_uri().'/css/admin_css.css" rel="stylesheet" type="text/css" />
	<link href="'.get_template_directory_uri().'admin/theme_options/css/option_tree_style.css" type="text/css"/>
	  <script type="text/javascript" src="'.get_template_directory_uri().'/js/ValidationJs.js"></script>
	   <script type="text/javascript" src="'.get_template_directory_uri().'/js/js-dropdown.js"></script>';
	
	/*------end of email variables---------*/

	$scriptpath = get_template_directory_uri()."modules/Manage_appointments/optvalue.php";
	
?>
<div class="block1" id="appointment_fields">	
 
                                 
<?php 
									wp_nonce_field('update-options');
									settings_fields('appointment-options');
								  	 /*$settings = appointment_get_settings();*/
									if(isset($_REQUEST['success']))
									 { ?>
										<?php	switch ($_REQUEST['success'])
											{
											 case "fupdated" : echo "<div id='submitedsuccess' class='submitedsuccess'>Change have been saved.
											 </div>";
											 break;
											  case "finserted" : echo "<div id='submitedsuccess' class='submitedsuccess'>Record Inserted successfully
											 </div>";
											 break;
											  case "fdeleted" : echo "<div id='submitedsuccess' class='submitedsuccess'> Information Deleted successfully
											 </div>";
											 break;
											 case "false" : echo "<div id='submitedsuccess' class='ferror' style='width:300px;margin-left:10%;'><strong>Field name :</strong>Must be more then 4 laters<br/><strong>Field Type :</strong> You Have to select Field Type<br/><strong>Default value :</strong> You have to Enter Default value.
											 </div>";
											 break;
											 case "efalse" : echo "<div id='submitedsuccess' class='ferror' style='width:300px;margin-left:10%;'><strong>Field name :</strong>Must be more then 4 laters<br/><strong>Field Type :</strong> You Have to select Field Type<br/><strong>Default value :</strong> You have to Enter Default value.
											 </div>";
											 break;
											 
											 }
									}
									if((!isset($_REQUEST['editfield'])) && (!isset($_REQUEST['addfield'])))
									{							 
									    echo appointment_adminselect_init();
									}
									if(isset($_REQUEST['editfield']) || isset($_REQUEST['addfield']))
									{
										 global $wpdb;
										 $edit_opt = 'false';
										$table_name = $wpdb->prefix . "appointment_fields";
										$editdata = "SELECT * FROM $table_name where fid='".$_REQUEST['editfield']."' ";
										$sqledit	 =  $wpdb->get_row($editdata);
										if($sqledit->field_variablename != 'tmplallservices' && $sqledit->field_variablename != 'templatic_time' && $sqledit->field_variablename != 'templatic_date' &&  $sqledit->field_variablename != 'templatic_email'){
											$edit_opt = 'false';
										} else {
											$edit_opt = 'true';
										}
										
								?>
                                <div style="width:100%;">
                                <div style="text-align:right; widows:100%;"><a href="?page=Appointment#appointment_fields" name="btnviewlisting" class="button-primary"/><?php _e('View Listing','templatic'); ?></a></div>
                                <div style="text-align:left; widows:100%;"><h3><?php _e('Add new Field','templatic'); ?></h3></div>
                                 <p><?php _e('In this section, you can add a new custom field to display in the appointment form.','templatic');?></p>
                                </div><br/>
                                <form name="frmadminfields" id="frmadminfields" method="post" action="" onsubmit="frmsubmit()">
								<?php if($edit_opt == 'true') { echo '<input name="etype" id="etype" type="hidden" value="noupdate" />';}?>
                                    <table class="widefat post fixed" width="85%" border="0">
                                      <thead>
                                      <tr>
                                        <td width="20%" valign="top"><?php _e('New field name :','templatic');?></td>
                                        <td>                                     
                                        <input name="txtfldname" id="txtfldname" type="text" value="<?php echo _e($sqledit->fieldname,'templatic'); ?>" onblur="validateName()" />
                                        <div id="fldnameInfo" class="noerror"> <?php _e('Enter name of the field','templatic'); ?> </div>
                                        <span class="spannote"> <?php _e('Title which you wish to display in frontend','templatic'); ?> </span></td>
										</tr>
									  <?php if($edit_opt == 'false'){ ?>
                                      <tr>
                                        <td valign="top"><?php _e('New field name for backend','templatic');?></td>
                                        <td><input name="txtfldbackname" id="txtfldbackname" type="text" value="<?php echo _e($sqledit->field_backname,'templatic'); ?>" onblur="validatebackName()" />
                                        <div id="fldbackInfo" class="noerror"> <?php _e('Enter name of the field for backend','templatic'); ?> </div>
                                        <span class="spannote"> <?php _e('IMPORTANT: Avoid space between words; Use underscore ( _ ) instead. ','templatic'); ?> </span>
                                        </td>
                                      </tr>
									  <?php } 
									    if($edit_opt == 'false'){ ?>
                                      <tr>
                                        <td width="20%" valign="top">New field's HTML Variable :</td>
                                        <td>
                                        <input type="hidden" value="<?php _e($scriptpath,'templatic'); ?>" name="scripturl" id="scripturl"/>
                                        <input name="txtfldvariablename" id="txtfldvariablename" type="text" value="<?php echo _e($sqledit->field_variablename,'templatic'); ?>" onblur="validateDvalue()" />
                                        <div id="fldvariableInfo" class="noerror"> <?php _e('Enter name of the field','templatic'); ?> </div>
                                        <span class="spannote"> <?php _e('This will be use for back end; If you are unsure, use the same name as field name','templatic'); ?> </span>
                                        </td>
                                      </tr>
                                       <?php } 
									   if($edit_opt == 'false'){ ?>
                                      <tr>
                                        <td valign="top">Field type :</td>
                                        <td>
                                        <select name="sctfldtype" id="sctfldtype" onblur="validateFtype()" onchange="sctchange()">
                                		<?php if($sqledit->fieldtype !=0) 
                                        { ?>
                                        <option value="<?php echo $sqledit->fieldtype; ?>" selected="selected">
										<?php selectfield_type($sqledit->fieldtype) ?> </option>
                                        <option value="0"><?php _e('- select your field type- ','templatic');?> </option>
                                       <?php } else{ ?>
                                          <option value="0" selected="selected"><?php _e('Select field type','templatic');?> </option>
                                        <?php } ?>
                                          <option value="1"><?php _e('Text box','templatic');?></option>
                                          <option value="2"><?php _e('Textarea','templatic');?></option>
                                          <option value="3"><?php _e('Select box','templatic');?></option>
                                          <option value="4"><?php _e('Radio button','templatic');?></option>
                                          <option value="5"><?php _e('Check box','templatic');?></option>
                                          <option value="6"><?php _e('Date picker','templatic');?></option>
                                     
                                        </select>
                                        <div id="fldtypeInfo" class="noerror"> <?php _e('Please Enter Field Type','templatic'); ?></div>
                                 		<span class="spannote"> <?php _e('Select field type','templatic'); ?> </span>
                                        </td>
                                      </tr>
									  <?php }  if($edit_opt == 'false'){ ?>
                                      <tr>
                                        <td valign="top" align="left" ><?php _e('Default value :','templatic'); ?></td>
                                        <td><input type="text" name="txtdefaultvalue" id="txtdefualtvalue" value="<?php _e($sqledit->default_value,'templatic'); ?>" />
                                 		<span class="spannote"> <?php _e('Enter the default value,for input type','templatic'); ?> </span></td>
                                      </tr>
                                      <tr class="optsctvalue" id="optsctvalue">
                                      <td ><?php _e('Values :','templatic'); ?></td>
                                      <td >  <?php if($sqledit->fldvalues != "") {?> 
                                       		<div >                 
                                			 <textarea name="txtfieldvalues" id="txtfieldvalues" cols="60" rows=""><?php  _e($sqledit->fldvalues,'templatic'); ?></textarea>
                    						
                                            
                                           <span class="spannote"> <?php _e('This Option Values should be separated by comma.','templatic'); ?> </span>
                                           </div> 
                                           <?php }else{?>   
                                            <div>
                 
                                			 <textarea name="txtfieldvalues" id="txtfieldvalues" cols="60" rows=""><?php  _e($sqledit->fldvalues,'templatic'); ?></textarea>
                    			  
                                           <span class="spannote"> <?php _e('This Option Values should be separated by comma(,).','templatic'); ?> </span>
                                           </div>
                                           <?php } ?> 

                                      </td>
                                      </tr>
									 <?php }   ?>
                                      <tr>
                                        <td valign="top"><?php _e('Description :','templatic'); ?></td>
                                            <td><textarea cols="60" id="txtdescription" name="txtdescription" rows="5"><?php _e($sqledit->description,'templatic'); ?></textarea>
                                             <span class="spannote"> <?php _e('Description which will appear in backend and frontend','templatic'); ?>
                                             </td>
                                      </tr>
                                      <tr>
                                        <td valign="top"><?php _e('Perform validations? :','templatic'); ?></td>
                                        <td>
                                         
                                         <?php if($sqledit->isoptional == "1"){ ?>
                                            <input type="radio" name="optoptional" id="optoptional" value="1"  checked="CHECKED"  ><?php _e('Yes','templatic'); ?>
                                             <input type="radio" name="optoptional" id="optoptional" value="0" ><?php _e('No','templatic') ?>
                                           <?php }elseif($sqledit->isoptional == "0"){ ?>
                                       	 <?php  ?>
                                       	 <input type="radio" name="optoptional" id="optoptional" value="1"><?php _e('Yes','templatic'); ?>
                                            <input type="radio" name="optoptional" id="optoptional" value="0" checked="checked"><?php _e('No','templatic') ?>
                                     	 <?php }else{ ?>
                                          <input type="radio" name="optoptional" id="optoptional" value="1" checked="checked"><?php _e('Yes','templatic'); ?>
                                          <input type="radio" name="optoptional" id="optoptional" value="0" ><?php _e('No','templatic') ?>
                                         
                                         <?php } ?>
                                        <span class="spannote"><?php _e('Select &lsquo;Yes&rsquo; to perform validations on field.','templatic'); ?></span> 
                                        </td>
                                      </tr>
									  <tr>
                                        <td valign="top"><?php _e('Validation Type :','templatic'); ?></td>
                                            <td><select name="validation_type" id="validation_type"><?php echo validation_type_cmb($sqledit->validation_type); ?></select>
                                             <span class="spannote"> <?php _e('Select Validation Type','templatic'); ?>
                                             </td>
                                      </tr>
                                      <tr>
                                        <td valign="top"><?php _e('Position :','templatic'); ?></td>
                                        <td>
                                          <input type="text" name="txtposition" id="txtposition" accept="" value="<?php _e($sqledit->position,'templatic'); ?>" onkeyup="validposition()" >
                                          <div id="positionInfo" class="noerror"> <?php _e('Position Must be numeric','templatic'); ?> </div>
                                          <span class="spannote"><?php _e('Position of field (eg. 1,2,3)','templatic'); ?></span>                                 
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" align="center">
                                       <div class="button_spacer"> 
                                        <label>
                                        <?php if($_REQUEST['editfield']) {
										$fval = $wpdb->get_row("select * from $table_name where fid = '".$_REQUEST['editfield']."'")?>
                                          <input type="hidden" name="txtupadteid" id="txtupdateid" accept="" value="<?php _e($_REQUEST['editfield'],'templatic'); ?>"> 
										  <input type="hidden" name="update_field" id="update_field" accept="" value="<?php _e($fval->field_backname,'templatic'); ?>">
                                          <input type="submit" name="btnupdate" id="btnupdate"  value="Update" class="button-framework-imp" />&nbsp;                          
                                        
                                         <?php }else{ ?>
            								  <input type="submit" name="btnsave" id="btnsave" value="Save" class="button-framework-imp" />&nbsp;
                                         <?php } ?>
                                          <input type="submit" name="btncancel" id="btncancel"  value="Cancel" class="button-framework" />
                                        </label>
                                        </div>
                                        </td>
                                      </tr>
                                      </thead>
                                    </table>
  </form>
<?php } 
function appointment_adminselect_init()
{
			global $wpdb;
			$table_name = $wpdb->prefix . "appointment_fields";
			$sqlselect="SELECT * FROM $table_name order by fid ";	
			$sqlselect1 = $wpdb->get_results($sqlselect);
			if(isset($_REQUEST["deleted"])== "true")
			{
				?>
				<div id="submitedsuccess" class="submitedsuccess" style="display:none;"><?php _e('Submitted successfully','templatic'); ?> </div>
				<?php } ?>
				<div>
               	    <div class='headerdivh3'>
						<h3><?php _e('Manage Custom Fields','templatic');?></h3>
                        <div style="text-align:right; margin-top:-40px; margin-bottom:15px;">
						<a href="?page=Appointment&addfield=new#appointment_fields" class="button-primary"><?php  _e('Add Field','templatic');?></a>
					</div>
                    <p><?php _e('In this section, you can add, delete and manage the fields appearing in the appointment form.','templatic');?></p>
					</div>
					
					<table class="widefat post" width="90%" cellspacing="5" cellpadding="3" style="margin:5px;">
                    	<thead>
					<tr  style="height:10px;">
						<th><?php _e('Field name','templatic'); ?></th>
						<th><?php _e('Field type','templatic'); ?></th>
						<th><?php _e('Description','templatic'); ?></th>
						<th><?php _e('Position','templatic'); ?></th>
						<th><?php _e('Action','templatic'); ?></th>
                      </tr>
					  <tr><td colspan="7" ></td>
                    </tr>
					<?php
					foreach ($sqlselect1 as $fielddata)
					{?>
					<tr>
						<td> 
						<?php _e($fielddata->fieldname,'templatic'); ?>
                        
						</td>
						<td>
						<?php selectfield_type($fielddata->fieldtype); ?>
						</td>
						<td><?php _e(substr($fielddata->description,0,25),'templatic'); ?></td>
	
						<td><?php _e($fielddata->position,'templatic'); ?></td>
						<td><a href="javascript:void(0);showdetail('<?php _e($fielddata->fid,'templatic');?>');" title="View details"><img src="<?php echo get_template_directory_uri(); ?>/images/details.png" alt="reject" border="0" style="padding-right:5px;" /></a> 
                               
							  <a href="?page=Appointment&editfield=<?php _e($fielddata->fid,'templatic');?>#appointment_fields" title="Edit"><img src="<?php echo get_template_directory_uri(); ?>/images/edit.png" alt="reject" border="0" style="padding-left:5px;" /></a>  
							  <?php if($fielddata->field_variablename != 'tmplallservices' && $fielddata->field_variablename != 'templatic_time' && $fielddata->field_variablename != 'templatic_date' &&  $fielddata->field_variablename != 'templatic_email'){?>
							  <a href="javascript:void(0);"  onclick="return delete_fid('<?php _e($fielddata->fid,'tempaltic');?>');" title="Delete"><img src="<?php echo get_template_directory_uri(); ?>/images/delete.png" alt="reject" border="0" style="padding-left:8px;" /></a>
                              <?php } ?> </td>
					</tr>
                         <tr style=" display:none" id="detail_<?php _e($fielddata->fid,'templatic');?>">
                         <td colspan="6">
                              <table width="100%" style="background-color:#eee;">
                              <tbody>
                              <tr>
                                  <td><?php _e('field name :','templatic')?><strong><?php _e($fielddata->fieldname,'templatic'); ?></strong></td>
                                  <td><?php _e('field type :','templatic')?> <strong><?php _e($fielddata->fieldtype,'templatic'); ?></strong></td>
                                  <td><?php _e('HTML Variable :','templatic')?> <strong><?php _e($fielddata->field_variablename,'templatic'); ?></strong></td>
                              </tr> 
                              <tr>
                                  <td><?php _e('Descriptione :','templatic')?> <strong><?php _e($fielddata->description,'templatic'); ?></strong></td>
                                  <td><?php _e('Is Optional :','templatic')?> <strong><?php if($fielddata->isoptiona =='1'){ _e('Yes','templatic');  }else{ _e('No','templatic'); }?></strong></td>
                                  <td><?php _e('Field name for backend :','templatic')?><strong><?php _e($fielddata->field_backname,'templatic'); ?></strong></td>
                              </tr>
                              <tr>
                           	    <td><?php _e('Position :','templatic')?><strong><?php _e($fielddata->position,'templatic'); ?></strong></td>
                              	 <td><?php if($fielddata->fldvalues != "") {  _e('Values :','templatic')?>  <strong><?php _e($fielddata->fldvalues,'templatic'); ?></strong><?php } ?> </td>    
                               
                                <td></td>
                              </tr>
                              </tbody>
                           </table>
                       	   </td>
                      </tr>
							<?php }?>
                            </thead>
				  </table>
                  
            <div style="margin:10px 0;">
            <table border="0">
             <tr>
            	<td colspan="2" style="border-bottom:1px solid #ccc;"><strong>Legend:</strong> </td>
            </tr>
            <tr>
            	<td></td>
            </tr>
            <tr><td width="30px"><img src="<?php echo get_template_directory_uri(); ?>/images/details.png" alt="reject" border="0" style="padding-left:5px;" /></td><td><?php _e('View details of a service','templatic'); ?></td></tr>
			 <tr>
              <td><a href="?page=Appointment&amp;edit_service=<?php echo $servicedata->sid."#appointment_services"; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/edit.png" alt="reject" border="0" style="padding-left:5px;" /></a></td><td><?php _e('Edit a a service','templatic'); ?></td></tr>
             <tr><td><img src="<?php echo get_template_directory_uri(); ?>/images/delete.png" alt="reject" border="0" style="padding-left:5px;" /></td><td><?php _e('Delete a service','templatic'); ?></td></tr>
            
            </table>
            </div>
</div>
								<?php }
								register_activation_hook(_FILE_, "appointment_adminselect_init"); 
								
								register_activation_hook(_FILE_, "appointment_email_setup");
					
								?>
			</div>
<?php
					if(isset($_POST['btnupdate']) )
					{ 
						if( ($_POST['txtfldname'] != ""))
						{
							global $wpdb;
							$table_name = $wpdb->prefix . "appointment_fields";
							$user_table_name = $wpdb->prefix . "appointment_dbuser_data";
							$fieldname = $_POST['txtfldname'];
							$fieldbackname = $_POST['txtfldbackname'];
							$fieldvariable = $_POST['txtfldvariablename'];
							$fieldtype = $_POST['sctfldtype'];
							$defaultvalue = $_POST['txtdefaultvalue'];
							$values = $_POST['txtfieldvalues'];
							$description = $_POST['txtdescription'];
							$position = $_POST['txtposition'];
							$isoptional = $_POST['optoptional'];
							$validation_type = $_POST['validation_type'];
							$update_field = $_POST['update_field'];
							$update = $_POST['txtupadteid'];
							if(isset($_POST['etype']) &&  $_POST['etype'] == 'noupdate'){
								$sqlupdate= $wpdb->query("Update $table_name SET fieldname ='".$fieldname."',description='".$description."',isoptional='".$isoptional."',position='".$position."',validation_type = '".$validation_type."' WHERE fid='".$update."'"); 
							} else {
								$sqlupdate= $wpdb->query("Update $table_name SET fieldname ='".$fieldname."',field_backname ='".$fieldbackname."',field_variablename = '".$fieldvariable."',fieldtype='".$fieldtype."',default_value='".$defaultvalue."',fldvalues ='".$values."',description='".$description."',isoptional='".$isoptional."',position='".$position."',validation_type = '".$validation_type."' WHERE fid='".$update."'"); 
							}
								$wpdb->query("ALTER TABLE $user_table_name CHANGE `".$update_field."` `".$fieldbackname."` VARCHAR(100)");
						
							echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=fupdated#appointment_fields';</script>";
						 	}else{
							echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=efalse&editfield=".$_POST['txtupadteid']."#appointment_fields';</script>";
						}	

					}elseif(isset($_POST['btnsave'])  )
					{  
						if( ($_POST['txtfldname'] != "") && ($_POST['sctfldtype'] != "") && ($_POST['txtfldvariablename'] != ""))
						{
							global $wpdb;
							$table_dbuserdata = $wpdb->prefix ."appointment_dbuser_data";
							$table_name = $wpdb->prefix . "appointment_fields";
							$fieldname = $_POST['txtfldname'];
							$fieldbackname = $_POST['txtfldbackname'];
							$fieldvariable = "templatic_".$_POST['txtfldvariablename'];
							$fieldtype = $_POST['sctfldtype'];
							$defaultvalue = $_POST['txtdefaultvalue'];
							$values = $_POST['txtfieldvalues'];
							$description = $_POST['txtdescription'];
							$position = $_POST['txtposition'];
							$isoptional = $_POST['optoptional'];
							$validation_type = $_POST['validation_type'];
							$sqlinsert=$wpdb->query("INSERT INTO $table_name(fid,fieldname,field_backname,field_variablename,fieldtype,default_value,fldvalues,description,position,isoptional,validation_type) VALUES('', '".$fieldname."','".$fieldbackname."','".$fieldvariable."', '".$fieldtype."','".$defaultvalue."','".$values."','".$description."','".$position."','".$isoptional."','".$validation_type."') ");	
							if(mysql_affected_rows() > 0)
							{
							   echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=finserted#appointment_fields';</script>";
							}
						}else{
							echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=false&addfield=new#appointment_fields';</script>";
						}
					}elseif(isset($_REQUEST['deletepage']))
					{
						global $wpdb;
						$tablename = $wpdb->prefix . "appointment_fields";
						$table_dbuserdata = $wpdb->prefix ."appointment_dbuser_data";
						
						$appointment_user_info1 = $wpdb->get_row("select * from $tablename where fid='".$_REQUEST['deletepage']."'");
						$todrop_column = $wpdb->get_var("SHOW COLUMNS FROM $table_dbuserdata LIKE '".$appointment_user_info1->field_backname."'");
						
						$field_check = $wpdb->query("ALTER TABLE $table_dbuserdata DROP `".$appointment_user_info1->field_backname."`");
						
						$sqldelete= $wpdb->query("delete from $tablename where fid = '".$_REQUEST['deletepage']."'");
						if(mysql_affected_rows() > 0)
						{ 
							echo "<script language='javascript'> location.href='admin.php?page=Appointment&success=fdeleted#appointment_fields';</script>";
						}
					}
			
					if(isset($_POST['btncancel']))
					{
						echo "<script language='javascript'> location.href='admin.php?page=Appointment&addfield=true#appointment_fields';</script>";
					}
				   if(isset($_REQUEST['deleteall_old_data']))
				   {
					    global $wpdb;
						$templatic_appointment_listing = $wpdb->prefix."appointment_dbuser_data";
						$templatic_all_appointments = mysql_query("select * from $templatic_appointment_listing order by uid desc"); 
						$total_rows =  mysql_affected_rows();
						
						global $wpdb;
						$templatic_appointment_fields = $wpdb->prefix."appointment_fields";
						$templatic_all_appointment_fields = $wpdb->get_results("select * from $templatic_appointment_fields"); 
						$total_fields = mysql_affected_rows();
									
						$counter = 0;
						$idmy =0; 
						$total_fields = mysql_num_fields($templatic_all_appointments);
						while ($idmy < mysql_num_fields($templatic_all_appointments) )
						{
							if($idmy_obj > 7)
							{
								$not_available = mysql_field_name($templatic_all_appointments, $idmy);
								foreach($templatic_all_appointment_fields as $templatic_all_appointment_fields_obj)
								{
									
									$fieldname_obj = $templatic_all_appointment_fields_obj->field_backname;
									if($fieldname_obj == $not_available)
									{
										echo $not_available; echo $fieldname_obj;
										
									}
								 break;
								}
							}
						 	$idmy_obj =$idmy++;
						 }
	
				   }
	
					  

			function selectfield_type($fieldtype)
			{
				if($fieldtype == '1'){ _e('text','templatic'); 
				}elseif($fieldtype =='2'){ _e('text area','templatic'); 
				} elseif($fieldtype =="3"){ _e('Select box','templatic');
				}elseif($fieldtype =="4"){ _e('Option button','templatic');; 
				}elseif($fieldtype =="5"){ _e('Check box','templatic');
				}elseif($fieldtype =='6'){ _e('Date Picker','templatic'); }	
				
			}
			register_activation_hook(_FILE_, "selectfield_type");
?>
