<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-quickpay_viabill" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-quickpay_viabill" class="form-horizontal">

        	<div class="form-group">
	            <label class="col-sm-2 control-label" for="select-status"><span data-toggle="tooltip" title="<?php echo $tooltip_status; ?>"><?php echo $entry_status; ?></span></label>

	            <div class="col-sm-10">
					<select id="select-status" name="quickpay_viabill_status" class="form-control">
						<?php if ($quickpay_viabill_status) { ?>
							<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
							<option value="0"><?php echo $text_disabled; ?></option>
						<?php } else { ?>
							<option value="1"><?php echo $text_enabled; ?></option>
							<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
						<?php } ?>
					</select>          
	            </div>
	        </div>

	        <div class="form-group required">
	        	<label class="col-sm-2 control-label" for="input-protocol"><span data-toggle="tooltip" title="<?php echo $tooltip_protocol; ?>"><?php echo $entry_protocol; ?></span></label>
	        	<div class="col-sm-10">
	        		 <input type="text" name="quickpay_viabill_protocol" value="<?php echo $quickpay_viabill_protocol; ?>"  id="input-protocol" class="form-control" />
					<?php if ($error_protocol) { ?>
						<div class="text-danger"><?php echo $error_protocol; ?></div>
					<?php } ?>
	        	</div>
	        </div>

	        <div class="form-group required">
	        	<label class="col-sm-2 control-label" for="input-msgtype"><span data-toggle="tooltip" title="<?php echo $tooltip_msgtype; ?>"><?php echo $entry_msgtype; ?></span></label>
	        	<div class="col-sm-10">
	        		 <input type="text" name="quickpay_viabill_msgtype" value="<?php echo $quickpay_viabill_msgtype; ?>"  id="input-msgtype" class="form-control" />
					<?php if ($error_msgtype) { ?>
						<div class="text-danger"><?php echo $error_msgtype; ?></div>
					<?php } ?>
	        	</div>
	        </div>

	        <div class="form-group required">
	        	<label class="col-sm-2 control-label" for="input-merchant"><span data-toggle="tooltip" title="<?php echo $tooltip_merchant; ?>"><?php echo $entry_merchant; ?></span></label>
	        	<div class="col-sm-10">
	        		 <input type="text" name="quickpay_viabill_merchant" value="<?php echo $quickpay_viabill_merchant; ?>" id="input-merchant" class="form-control" />
					<?php if ($error_merchant) { ?>
						<div class="text-danger"><?php echo $error_merchant; ?></div>
					<?php } ?>
	        	</div>
	        </div>

	        <div class="form-group required">
	        	<label class="col-sm-2 control-label" for="select-language"><span data-toggle="tooltip" title="<?php echo $tooltip_language; ?>"><?php echo $entry_language; ?></span></label>
	        	<div class="col-sm-10">
					<select id="select-language" name="quickpay_viabill_language"  class="form-control">
					<?php
					foreach ($languages as $key => $value) {
						if ($key == $quickpay_viabill_language) { ?>
						<option value="<?php echo $key; ?>" selected="selected"><?php echo $value; ?></option>
						<?php } else { ?>
						<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
					<?php }
					} ?>
					</select>
					<?php if ($error_language) { ?>
						<div class="text-danger"><?php echo $error_language; ?></div>
					<?php } ?>
	        	</div>
	        </div>

	        <div class="form-group required">
	        	<label class="col-sm-2 control-label" for="input-md5check"><span data-toggle="tooltip" title="<?php echo $tooltip_md5check; ?>"><?php echo $entry_md5check; ?></span></label>
	        	<div class="col-sm-10">
	        		 <input type="text" name="quickpay_viabill_md5check" value="<?php echo $quickpay_viabill_md5check; ?>" id="input-md5check" class="form-control" />
					<?php if ($error_md5check) { ?>
						<div class="text-danger"><?php echo $error_md5check; ?></div>
					<?php } ?>
	        	</div>
	        </div>                

	        <div class="form-group">
	        	<label class="col-sm-2 control-label" for="input-autocapture"><span data-toggle="tooltip" title="<?php echo $tooltip_autocapture; ?>"><?php echo $entry_autocapture; ?></span></label>
	        	<div class="col-sm-10">
					<?php 
					if ($quickpay_viabill_autocapture) { ?>
							<input type="radio" name="quickpay_viabill_autocapture" value="1" checked="checked" />
							<?php echo $text_yes; ?>
							<input type="radio" name="quickpay_viabill_autocapture" value="0" />
						<?php echo $text_no;
						} else { ?>
							<input type="radio" name="quickpay_viabill_autocapture" value="1" />
							<?php echo $text_yes; ?>
							<input type="radio" name="quickpay_viabill_autocapture" value="0" checked="checked" />
						<?php echo $text_no;
					} 
					?>
	        	</div>
	        </div>  

	        <div class="form-group">
	        	<label class="col-sm-2 control-label" for="input-splitpayment"><span data-toggle="tooltip" title="<?php echo $tooltip_splitpayment; ?>"><?php echo $entry_splitpayment; ?></span></label>
	        	<div class="col-sm-10">
					<?php if ($quickpay_viabill_splitpayment) { ?>
						<input type="radio" name="quickpay_viabill_splitpayment" value="1" checked="checked" />
						<?php echo $text_yes; ?>
						<input type="radio" name="quickpay_viabill_splitpayment" value="0" />
						<?php echo $text_no;
						} else { ?>
						<input type="radio" name="quickpay_viabill_splitpayment" value="1" />
						<?php echo $text_yes; ?>
						<input type="radio" name="quickpay_viabill_splitpayment" value="0" checked="checked" />
						<?php echo $text_no;
					} ?>
	        	</div>
	        </div>  

	        <div class="form-group">
	        	<label class="col-sm-2 control-label" for="input-order_status_completed"><span data-toggle="tooltip" title="<?php echo $tooltip_order_status_completed; ?>"><?php echo $entry_order_status_completed; ?></span></label>
	        	<div class="col-sm-10">
					<select name="quickpay_viabill_order_status_completed" class="form-control">
						<?php
						foreach ($order_statuses as $order_status) {
							if ($order_status['order_status_id'] == $quickpay_viabill_order_status_completed) { ?>
							<option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
							<?php } else { ?>
							<option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
						<?php }
						} ?>
					</select>
	        	</div>
	        </div>        
        </form>
      </div>
    </div>
  </div>
</div>
<?php echo $footer; ?> 