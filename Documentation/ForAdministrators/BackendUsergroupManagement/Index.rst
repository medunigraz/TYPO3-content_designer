.. include:: ../Includes.txt


Backend usergroup management
============================

In the Backend Usergroup settings, you can set the allowed Content Elements like others (explicit allow/deny field.

Don't forget to allow the usergroup you're new content elements if you have explicitAllow set in the install tool config “explicitADmode”.

If you have not set new content elements in the ROOT TypoScript Template, it could be that your elements not visible in the explicit allow/deny field list.
In this case you can manually add them by setting the following typoscript setup in your root template:

::
    module.tx_contentdesigner.manualExplicitAllowDeny {
      # Example to manually add contentdesigner keys to the
      # BE Group explicit allow/deny field list.
      # This is usefull if you're not defining your CD Elements
      # in the ROOT TypoScript Template and
      # in the BE Group configuration they aren't visible

      tx_contentdesigner_YOURELEMENTKEY = Your Title in the explicit AD Fieldlist
    }