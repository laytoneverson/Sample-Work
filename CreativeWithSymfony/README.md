# Creative With Symfony

#### About The Project

This project had the ultimate goal of being able to quickly create and deploy the same website 
with a different design as quickly as possible. I created an application that allowed all the 
content to be configured in Yaml files.
 
A designer was able to define pages, what order they went in, and define content to be placed in
the templates. Just by writing blocks of Yaml markup.  Most of the configuration never changed 
between sites never has to change.

## The Demonstration

The way this application works is very unconventional in regards to your typical MVC design 
pattern ). I don't let the framework or convention dictate my application design. I go for 
simple and efficient... and I like to have fun. 

> I have removed a great deal of the code and code files to keep focus on my show case.

1. Take a quick look at the [Service Manager Config](app/config/application/services.yml) 

    These two files will provide a quick insight of how I organize business logic into a service 
    layer and keep it away from my controllers. 
    
1. Site content is configured in Yaml files and the application's code is never changed.

  * [Product Config](app/config/offer/products.yml) - Configure the products being sold on the site.
  * [Site Pages](app/config/offer/site-pages.yml) - Configure page order, how to handle the the page
      when the user proceeds, what tracking pixels are available in the template, what forms are 
      available in the template, and even the pages url.
  * [Browse the Folder](app/config/offer/) - to see configuration for processing orders, overriding 
      content for split testing content, tracking pixel values, etc. 
  * [This Controller](src/AppBundle/Controller/DefaultController.php) - These are a couple of the 
      handler functions. Controllers are always a few lines of code. Logic is handled by services.
  * [Leverage My Config](src/AppBundle/EventListener/SitePagesListener.php) - Early in the request 
      life cycle I slip in and build a [Strongly Typed Object](src/AppBundle/Model/SitePageModel.php) 
      to represent my configuration. I pass it to my controller in an extended 
      [SymfonyRequestObject](src/AppBundle/HttpFoundation/OfferPageRequest.php).
  * [Handle Routing](src/AppBundle/Routing/SitePagesLoader.php) - I use this class to pull routing
      from the site pages config and provide the application with the configured route. 
  * [SitePagesService](src/AppBundle/Services/SitePagesService.php) - This is where I build next page's
      data model. When the SitePageModel is handed to the controller in the Request object it has 
      everything ready to go. The controller actions (which never change) have what they need to 
      redirect or process and order. 
  * [Site Forms](src/AppBundle/Form) - I left these in here just to provide some insight into how I 
      might structure a set of objects that are used often in many ways.
