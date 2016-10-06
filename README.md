Victoire DCMS CKEditor Bundle
============

##What is the purpose of this bundle

This bundle gives you access to the *Rich Text Widget*.
With this widget, you can integrates any text and format it with CK editor, a rich text editor.

##Set Up Victoire

If you haven't already, you can follow the steps to set up Victoire *[here](https://github.com/Victoire/victoire/blob/master/setup.md)*

##Install the Bundle

Run the following composer command :

    php composer.phar require friendsofvictoire/ckeditor-widget

###Reminder

Do not forget to add the bundle in your AppKernel !

    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                ...
                new Victoire\Widget\CKEditorBundle\VictoireWidgetCKEditorBundle(),
            );

            return $bundles;
        }
    }

## Front dependencies

### CKEditor

CKEditor is loaded by ivory/ckeditor-bundle