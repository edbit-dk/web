
<form action="<?php echo $action ?>" method="post" id="quickpay_checkout">
	<input type="hidden" name="protocol" value="<?php echo $quickpay_creditcard_protocol; ?>" />
	<input type="hidden" name="msgtype" value="<?php echo $quickpay_creditcard_msgtype; ?>" />
	<input type="hidden" name="merchant" value="<?php echo $quickpay_creditcard_merchant; ?>" />
	<input type="hidden" name="language" value="<?php echo $quickpay_creditcard_language; ?>" />
	<input type="hidden" name="ordernumber" value="<?php echo $order_id; ?>" />
	<input type="hidden" name="amount" value="<?php echo $amount; ?>" />
	<input type="hidden" name="currency" value="<?php echo $currency; ?>" />
	<input type="hidden" name="continueurl" value="<?php echo $quickpay_creditcard_continueurl; ?>" />
	<input type="hidden" name="cancelurl" value="<?php echo $quickpay_creditcard_cancelurl; ?>" />
	<input type="hidden" name="callbackurl" value="<?php echo $quickpay_creditcard_callbackurl; ?>" />
	<input type="hidden" name="autocapture" value="<?php echo $quickpay_creditcard_autocapture; ?>" />
	<input type="hidden" name="cardtypelock" value="creditcard" />
	<input type="hidden" name="splitpayment" value="<?php echo $quickpay_creditcard_splitpayment; ?>" />
	<input type="hidden" name="md5check" value="<?php echo $md5; ?>" />
	<input type="hidden" name="CUSTOM_variable" value="<?php echo $order_id; ?>" />
	<input type="hidden" name="CUSTOM_category" value="SC17" />
	<input type="hidden" name="CUSTOM_product_id" value="P03" />
	<input type="hidden" name="CUSTOM_vat_amount" value="0" />

	<div class="buttons">
		<div class="pull-right"><input type="submit" value="<?php echo $button_confirm; ?>" class="btn btn-primary" /></div>
	</div>
</form>
