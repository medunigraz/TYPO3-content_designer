.. include:: ../Includes.txt


ChangeLog
=========

.. t3-field-list-table::
 :header-rows: 1

 - :Version:
      Version
   :Date:
      Release Date
   :Changes:
      Release Description

 - :Version:
      3.0.2 - 3.0.6
   :Date:
      2016-04-01
   :Changes:
     * Fix documentation rendering

 - :Version:
      3.0.1
   :Date:
      2016-02-19
   :Changes:
     * Deprecated static call of non staic function.
     * Install Tool “Extension check” failed
     * Loading JavaScript (require.js etc.) for context menu and many other Backend functions crashed.

 - :Version:
      3.0.0
   :Date:
      2016-02-19
   :Changes:
     * Refactored and cleaned code. Compatible with TYPO3 7.x.
     * Most of the code is rewritten.
     * Removed the drag & drop deny functionality. That will be come in a new ext maybe.
     * Now you can extend any CType too.Whats next?- Documentation will be rewritten in ReST (Sphinx)
     * Trying to extend/create Content Elements with real Database Fields (not Flexforms).

 - :Version:
      2.7.1
   :Date:
      -
   :Changes:
      * Bugfixes and last version for TYPO3 6.xBrand new Version with new features coming soon.

 - :Version:
      2.7.0
   :Date:
      -
   :Changes:
      Performance optimization for the Backend.Suggestion #67939: Backend performance issues

 - :Version:
      2.6.1
   :Date:
      -
   :Changes:
      Bugfix #66438: Warnings in PHP 5.6 about non-static methods called statically

 - :Version:
      2.6.0
   :Date:
      -
   :Changes:
      * Added a new Element for including external PHP Scripts
      * Changed the default TCA. Now automaticly copied from the header Ctype. See manual for change this.

 - :Version:
      2.5.0
   :Date:
      -
   :Changes:
      * Bugfixes: #61088, #61054
      * Feature: Better integration in the backend. Now your elements can be controlled by the usergroup configuration field explicit allow/deny. See manual for more details and examples.
      * Updated manual
      * Cleaned the changelog list

 - :Version:
      2.4.1
   :Date:
      -
   :Changes:
      Bugfix (#60447) and removed obsolete Attributes in GoogleMaps iframe example

 - :Version:
      2.4.0
   :Date:
      -
   :Changes:
      Fixed bug with the condition userFunc

 - :Version:
      2.3.9
   :Date:
      -
   :Changes:
      Bugfix release:

      * #59196 Page properties sheet was still visible if nothing is set.
      * #59125 Disabling of Drag & Drop since 6.2
      * #58965 Copy defaults content elements fail as a non-admin User

 - :Version:
      2.3.8
   :Date:
      -
   :Changes:
      Small TCA Bugfix

 - :Version:
      2.3.7
   :Date:
      -
   :Changes:
      Bugfixes & Features

      * Fixed usability with gridelements
      * Fixed missing sys_category field since 6.2.1
      * Feature: moved TCA field definition to Typoscript tt_content.YOUR_CE.settings.tca (see manual)

 - :Version:
      2.3.6
   :Date:
      -
   :Changes:
      Updated the manual

 - :Version:
      1.0.0 – 2.3.5
   :Date:
      -
   :Changes:
      Initial release, features, bugfixes