# Offer Page Base

A base application for product offer pages. The object of this project is to 
allow a person to take a design and turn it into a completely ready to go product
product offer page within a day or two. 

The application heavily relies on configuration files. The sites text, product 
information, etc. comes from the YAML based configuration. 

The application is written to be scaled and decoupled. For example, any payment
system integration or storage layer can be implemented without changing the core
application. (The payment system or storage layer is simply configured and works.)

Construction of this project has start with the concept of a SASS in the future, 
which adds more motivation to build every component decoupled from the next. 

## Configuration Reference

* Configure sales funnel pages

    Configure what pages are included, where the users go next, where
    the user goes if they bounce, what pixels to show, and what forms
    to display on the page. This gives you full control of the sale funnel.

* Configure tracking pixels

    Configure tracking pixels and the variables used when they are fired.
    Variable values are configured with sales funnel pages.  

* Configure Products

    Configure products, their prices, and associated integration info.  

* Configure text

    Set site text values like support email, site name, etc.  

* Configure offer settings

    Control how the offer works. This is where you determine what page
    to start on, where orders should processed, etc.  
    
* Configure version overrides

    Override configuration variables for split testing.


## Implementing Page Designs

This is a stub where we explain how to include forms on html pages. 
