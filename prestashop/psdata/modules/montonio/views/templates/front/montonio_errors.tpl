{if isset($montonio_errors) && $montonio_errors}
    <div class="alert alert-danger">
        {if count($montonio_errors) == 1}
            {$montonio_errors[0]}
        {else}
            <ul>
                {foreach from=$montonio_errors item=error}
                    <li>{$error}</li>
                {/foreach}
            </ul>
        {/if}
    </div>
{/if}