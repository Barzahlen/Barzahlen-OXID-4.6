[{include file="headitem.tpl" title="BARZAHLEN__CONFIG_TITLE"|oxmultilangassign box=" "}]

<h1>[{oxmultilang ident="BARZAHLEN__CONFIG_TITLE"}]</h1>

<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
  <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
  <input type="hidden" name="fnc" value="save">
  [{$oViewConf->getHiddenSid()}]

  <table cellspacing="0" cellpadding="0" border="0" style="width:100%;height:100%;">

    <tr>
      <td valign="top" class="edittext" width="250" nowrap="">[{ oxmultilang ident="BARZAHLEN__SANDBOX" }]</td>
      <td valign="top" class="edittext">
        <input type="hidden" name="barzahlen_config[sandbox]" value="0" />
        <input type="checkbox"
               class="editinput"
               name="barzahlen_config[sandbox]"
               value="1"
               [{if $barzahlen_config.sandbox}]checked="checked"[{/if}] />
               [{ oxinputhelp ident="BARZAHLEN__SANDBOX_DESC" }]
      </td>
    </tr>

    <tr>
      <td valign="top" class="edittext" width="250" nowrap="">[{ oxmultilang ident="BARZAHLEN__SHOPID" }]</td>
      <td valign="top" class="edittext">
        <input type="text" class="editinput" name="barzahlen_config[shopId]" value="[{$barzahlen_config.shopId}]" size="50"/>
        [{ oxinputhelp ident="BARZAHLEN__SHOPID_DESC" }]
      </td>
    </tr>
    <tr>
      <td valign="top" class="edittext" width="250" nowrap="">[{ oxmultilang ident="BARZAHLEN__PAYMENTKEY" }]</td>
      <td valign="top" class="edittext">
        <input type="text" class="editinput" name="barzahlen_config[paymentKey]" value="[{$barzahlen_config.paymentKey}]" size="50"/>
        [{ oxinputhelp ident="BARZAHLEN__PAYMENTKEY_DESC" }]
      </td>
    </tr>
    <tr>
      <td valign="top" class="edittext" width="250" nowrap="">[{ oxmultilang ident="BARZAHLEN__NOTIFICATIONKEY" }]</td>
      <td valign="top" class="edittext">
        <input type="text" class="editinput" name="barzahlen_config[notificationKey]" value="[{$barzahlen_config.notificationKey}]" size="50"/>
        [{ oxinputhelp ident="BARZAHLEN__NOTIFICATIONKEY_DESC" }]
      </td>
    </tr>

    <tr>
      <td valign="top" class="edittext" width="250" nowrap="">[{ oxmultilang ident="BARZAHLEN__DEBUG" }]</td>
      <td valign="top" class="edittext">
        <input type="hidden" name="barzahlen_config[debug]" value="0" />
        <input type="checkbox"
               class="editinput"
               name="barzahlen_config[debug]"
               value="1"
               [{if $barzahlen_config.debug}]checked="checked"[{/if}] />
               [{ oxinputhelp ident="BARZAHLEN__DEBUG_DESC" }]
      </td>
    </tr>

    <tr>
      <td>
        <input type="submit" class="edittext" name="save" value="[{ oxmultilang ident='GENERAL_SAVE' }]">
      </td>
    </tr>

  </table>
</form>

[{if ($info)}]
  <br><div class="[{$info.class}]">[{oxmultilang ident=$info.message}]</div><br>
[{/if}]