define([
    'mage/utils/wrapper',
    'jquery',
    'Magento_Checkout/js/model/totals',
    'Magento_Ui/js/modal/alert',
], function (wrapper,$,totals,alert) {
    'use strict';

    return function (stepNavigator) {
        stepNavigator.next = wrapper.wrapSuper(stepNavigator.next, function () {
            this._super();
            console.log("llll");
            var subtotal = parseFloat(totals.totals()['subtotal']);
            console.log(subtotal);
            if(subtotal > 100){
            	alert({
			        title: $.mage.__('Some title'),
			        content: $.mage.__('Some content'),
			        actions: {
			            always: function(){}
			        }
			    });
            }
        });

        return stepNavigator;
    };
});
