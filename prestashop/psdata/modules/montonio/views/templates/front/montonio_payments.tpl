<form class="montonio-payment-method-form" method="POST" action="{$form_action}">
    <div id="montonio-payments-checkout"></div>
    <input type="hidden" name="preselectedAspsp" />
    <input type="hidden" name="preselectedCountry" />

    {if $payment_option_title}
        <button type="submit" class="button btn btn-default button-medium button-submit-payment">
            <span>{$payment_option_title}<i class="icon-chevron-right right"></i></span>
        </button>
    {/if}
</form>

<script>
    var selectMontonioAspsp = function() {
        $('input[name="preselectedAspsp"]').val(this.getPreferredProvider());
    };
    var selectMontonioCountry = function() {
        $('input[name="preselectedCountry"]').val(this.getPreferredRegion());
    };

    window.montonioLoadQueue = window.montonioLoadQueue || [];
    window.montonioLoadQueue.push(function() {
        var regionNames = {$region_names|json_encode nofilter};
        var regions = {$regions|json_encode nofilter};
        var options = {
            currency: '{$currency}',
            targetId: 'montonio-payments-checkout',
            defaultRegion:'{$default_region}',
            shouldAllowDeselection: true,
            regionInputName: 'preselectedCountry',
            inputName: 'preselectedAspsp',
            description: '{$description}',
            onProviderClick: window.selectMontonioAspsp,
            onRegionSelectorChange: window.selectMontonioCountry,
            storeSetupData: '{$store_setup_data nofilter}',
        }

        if (regionNames) {
            options.regionNames = regionNames;
        }

        if (regions) {
            options.regions = regions;
        }

        let checkout = Montonio.Checkout.PaymentInitiation.create(options);

        checkout.init();
        window.selectMontonioAspsp.bind(checkout)();
        window.selectMontonioCountry.bind(checkout)();
    });
</script>