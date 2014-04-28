var basketObject = {
    updateBasketEnter : function(obj) {
        obj.live('keypress', function(e) {
            var code = e.keyCode ? e.keyCode : e.which;
            if (code == 13) {
                basketObject.updateBasket();
            }
        });
    },
    refreshBigBasket : function() {
        jQuery.post('mod/basket_view.php', function(data) {
            $('#big_basket').html(data);
        }, 'html');
    },
    removeFromBasket : function(obj) {
        obj.live('click', function() {
            var item = $(this).attr('rel');
            jQuery.post('mod/basket_remove.php', { id : item }, function(data) {
                basketObject.refreshBigBasket();
                basketObject.refreshSmallBasket();
            }, 'html');
            return false;
        });
    },
    refreshSmallBasket : function() {
        jQuery.post('mod/basket_small_refresh.php', function(data) {
            $.each(data, function(k, v) {
                $("#basket_left ." + k + " span").text(v);
            });
        }, 'json');
    },
    add2Basket : function(obj) {
        obj.live('click', function() {
            var trigger = $(this);
            var param = trigger.attr("rel");
            var item = param.split("_");
            jQuery.post('mod/basket.php', { id : item[0], job : item[1] }, function(data) {
                var new_id = item[0] + '_' + data.job;
                if (data.job != item[1]) {
                    if (data.job == 0) {
                        trigger.attr("rel", new_id);
                        trigger.text("Remove from basket");
                        trigger.addClass("red");
                    } else {
                        trigger.attr("rel", new_id);
                        trigger.text("Add to basket");
                        trigger.removeClass("red");
                    }
                    basketObject.refreshSmallBasket();
                }
            }, 'json');
            return false;
        });
    },
    updateBasketClick : function(obj) {
        obj.live('click', function(event) {
            basketObject.updateBasket();
            return false;
        });
    },
    updateBasket : function() {
        jQuery.each($('#frm_basket :input'), function() {
            var sid = $(this).attr('id').split('-');
            var val = $(this).val();
            jQuery.post('mod/basket_qty.php', { id: sid[1], qty: val }, function(data) {
                basketObject.refreshSmallBasket();
                basketObject.refreshBigBasket();
            }, 'html');
        });
    },
    loadingPayPal : function(obj) {
        obj.live('click', function() {
            var token = $(this).attr('id');
            var image = "<div style=\"text-align:center\">";
            image = image + "<img src=\"images/loadinfo.net.gif\"";
            image = image + " alt=\"Proceeding to PayPal\" />";
            image = image + "<br />Please wait while we are redirecting you to PayPal...";
            image = image + "</div><div id=\"frm_pp\"></div>";
            $('#big_basket').fadeOut(200, function() {
                $(this).html(image).fadeIn(200, function() {
                    basketObject.send2PayPal(token);
                });
            });
            return false;
        });
    },
    send2PayPal : function(token) {
        jQuery.post('mod/paypal.php', { token : token }, function(data) {
            $('#frm_pp').html(data);
            // submit form automatically
            $('#frm_paypal').submit();
        }, 'html');
    }
};
$(document).ready(function() {

    basketObject.removeFromBasket($('.remove_basket'));
    basketObject.updateBasketClick($('.update_basket'));
    basketObject.updateBasketEnter($('.fld_qty'));
	basketObject.add2Basket($(".add_to_basket"));
	basketObject.loadingPayPal($('.paypal'));

});