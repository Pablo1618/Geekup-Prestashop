{foreach from=$montonio_payment_options item=payment_option}
    {assign var="payment_option_slug" value=$payment_option['config_key']|escape:'htmlall':'UTF-8'|lower}
    {assign var="payment_option_action" value=$payment_option['action']|escape:'htmlall':'UTF-8'}
    {assign var="payment_option_title" value=$payment_option['title']|escape:'htmlall':'UTF-8'}
    {assign var="payment_option_description" value=$payment_option['description']|escape:'htmlall':'UTF-8'}
    {assign var="payment_option_logo_url" value=$payment_option['logo_url']|escape:'htmlall':'UTF-8'}
    {assign var="payment_option_html" value=$payment_option['html']}
    {assign var="payment_option_is_embedded" value=$payment_option['is_embedded']|escape:'htmlall':'UTF-8'}

    {assign var="payment_option_chevron" value="chevron-right"}
    {assign var="payment_module_class" value="payment_module {$payment_option_slug}_payment_button montonio_payment_module"}
    {if $payment_option_is_embedded}
        {assign var="payment_module_class" value="{$payment_module_class} is-embedded"}
    {/if}
    {if $payment_option_html}
        {assign var="payment_module_class" value="{$payment_module_class} has-html"}
    {/if}
    {if $payment_option_is_embedded || $payment_option_html}
        {assign var="payment_module_class" value="{$payment_module_class} has-details"}
        {assign var="payment_option_chevron" value=""}
    {/if}

    <div class="row montonio-row">
        <div class="col-xs-12">
            <p class="{$payment_module_class}">
                <a id="{$payment_option_slug}_payment_button_link" class="montonio {$payment_option_slug} {$payment_option_chevron}" href="{$payment_option_action}">
                    <img src="{$payment_option_logo_url}" alt="{$payment_option_title}" class="montonio_payment_option_logo">
                    {$payment_option_title}
                    <span>{$payment_option_description}</span>
                </a>

                {if $payment_option_html}
                <div class="montonio_payment_option_details">
                    {$payment_option_html}
                </div>
            {/if}
            </p>
        </div>
    </div>
{/foreach}