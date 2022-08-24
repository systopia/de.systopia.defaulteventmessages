{*-------------------------------------------------------+
| SYSTOPIA Defaulteventmessages Extension                |
| Copyright (C) 2022 SYSTOPIA                            |
| Author: P. Batroff (batroff@systopia.de)               |
+--------------------------------------------------------+
| This program is released as free software under the    |
| Affero GPL license. You can redistribute it and/or     |
| modify it under the terms of this license which you    |
| can read by viewing the included agpl.txt or online    |
| at www.gnu.org/licenses/agpl.html. Removal of this     |
| copyright header is strictly prohibited without        |
| written permission from the original author(s).        |
+-------------------------------------------------------*}

<div class="crm-submit-buttons">
    {include file="CRM/common/formButtons.tpl" location="top"}
</div>

<br/><h3>{ts domain='de.systopia.defaulteventmessages'}Default Event Messages Configuration{/ts}</h3><br/>

<div class="crm-section defaulteventmessages defaulteventmessages">
  <div class="crm-section">
    <div class="label">{$form.defaulteventmessages_activated.label}<a onclick='CRM.help("{ts domain='de.systopia.defaulteventmessages'}Is active{/ts}", {literal}{"id":"id-defaulteventmessages-activated","file":"CRM\/Defaulteventmessages\/Form\/Settings"}{/literal}); return false;' href="#" title="{ts domain='de.systopia.defaulteventmessages'}Help{/ts}" class="helpicon"></a></div>
    <div class="content">{$form.defaulteventmessages_activated.html}</div>
    <div class="clear"></div>
  </div>

  <div class="crm-section">
    <div class="label">{$form.defaulteventmessages_event_template.label}<a onclick='CRM.help("{ts domain='de.systopia.defaulteventmessages'}Default Event Template{/ts}", {literal}{"id":"id-defaulteventmessages-template","file":"CRM\/Defaulteventmessages\/Form\/Settings"}{/literal}); return false;' href="#" title="{ts domain='de.systopia.defaulteventmessages'}Help{/ts}" class="helpicon"></a></div>
    <div class="content">{$form.defaulteventmessages_event_template.html}</div>
    <div class="clear"></div>
  </div>
</div>


<div class="crm-submit-buttons">
    {include file="CRM/common/formButtons.tpl" location="top"}
</div>
