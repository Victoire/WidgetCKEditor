<?php

namespace Victoire\Widget\TitleBundle\Tests\Context;

use Knp\FriendlyContexts\Context\RawMinkContext;

class WidgetContext extends RawMinkContext
{
    /**
     * @Then /^I fill in wysiwyg "(.+)" with "(.+)"$/
     */
    public function iFillInWysiwygWith($ckeditorInstance, $text)
    {
        $js = 'CKEDITOR.instances["'.$ckeditorInstance.'"].setData("'.$text.'");';
        $this->getSession()->executeScript($js);
    }

    /**
     * @Then /^I select all wysiwyg "(.+)" content$/
     */
    public function iSelectAllWysiwygContent($ckeditorInstance)
    {
        $js = 'CKEDITOR.instances["'.$ckeditorInstance.'"].execCommand(\'selectAll\')';
        $this->getSession()->executeScript($js);
    }

    /**
     * @When /^I press wysiwyg "(.+)" button$/
     */
    public function iPressWysiwygButton($button)
    {
        $page = $this->getSession()->getPage();

        $button = $page->find('xpath', sprintf(
            'descendant-or-self::a[contains(@class, "cke_button cke_button__%s")]',
            strtolower($button)
        ));
        if (null === $button) {
            $message = sprintf(
                'Wysiwyg button "%s" not found.',
                $button
            );
            throw new \Behat\Mink\Exception\ResponseTextException($message, $this->getSession());
        }
        $button->click();
    }

    /**
     * @When /^I should find an "(.+)" element containing "(.+)"$/
     */
    public function iShouldFindAnElementContaining($element, $text)
    {
        $page = $this->getSession()->getPage();

        $title = $page->find('xpath', sprintf(
            'descendant-or-self::%s[normalize-space(.) = "%s"]',
            $element,
            $text
        ));
        if (null === $title) {
            $message = sprintf(
                '"%s" with text "%s" was not found.',
                $element,
                $text
            );
            throw new \Behat\Mink\Exception\ResponseTextException($message, $this->getSession());
        }
    }
}
