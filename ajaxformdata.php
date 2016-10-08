<?php
	ob_start();
	session_start();
	include "includes/admin_common.php";
	
	
	if($_REQUEST['action'] =='checkforgotPasswordEmail'){
		$objform1 = new siteadmin();	
		echo $checkEmail = $objform1->forgotPasswordEmail($_REQUEST['email']);
		exit;
	}

	check_authentication();
	$objform = new siteadmin();	

	$PerPage = 1;
	$Page    = @$_REQUEST["Page"];
	$Display = @$_REQUEST["Display"];

	switch($_REQUEST['action']) {
	case "addmapping":
		$objform->InsertmappingDetails($_REQUEST);
		$pagecontent =$objform->GetmappingDetails($PerPage, $Page, $Display,$_REQUEST);
		break;
		
	case "deletemapping":
		$objform->DeleteMapping($_REQUEST['id']);
		break;
	
	case 'getmapping':
		$pagecontent =$objform->GetMappingFields($_REQUEST['replacefield']);
		break;
	
	case 'gettemplatemapping':
		$pagecontent =$objform->GetMappingTemplateId($_REQUEST['title']);
		break;	
		
	case 'tempstatus':
		$pagecontent =$objform->updatetempstatus($_REQUEST);
		break;
	
	case 'adminuserstatus':
		$pagecontent =$objform->updateadminuserstatus($_REQUEST);
		break;	
		
	case 'getAjaxSMScustomerslist':
		$pagecontent =$objform->getAjaxSMScustomerslist($_REQUEST);
		break;	

	case 'triggerstatus':
		$pagecontent =$objform->updatetriggerstatus($_REQUEST);
		break;	
	
	case 'customercummunicationlist':
		$pagecontent =$objform->CustomerCummunicationListAjax($_REQUEST);
		break;

	case 'customernoteslist':
		$pagecontent =$objform->CustomerNotesListAjax($_REQUEST);
		break;	
	
	case 'getcontainerCategory':
		$pagecontent =$objform->getcontainerCategoryTypelist($_REQUEST['containerCategoryType']);
		break;				
	
	case 'checkEmail':
		$pagecontent =$objform->checkcheckEmail($_REQUEST);
		break;				
	case 'categorylist':
		$pagecontent =$objform->CategoryListAjax($_POST);
		break;
					
	case 'penalityfees':
		$pagecontent =$objform->PenalityFeesListAjax($_POST);
		break;	
							
	case 'customerlist':
		$pagecontent =$objform->CustomerlistListAjax($_POST);
		break;	
	
	case 'containerpriceslist':
		$pagecontent =$objform->ContainerPricesList($_REQUEST['name']);
		break;		
	
	
	case 'checkContainerName':
		$pagecontent =$objform->checkContainerName($_REQUEST['name']);
		break;		
	
	case 'delecteMultiplecontainerlist':
		$pagecontent =$objform->delecteMultiplecontainerlist($_POST);
		break;	
	
	
	case 'changeSMSscheduleStatus':
		$pagecontent =$objform->changeSMSscheduleStatus($_REQUEST);
		break;	

	case 'changeContainerStatus':
		$pagecontent =$objform->changeContainerStatusFun($_REQUEST);
		break;	
		
	case 'expenseslist':
		$pagecontent =$objform->ExpensesListAjax($_POST);
		break;	

	case 'removalslist':
		$pagecontent =$objform->RemovalsListAjax($_POST);
		break;		
		
	case 'previoues_payment_history':
		$pagecontent =$objform->PreviouesPaymentHistorylistAjax($_POST, $_REQUEST['customer_id']);
		break;


	case 'payment_history':
		$pagecontent =$objform->paymentHistorylistAjax($_REQUEST['customer_id']);
		break;

	case 'termsconditionlist':
		$pagecontent =$objform->termsConditionlistAjax($_POST);
		break;

	case 'totalMonthDueDateCalculation':
		$pagecontent =$objform->totalMonthDueDateCalculation($_REQUEST);
		break;	
		
	case 'containerlist':
		$pagecontent =$objform->ContainerListAjax($_POST);
		break;	
	
	case 'adminuserlist':
		$pagecontent =$objform->AdminuserListAjax($_POST);
		break;	
	
	case 'triggerlist':
		$pagecontent =$objform->TriggerListAjax($_POST);
		break;	
	
	case 'deletepenality':
		$pagecontent =$objform->deletepenalityfee($_REQUEST['id']);
		break;
		
	case 'deletecontainerPrice':
		$pagecontent =$objform->deletecontainerPrice($_REQUEST['id']);
		break;
		
	case 'deletecontainer':
		$pagecontent =$objform->DeletecontainerDetails($_REQUEST['id']);
		break;
		
	case 'deletetermscondition':
		$pagecontent =$objform->DeleteTermsConditionDetails($_REQUEST['id']);
		break;	
	
	case 'deletecontainer':
		$pagecontent =$objform->DeletecontainerDetails($_REQUEST['id']);
		break;
					
	case 'deletecategory':
		$pagecontent =$objform->DeletecategoryDetails($_REQUEST['id']);
		break;
		
	case 'deleteNotes':
		$pagecontent =$objform->DeleteNotesDetailsDB($_REQUEST['id']);
		break;		
		
	case 'deletecustomer':
		$pagecontent =$objform->DeletecustomerDetailsDB($_REQUEST['id']);
		break;

	case 'deleteadminuser':
		$pagecontent =$objform->DeleteadminuserDetails($_REQUEST['uid']);
		break;
	
	case 'templatelist':
		$pagecontent =$objform->TemplateListAjax($_POST);
		break;			
	
	case 'deletetemplate':
		$pagecontent =$objform->DeleteTemplateDetails($_REQUEST['templid']);	
		break;	
		
	case 'CustomerNoteNotification':							
		$pagecontent =$objform->CustomerNoteNotification($_REQUEST);	
		break;
		
	case 'CustomerNoteNotification':							
		$pagecontent =$objform->CustomerNoteNotification($_REQUEST);	
		break;
		
	case 'CustomerNoteid':
		  $pagecontent =$objform->CustomerNotesection($_REQUEST);	
		  break;
	case 'CustomerNotelist':
		  $pagecontent =$objform->CustomerNotificationlist($_REQUEST);	
		  break;
		
	case 'ViewCustomerlist':
		$pagecontent =$objform->viewCustomerlist($_REQUEST);	
		break;			
		
	}
	
	echo $pagecontent;
?>