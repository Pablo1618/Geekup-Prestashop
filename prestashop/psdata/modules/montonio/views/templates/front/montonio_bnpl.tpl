<form class="montonio-payment-method-form" id="montonio-bnpl-widget-container-form" action="{$form_action}" method="POST">
    <div id="montonio-bnpl-widget-container"></div>
    {if $title}
        <button type="submit" class="button btn btn-default button-medium button-submit-payment">
            <span>{$title}<i class="icon-chevron-right right"></i></span>
        </button>
    {/if}
</form>
<script>
    window.montonioLoadQueue = window.montonioLoadQueue || [];
    window.montonioLoadQueue.push(function() {
        var addMoreMessage = '{$add_more_message}';
        var overMaxAmountMessage = '{$over_max_amount_message}';
        var grandTotal = parseFloat('{$grand_total}');
        var payNextMonthTitle = '{$pay_next_month}';
        var payInTwoParts = '{$pay_in_two_parts}';
        var payInThreeParts = '{$pay_in_three_parts}';
        var montonioCheckoutBnpl = new Montonio.Checkout.Bnpl({
            targetId: "montonio-bnpl-widget-container",
            shouldInjectCSS: true,
            hideOptionIfNotAvailable: false,
            grandTotal: 30,
            bnplOptions: [{
                    period: '1',
                    title: payNextMonthTitle,
                    min: 30,
                    max: 800
                },
                {
                    period: '2',
                    title: payInTwoParts,
                    min: 75,
                    max: 2500
                },
                {
                    period: '3',
                    title: payInThreeParts,
                    min: 85,
                    max: 2500
                }
            ],
            addMoreMessage: addMoreMessage,
            grandTotal: grandTotal,
            overMaxAmountMessage: overMaxAmountMessage
        });

        montonioCheckoutBnpl.init();
    });
</script>