
<form action="<?php echo $action ?>" method="post" id="quickpay_checkout">
	<input type="hidden" name="protocol" value="<?php echo $quickpay_paii_protocol; ?>" />
	<input type="hidden" name="msgtype" value="<?php echo $quickpay_paii_msgtype; ?>" />
	<input type="hidden" name="merchant" value="<?php echo $quickpay_paii_merchant; ?>" />
	<input type="hidden" name="language" value="<?php echo $quickpay_paii_language; ?>" />
	<input type="hidden" name="ordernumber" value="<?php echo $order_id; ?>" />
	<input type="hidden" name="amount" value="<?php echo $amount; ?>" />
	<input type="hidden" name="currency" value="<?php echo $currency; ?>" />
	<input type="hidden" name="continueurl" value="<?php echo $quickpay_paii_continueurl; ?>" />
	<input type="hidden" name="cancelurl" value="<?php echo $quickpay_paii_cancelurl; ?>" />
	<input type="hidden" name="callbackurl" value="<?php echo $quickpay_paii_callbackurl; ?>" />
	<input type="hidden" name="autocapture" value="<?php echo $quickpay_paii_autocapture; ?>" />
	<input type="hidden" name="cardtypelock" value="paii" />
	<input type="hidden" name="splitpayment" value="<?php echo $quickpay_paii_splitpayment; ?>" />
	<input type="hidden" name="md5check" value="<?php echo $md5; ?>" />
	<input type="hidden" name="CUSTOM_reference_title" value="<?php echo $order_id; ?>" />
	<input type="hidden" name="CUSTOM_category" value="SC17" />
	<input type="hidden" name="CUSTOM_product_id" value="P03" />
	<input type="hidden" name="CUSTOM_vat_amount" value="100" />

	<div class="buttons">
		<div class="pull-right"><input type="submit" value="<?php echo $button_confirm; ?>" class="btn btn-primary" /></div>
	</div>
</form>