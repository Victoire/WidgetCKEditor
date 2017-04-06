@mink:selenium2 @alice(Page) @reset-schema
Feature: Manage a Rich text widget

    Background:
        Given I am on homepage

    Scenario: I can create a new Rich text widget
        When I switch to "layout" mode
        Then I should see "New content"
        When I select "Rich text" from the "1" select of "main_content" slot
        Then I should see "Widget (Rich text)"
        And I should see "1" quantum
        When I fill in wysiwyg "a_static_widget_ck_editor_content" with "<p>My Widget Rich text content</p>"
        And I submit the widget
        Then I should see the success message for Widget edit
        When I reload the page
        Then I should see "My Widget Rich text content"
        And I should not see "<p>My Widget Rich text content</p>"

    Scenario: I can update a Rich text widget
        Given the following WidgetMap:
            | view | action | slot         |
            | home | create | main_content |
        And the following WidgetCKEditor:
            | widgetMap | content                         |
            | home      | <p>Widget Rich text to edit</p> |
        When I reload the page
        Then I should see "Widget Rich text to edit"
        And I should not see "<p>Widget Rich text to edit</p>"
        When I switch to "edit" mode
        And I edit the "CKEditor" widget
        And I should see "1" quantum
        When I fill in wysiwyg "a_static_widget_ck_editor_content" with "<p>Widget Rich text modified</p>"
        And I submit the widget
        Then I should see the success message for Widget edit
        When I reload the page
        Then I should see "Widget Rich text modified"
        And I should not see "<p>Widget Rich text modified</p>"

    Scenario: I can use Wysiwyg functions like bold and italic
        When I switch to "layout" mode
        Then I should see "New content"
        When I select "Rich text" from the "1" select of "main_content" slot
        Then I should see "Widget (Rich text)"
        When I fill in wysiwyg "a_static_widget_ck_editor_content" with "My Widget Rich text content"
        And I select all wysiwyg "a_static_widget_ck_editor_content" content
        And I press wysiwyg "Bold" button
        And I submit the widget
        Then I should see the success message for Widget edit
        When I reload the page
        Then I should see "My Widget Rich text content"
        And I should not see "<strong>My Widget Rich text content/strong>"
        And I should find an "strong" element containing "My Widget Rich text content"
        When I switch to "edit" mode
        And I edit the "CKEditor" widget
        Then I should see "Widget #1 (Rich text)"
        And I select all wysiwyg "a_static_widget_ck_editor_content" content
        And I press wysiwyg "Bold" button
        And I press wysiwyg "Italic" button
        And I submit the widget
        Then I should see the success message for Widget edit
        When I reload the page
        Then I should see "My Widget Rich text content"
        And I should not see "<em>My Widget Rich text content/em>"
        And I should find an "em" element containing "My Widget Rich text content"