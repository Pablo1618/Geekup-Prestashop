document.addEventListener('DOMContentLoaded', function() {
    // Initial setup on page load
    applyVisibilityRules();
    
    // Attach event listeners
    document.getElementById('MONTONIO_PAYMENTS_STYLE').addEventListener('change', applyVisibilityRules);
    document.getElementById('MONTONIO_BNPL_STYLE').addEventListener('change', applyVisibilityRules);

    // Get all the radio buttons and attach event listeners
    var radios = document.querySelectorAll('input[type="radio"][name^="MONTONIO_PAYMENTS"], input[type="radio"][name^="MONTONIO_CARD"], input[type="radio"][name^="MONTONIO_BLIK"], input[type="radio"][name^="MONTONIO_BNPL"], input[type="radio"][name^="MONTONIO_FINANCING"]');
    radios.forEach(function(radio) {
        radio.addEventListener('change', applyVisibilityRules);
    });

    // Create sortable list for payment methods order
    createPaymentMethodOrderSortable();
});

function applyVisibilityRules() {
    var isPaymentsEnabled = document.querySelector('input[name="MONTONIO_PAYMENTS_ENABLED"]:checked').value === '1';
    var isCardEnabled = document.querySelector('input[name="MONTONIO_CARD_PAYMENTS_ENABLED"]:checked').value === '1';
    var isBlikEnabled = document.querySelector('input[name="MONTONIO_BLIK_ENABLED"]:checked').value === '1';
    var isBnplEnabled = document.querySelector('input[name="MONTONIO_BNPL_ENABLED"]:checked').value === '1';
    var isFinancingEnabled = document.querySelector('input[name="MONTONIO_FINANCING_ENABLED"]:checked').value === '1';
    var checkoutStyle = document.getElementById('MONTONIO_PAYMENTS_STYLE').value;
    var bnplStyle = document.getElementById('MONTONIO_BNPL_STYLE').value;

    var visibilityRules = {
        // Montonio Bank Payments
        'MONTONIO_PAYMENTS_STYLE': isPaymentsEnabled,
        'MONTONIO_PAYMENTS_DISPLAY_NAME_MODE': isPaymentsEnabled,
        'MONTONIO_PAYMENTS_SHOW_LOGO': isPaymentsEnabled,
        'MONTONIO_PAYMENTS_HIDE_COUNTRY': isPaymentsEnabled && checkoutStyle === 'banklist',
        'MONTONIO_PAYMENTS_DEFAULT_COUNTRY': isPaymentsEnabled && checkoutStyle === 'banklist',
        'MONTONIO_PAYMENTS_AUTOMATICALLY_CHANGE_COUNTRY': isPaymentsEnabled && checkoutStyle === 'banklist',
        'MONTONIO_PAYMENTS_AUTOMATICALLY_SELECT_METHOD': isPaymentsEnabled && checkoutStyle === 'banklist',
        'MONTONIO_PAYMENTS_TRANSLATE_COUNTRY_DROPDOWN': isPaymentsEnabled && checkoutStyle === 'banklist',

        // Montonio Card Payments
        'MONTONIO_CARD_PAYMENTS_SHOW_LOGO': isCardEnabled,
        'MONTONIO_CARD_PAYMENTS_IN_CHECKOUT': isCardEnabled,

        // Montonio BLIK
        'MONTONIO_BLIK_SHOW_LOGO': isBlikEnabled,
        'MONTONIO_BLIK_IN_CHECKOUT': isBlikEnabled,

        // Montonio BNPL
        'MONTONIO_BNPL_STYLE': isBnplEnabled,
        'MONTONIO_BNPL_SHOW_LOGO': isBnplEnabled,
        'MONTONIO_BNPL_GRAND_TOTAL_MIN': isBnplEnabled,
        'MONTONIO_BNPL_GRAND_TOTAL_MAX': isBnplEnabled,

        // Montonio Financing
        'MONTONIO_FINANCING_SHOW_LOGO': isFinancingEnabled,
        'MONTONIO_FINANCING_GRAND_TOTAL_MIN': isFinancingEnabled,
        'MONTONIO_FINANCING_GRAND_TOTAL_MAX': isFinancingEnabled,
    };

    for (var key in visibilityRules) {
        var element = document.getElementById(key) || document.getElementsByName(key)[0];
        if (element) {
            element.closest('.form-group').style.display = visibilityRules[key] ? 'block' : 'none';
        }
    }
}

function createPaymentMethodOrderSortable() {
    var list = $('#montonio-payment-methods-order');
    var sortInput = $('#MONTONIO_PAYMENT_METHODS_ORDER');

    var fnSubmit = function(){
        var sortOrder = [];
        list.children('li').each(function(){
            sortOrder.push($(this).data('id'));
        });

        sortInput.val(sortOrder.join(','));
    };

    /* store values */
    list.children('li').each(function() {
          var li = $(this);
  
        //store value and clear title value
        li.data('id',li.attr('data-method')).attr('data-method','');
    });

    /* sortables */
    list.sortable({
      opacity: 0.7,
      update: function() {
        fnSubmit();
      }
    });

}