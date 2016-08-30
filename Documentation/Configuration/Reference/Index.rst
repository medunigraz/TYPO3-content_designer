.. include:: ../../Includes.txt


Reference
==========

TypoScript Setup
----------------

settings.cObject
""""""""""""""""
.. container:: table-row

    Property
        settings.cObject
    Data type
        array
    Description
        Definition of the Backend Layout

settings.cObjectFlexFile
""""""""""""""""""""""""
.. container:: table-row

    Property
        settings.cObjectFlexFile
    Data type
        string
    Description
        Path to a FlexForm XML file, alternative to the cObject definition.

settings.renderMethod
"""""""""""""""""""""
.. container:: table-row

    Property
        settings.renderMethod
    Data type
        string
    Description
        By default it renders the cObject but if you set it to “flexFormFile” the “cObjectFlexFile” will be used
    Default
        flexForm

settings.title
""""""""""""""
.. container:: table-row

    Property
        settings.title
    Data type
        string
    Description
        Label of the content Element

settings.description
""""""""""""""""""""
.. container:: table-row

    Property
        settings.description
    Data type
        string
    Description
        Description of the CE for the wizard.

settings.previewObj
"""""""""""""""""""
.. container:: table-row

    Property
        settings.previewObj
    Data type
        stdWrap
    Description
        Could be anything what TypoScript can do. Renders the backend preview in the page module.

settings.renderObj
""""""""""""""""""
.. container:: table-row

    Property
        settings.renderObj
    Data type
        stdWrap
    Description
        Define here the frontend rendering of your content Element.

settings.icon
"""""""""""""
.. container:: table-row

    Property
        settings.icon
    Data type
        string
    Description
        Path to a icon Image (eq GIF) for the CE Wizard
    Default
        Ext default

settings.iconSmall
""""""""""""""""""
.. container:: table-row

    Property
        settings.iconSmall
    Data type
        string
    Description
        Path to a icon Image (eq GIF) the the Ctype Dropdown.
    Default
        Ext default

settings.disableDefaultDrawItem
"""""""""""""""""""""""""""""""
.. container:: table-row

    Property
        settings.disableDefaultDrawItem
    Data type
        boolean
    Description
        Whether to draw the item using the default functionalities
    Default
        0

settings.flexform
"""""""""""""""""
.. container:: table-row

    Property
        settings.flexform
    Data type
        Array
    Description
        This will be automaticly filled by the Extension with the Data from the settings.cObject or the values from the FlexFile (cObjectFlexFile) if your fields named like “settings.flexform.yourfield
    Default
        Ext. automatic

settings.cObject
""""""""""""""""
.. container:: table-row

    Property
        settings.cObject
    Data type
        Array
    Description
        Definition of the Backend Layout

settings.cObjectFlexFile
""""""""""""""""""""""""
.. container:: table-row

    Property
        settings.cObjectFlexFile
    Data type
        string
    Description
        Path to a FlexForm XML file, alternative to the cObject definition.

settings.altLabelField
""""""""""""""""""""""
.. container:: table-row

    Property
        settings.altLabelField
    Data type
        string
    Description
        Overwrite the TCA Label in the List Module with static value. Useful if you're not using the tt_content header Field.Feature needed to be enabled in extManager extConf!

settings.altLabelField.userFunc
"""""""""""""""""""""""""""""""
.. container:: table-row

    Property
        settings.altLabelField.userFunc
    Data type
        string
    Description
        Like above but uses a userFunction to generate the title. Example of a user function included in the Extension Folder (Resources / Private / LabelUserFunc / user_labelexample.class.php
        See it in action with the gallery example (enable feature in extMgr and go to list module to a page which has the gallery element on it)
        Call it like this:altLabelField.userFunc = EXT:content_designer/Resou rces/Private/LabelUserFunc/user_labelexample.class.php:user_labelexa mple->getUserLabelFeature needed to be enabled in extManager extConf!

settings.tca
""""""""""""
.. container:: table-row

    Property
        settings.tca
    Data type
        string
    Description
        The default TCA Layout for the Content Element. Since 2.6.0 it's empty and then the setting tcaFromType will be used. If you put something into this (like TS default commented code) this is used

settings.tcaFromType
""""""""""""""""""""
.. container:: table-row

    Property
        settings.tcaFromType
    Data type
        string
    Description
        Copies the default TCA from another Ctype and appends the pi_flexform field. By default it copies from the Header CType
    Default
        header

settings.tcaFromTypePosition
""""""""""""""""""""""""""""
.. container:: table-row

    Property
        settings.tcaFromTypePosition
    Data type
        string
    Description
        Where should be the pi_flexform TCA field placed
    Default
        after:header



[tsref:tt_content.tx_contentdesigner_YOURELKEY]
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

if you want to extend the page properties use the following:

::

    pages.tx_contentdesigner_flexform

Example
-------

Some examples on usage:

