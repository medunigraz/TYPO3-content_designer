.. include:: ../../Includes.txt


How to create new content Elements
==================================

First of all, include the Default static Template with the Template module.
The following example is just a very quick tutorial. It's recommended to take a look at the static Template examples to see and learn how this works.
All definitions are set with the TypoScript SETUP.

Define the new Content Element
""""""""""""""""""""""""""""""

First step is to set a unique internal key / name for the Content Element. All new Elements start with the same prefix, so the Extensions could detect them and we take the default setup of the Default static template.

::

    tt_content.tx_contentdesigner_yourContentElementKey < plugin.tx_contentdesigner

Set the Title and Description for the Wizard and CType
""""""""""""""""""""""""""""""""""""""""""""""""""""""

After that we start defining and creating the Element for the Backend:

::

    tt_content.tx_contentdesigner_myExampleCE.settings {
    title = New Example CE
    description = A nice Description for the Wizard
    # ...see next step to go on...

Setting up the fields for the Backend
"""""""""""""""""""""""""""""""""""""

Let's define the fields for the backend. We do it like in a FlexForm XML file but a little bit simpler and in TypoScript style. In this example i'll adding a input field and a selection field for selecting a page of your typo3 site.

::

    cObject {
      # This is the sheet Key like in a FlexForm File
      sDEF {
        # The Label for the Sheet
        sheetTitle = General

        # Adding the elements
        el {
          myinput {
            label = My Input
            config.type = input
          }

          thepage {
            label = Select a page
            config {
              type = group
              internal_type = db
              allowed = pages
              size = 1
              maxitems = 1
              minitems = 0
            }
          }
        }
      }
    }

Create the preview in the page Wizard
"""""""""""""""""""""""""""""""""""""

By Typo3 default content Elements you can see on the selected Page all content Elements in his normal order with the preview of some of their fields. Like on the text and pic Element you can see the Text and a thumb ob the pictures. We can do this too.

::

    # By default the preview object is set in the default
    # static template and uses a COA (cObject) TypoScript with the first
    # array (10.) to show the default header. In this example we overwrite it.
    previewObj = COA
     previewObj {
        10 = TEXT
        10.field = myinput

        20 = RECORDS
        20 {
          source.field = thepage
          tables = pages
          dontCheckPid = 1
          conf.pages = TEXT
          conf.pages.field = title
          conf.pages.noTrimWrap = |Your selected page: ||
        }
    }

Rendering in the frontend
"""""""""""""""""""""""""

Now we need to setup the frontend rendering of our new content Element as follows:

::

    # You could define anything you want here (like FLUIDTEMPLATE or something else)
    renderObj = COA
    renderObj {
      10 = TEXT
      10.field = myinput
      10.wrap = <strong>|</strong>

      20 = RECORDS
      20 {
        source.field = thepage
        tables = pages
        dontCheckPid = 1
        conf.pages = TEXT
        conf.pages.field = title
        conf.pages.noTrimWrap = |Your selected page: ||
      }
    }

Done
""""

Thats all... you've created a new content Element. If you like to use a complex Flexform and not the cObject Definition as above use just thie followed line instead of

::

    cObject {  …   }
    cObjectFlexFile = path/to/your/flexform.xml

