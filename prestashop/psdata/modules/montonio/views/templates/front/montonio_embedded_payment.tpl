<form class="montonio-payment-method-form" method="POST" action="{$montonio_embedded_form_action}" id="{$montonio_embedded_form_id}" data-is-sandbox="{$montonio_embedded_is_sandbox}" data-method-name="{$montonio_embedded_method_name}" data-payment-intent-uuid="{$montonio_embedded_payment_intent_uuid}" data-is-embedded="1">
    <div id="{$montonio_embedded_form_id}-target"></div>
    {if $montonio_embedded_form_submit_text}
        <button type="submit" class="button btn btn-default button-medium button-submit-payment">
            <span>{$montonio_embedded_form_submit_text}<i class="icon-chevron-right right"></i></span>
        </button>
    {/if}
</form>

<script>
    window.montonioLoadQueue = window.montonioLoadQueue || [];
    window.montonioCheckoutInstances = window.montonioCheckoutInstances || {};
    window.montonioLoadQueue.push(function() {
            if (isMontonioStripeIframeLoaded('{$montonio_embedded_form_id}') && window.montonioCheckoutInstances['{$montonio_embedded_payment_intent_uuid}']) {
            return;
        }

        if (!isMontonioStripeIframeLoaded('{$montonio_embedded_form_id}') && window.montonioCheckoutInstances['{$montonio_embedded_payment_intent_uuid}']) {
        delete window.montonioCheckoutInstances['{$montonio_embedded_payment_intent_uuid}'];
    }

    var montonioCheckoutInstance = Montonio.Checkout.EmbeddedPayments.initializePayment({
    stripePublicKey: "{$montonio_embedded_stripe_public_key}",
    stripeClientSecret: "{$montonio_embedded_stripe_client_secret}",
    paymentIntentUuid: "{$montonio_embedded_payment_intent_uuid}",
    locale: "{$montonio_embedded_locale}",
    country: "{$montonio_embedded_country}",
    targetId: "{$montonio_embedded_form_id}-target"
    });

    window.montonioCheckoutInstances['{$montonio_embedded_payment_intent_uuid}'] = montonioCheckoutInstance;
    });

    function isMontonioStripeIframeLoaded(formId) {
        var targetElement = document.getElementById(formId + '-target');
        return targetElement && targetElement.querySelector('iframe') !== null;
    }

    function montonioInterceptFormSubmissions() {
        var forms = document.querySelectorAll('form');
        for (var i = 0; i < forms.length; i++) {
            var form = forms[i];
            if (form._montonioSubmitInterceptorRegistered) {
                continue;
            }

            // Handle form submission via the submit event
            form.addEventListener('submit', function(event) {
                handleFormSubmission(event, this);
            });

            // Override the form's submit method
            var originalSubmit = form.submit;
            form.submit = function(event) {
                handleFormSubmission(event, this, originalSubmit);
            };

            form._montonioSubmitInterceptorRegistered = true;
        }
    }

    function handleFormSubmission(event, form, originalSubmit) {
        if (!form.action.includes('paymentIntentUuid') || !form.action.includes('isEmbedded')) {
            if (originalSubmit) {
                return originalSubmit.call(form);
            }
            return;
        }

        if (event && event.preventDefault) {
            event.preventDefault();
        }

        montonioToggleSpinnerOverlay(true);
        var montonioPaymentIntentUuid = montonioGetPaymentIntentUuid(form);

        var action = form.action;
        action = action.replace(/paymentIntentUuid=[^&]+/, 'paymentIntentUuid=' + montonioPaymentIntentUuid);

        // Instead of submitting the form, we will make an ajax request to the controller
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();
        xhr.open(form.method, action, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function() {
            if (xhr.readyState !== 4 || xhr.status !== 200) {
                return;
            }

            var response = JSON.parse(xhr.responseText);
            if (!response.success) {
                // reload the page to show the error message
                return location.reload();
            }

            var montonioCheckoutIsSandbox = form.getAttribute('data-is-sandbox') === '1';
            var montonioCheckoutInstance = getMontonioCheckoutInstance(montonioPaymentIntentUuid);
            if (!montonioCheckoutInstance) {
                return setMontonioErrors('Montonio Checkout instance not found');
            }

            // Confirm the payment in Montonio JS SDK, then redirect the user to the thank you page
            montonioCheckoutInstance.confirmPayment(montonioCheckoutIsSandbox)
                .then(function(response) {
                    if (response.status === "succeeded") {
                        window.location.replace(response.returnUrl);
                        montonioToggleSpinnerOverlay(true);
                    } else {
                        throw new Error('Payment failed');
                    }
                })
                .catch(function(error) {
                    console.error('Montonio payment failed', error);
                    setMontonioErrors(error.message);
                });
        };

        xhr.send(formData);
    }

    montonioInterceptFormSubmissions();
    ensureMontonioCompatibility();

    // Observe the document for new forms
    var observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            montonioInterceptFormSubmissions();
            ensureMontonioCompatibility();
        });
    });
    observer.observe(document.body, { childList: true, subtree: true });

    function getMontonioCheckoutInstance(instanceId) {
        return window.montonioCheckoutInstances[instanceId] || null;
    }

    /**
     * Will make an XHR request to the Montonio error controller and then reload the page
     */
    function setMontonioErrors(errors) {
        var montonioErrorControllerBaseUrl = '{$montonio_embedded_error_controller_url}';
        var errorUrl = montonioErrorControllerBaseUrl + '?montonio_errors=' + encodeURIComponent(errors);

        // redirect to the error controller
        window.location.replace(errorUrl);
    }

    function montonioGetPaymentIntentUuid(form) {
        // in Knowband Supercheckout, the form that is submitted by default is not actually the form that the user fills in
        // so we need to take the paymentIntentUuid from that form instead and use it to confirm the payment
        // if the form has a parent div#velsof_payment_dialog:
        if (form.closest('#velsof_payment_dialog')) {
            // we need to figure out the correct form to use. Get the method name from the form dataset
            var methodName = form.getAttribute('data-method-name');
            // find all forms with the same method name
            var forms = document.querySelectorAll('form[data-method-name="' + methodName + '"]');
            // Ignore the form that is currently being submitted by filtering out by the ID
            var formsArray = Array.prototype.slice.call(forms); // Convert NodeList to Array
            var correctForm = null;
            for (var i = 0; i < formsArray.length; i++) {
                if (formsArray[i].id !== form.id && formsArray[i].getAttribute('data-payment-intent-uuid')) {
                    correctForm = formsArray[i];
                    break;
                }
            }
            if (correctForm) {
                return correctForm.getAttribute('data-payment-intent-uuid');
            }
        }

        return form.getAttribute('data-payment-intent-uuid');
    }

    // The Checkout Compatibility
    // Modify the existing updatePaymentBlock function to skip updates for "montonio" options
    function ensureMontonioCompatibility() {
        if (!window.originalUpdatePaymentBlock) {
            window.originalUpdatePaymentBlock = updatePaymentBlock;
        }

        window.updatePaymentBlock = function(paymentModulesList, html, checksum, triggerElementName) {
            try {
                // Get the selected payment option's module name
                var selectedOption = payment.getSelectedOptionModuleName();

                // Return early if selectedOption contains "montonio"
                if (selectedOption && selectedOption.includes("montonio")) {
                    return;
                }

                // Otherwise, call the original function
                return window.originalUpdatePaymentBlock(paymentModulesList, html, checksum, triggerElementName);

            } catch (error) {
                // If an error occurs, fallback to the original implementation
                return window.originalUpdatePaymentBlock(paymentModulesList, html, checksum, triggerElementName);
            }
        };
    }
</script>