.. code-block:: javascript
    :linenos:

    #
    ## Simple usage Example
    #
    tt_content.tx_contentdesigner_testElement < plugin.tx_contentdesigner
    tt_content.tx_contentdesigner_testElement.settings {
        # Element Title
        title = Test
        description = Sample Element of Plugin content designer

        # Flexform Field Definitions
        cObject {
          # Define a Sheet
          sTEMP {
            sheetTitle = Dateneingabe

            # Add Sheet Elements
            el {
              # Define a field just with flexform configuration
              text {
                label = Titel
                config.type = text
              }

              selectedVal {
                label = Select a value (select example)

                config {
                  type = select
                  items {
                    0.0 = Value A
                    0.1 = A

                    1.0 = Value B
                    1.1 = B
                  }
                }
              }

              # Any fieldname will be preset with the string tsc_ (so object will be tsc_object in renderObj)
              object {
                label = Select a Page
                config {
                  type          = group
                  internal_type = db
                  allowed       = pages
                  size          = 1
                  maxitems      = 1
                  minitems      = 0
                  show_thumbs   = 0
                }
              }
            }
          }

        }

        # Frontend Rendering
        renderObj {
          20       = TEXT
          20.field = text
          20.wrap  = <strong>|</strong><br>

          30 = CASE
          30 {
             key.field = selectedVal

             A = TEXT
             A.value = A
             A.wrap = You've selected <strong>value |</strong><br>

             B < .A
             B.value = B
          }

          40 = RECORDS
          40 {
             source.field = object
             tables = pages
             dontCheckPid = 1
             conf.pages = TEXT
             conf.pages.field = title
             conf.pages.wrap = <span style="background-color: yellow;">|</span>
          }
       }

       previewObj = COA
       previewObj {
         10 = TEXT
         10.field = text
         10.wrap = <p>|</p>
       }
    }
    #
    ## Example how to load a FlexForm File
    #
    tt_content.tx_contentdesigner_flexTest < plugin.tx_contentdesigner
    tt_content.tx_contentdesigner_flexTest.settings {
        # Element Title
        title = FlexTest
        description = Test flexform file include experience

        # Flexform Field Definitions
       renderMethod    = flexFormFile
       cObjectFlexFile = EXT:content_designer/Configuration/FlexForms/testfile.xml

        # Frontend Rendering
        renderObj.20       = TEXT
        renderObj.20.field = test
        renderObj.20.wrap  = Your Selection: <strong>|</strong>

        previewObj = COA
        previewObj {
          10 = TEXT
          10.field = test
          10.wrap = <p>|</p>
        }
    }
    #
    ## Example how to make a another plugin to a ctype
    #
    #tt_content.tx_contentdesigner_youtube < plugin.tx_jhsimpleyoutube
    #tt_content.tx_contentdesigner_youtube = USER
    #tt_content.tx_contentdesigner_youtube {
    #  userFunc      = TYPO3\CMS\Extbase\Core\Bootstrap->run
    #
    #  pluginName    = Pi1
    #  extensionName = JhSimpleYoutube
    #  controller    = VideoRenderer
    #  vendorName    = TYPO3
    #
    #  settings {
    #    title       = YouTube
    #    description = Video integration
    #
    #    icon      = ../typo3conf/ext/content_designer/Resources/Public/MediaElementJS/ce_wiz.gif
    #
    #    cObjectFlexFile = EXT:jh_simple_youtube/Configuration/FlexForms/contentPlugin.xml
    #  }
    #}
    /*
    # Example to get Flexform data from another plugin
    tt_content.tx_contentdesigner_myTest < plugin.tx_contentdesigner
    tt_content.tx_contentdesigner_myTest.settings {
       # Element Title
       title = MyTest
       description = cObjectFromPlugin Test

       # Flexform Field Definitions
       cObjectFromPlugin = icalimporter_list
    }
    */

    pages.tx_contentdesigner_flexform.settings {
       #cObjectFlexFile = EXT:content_designer/Configuration/FlexForms/MediaElementJS.xml
       cObject.sDEF {
          sheetTitle = Dateneingabe

          el.text {
             label = Titel
             config.type = text
          }
       }
    }
    tt_content.tx_contentdesigner_pages < plugin.tx_contentdesigner
    tt_content.tx_contentdesigner_pages.settings {
       title = Page Properties
       description = Example of the new page properties feature... just output

       cObject {
       }

       renderObj >
       renderObj = TEXT
       renderObj {
          data = page:text
          br   = 1
          wrap = <p><strong>Pages Text:</strong><br>|</p>
       }
    }
    /*
    page.config.disableAllHeaderCode = 1
    page.10 >
    page.10 = TEXT
    page.10.field = text
    page.10.br = 1
    */
    # Example to extend tt_content CType TEXT & MEDIA
    module.tx_contentdesigner.extendCType {
       textmedia {
          sDEF {
             sheetTitle = Test
             el.myfield {
                label = Mein Feld
                config.type = input
             }
          }
       }
    }


Hints and Tipps
---------------

- For tricks take also a look into the typoscript examples.
- In some cases your content element idea is to complex to make it with typoscript. So make a flexForm XML and include it alternatively with cObjectFlexFile = yourflexfile.xmlrenderMethod = flexFormFile


Page TSconfig
-------------

With the Tsconfig you change the visibility, title, or else of the Content Elements. You can disable this function in the Extension Configuration in Ext. Manager. In this case the elements will be added by a Typo3 Hook.

::

    mod.wizards.newContentElement.wizardItems.cd.header = LLL:EXT:content_designer/Resources/Private/Language/locallang_be.xml:wizard.sheetTitle

Here is an example on how to remove a Content Element (maybe for a BE user group or else):

::

    mod.wizards.newContentElement.wizardItems.cd.show := removeFromList(tx_contentdesigner_googleStaticImage)
    TCEFORM.tt_content.CType.removeItems := addToList(tx_contentdesigner_googleStaticImage)

Here's an example to controll the typo3 normal fields like header or header_link and so on:

::

    TCEFORM.header.type.tx_contentdesigner_YOURELEMENTKEY.disabled = 1
    TCEFORM.header_link.type.tx_contentdesigner_YOURELEMENTKEY.disabled = 1

