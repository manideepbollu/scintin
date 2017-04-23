SCINTIN - ERP + SCHOOL NETWORK PROJECT
===================================

SCINTIN is an ERP + School Network project. The aim of this project is to create a 4th generation Enterprise resource planner which can address all the issues involved in administering a school/college. Being a next generation ERP, it doesn’t stop with financial and administrative functions but also extends up to school network and integrates all the academic, administrative and social functions into one big application and we tentatively named it SCINTIN. Considering the scope and functionality of this application, SCINTIN can be recognized as an abbreviation for “School College Institutional NeTwork INtegrator”. 


DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
tests                    contains various tests for the advanced application
    codeception/         contains tests developed with Codeception PHP Testing Framework
```


REQUIREMENTS
------------

The minimum requirement by this application template that your Web server supports PHP 5.4.0.


BRIEF INTRODUCTION
------------------

SCINTIN is an inspiration from Fedena, a popular all-in-one software for school and colleges. Though it has a solid ERP structure to hold administrative and finance data of an institution, it lacks flexibility and customization. It provides a very basic school network functionality and poor GUI due to which users (Students, teachers and parents) may not be able to use it as a part of their everyday business.

Considering many such aspects, we have decided to build a solid ERP which is customizable as per the school needs and a feature rich school network which enables students, employees and parents to connect to the school effortlessly. Being a comprehensive School/College software, it handles various aspects of school administration. below is the list of identified core categories which feature in SCINTIN. 
Finances (fee, payslips, definition of cost centres etc.)
Academics (courses, batches, exams, results, research, assignments etc.)
Library (books, transactions, fines, library fee, etc.)
School (school data, stats, achievements, hall of fame etc.) 
Social (news, people, chatting, group discussions, media sharing etc.)
Sports (teams, coaches, squads, resources, fitness schedules etc.) 
Hostel (types of rooms, subscriptions, remarks, food etc.)
Transport (routes, bus stops, drivers, vehicles etc.)

![alt tag](https://s22.postimg.org/ns9gsp6lt/Screen_Shot_2017-04-23_at_01.09.42.png)


TECHNICAL DETAILS
-----------------

This project is being developed right from scratch. PHP and Javascript are the two major languages which are being used while developing this application. This application is based on bootstrap and Yii Framework 2.0. Yii Framework is one of the best frameworks which supports ORM (Object Relational Mapping), AJAX-enabled widgets, Web services, Internationalization (Multilingual software) and many more such 4th generation concepts. SCINTIN follows a traditional MVC architecture which makes it easy for customization and scalability. 

Many cutting-edge APIs and plug-ins are being integrated to make sure that this application is highly advanced and provides the best GUI experience by the time it is released. Few APIs such as Google Maps (transport), Google Calendars (events, exams and assignments) and Google Drive (file/media sharing) would take this application to next level.

This application supports both Oracle and MySQL as its database which gives more options for the school which implements SCINTIN. Ideally, SCINTIN has to be hosted on AWS - Amazon Web services.


SECURITY
--------

Since this entire application is being hosted on cloud and can be accessed through web browsers and APIs, security is being considered as the most important aspect of the entire project. Our security architecture is based on Yii 2.0 framework and RBAC concepts. Security measures include cross-site scripting (XSS) prevention, cross-site request forgery (CSRF) prevention, cookie tampering prevention, etc. SCINTIN users are ideally mapped to their google accounts in order to enjoy access to all features (few features are powered by Google Apps).



FUNCTIONAL OVERVIEW
-------------------

A student, Andy joins a school which implements SCINTIN and receives a SCINTIN ID from the admissions department. This ID will be his companion throughout his stay in the school. Andy will be able to subscribe to school transportation, schedule/change the routes using real-time Google Maps API where he can drag and drop his own points or choose from the available markers, pay various fees, receive assignment alerts, view exam timetables, schedule/manage events which are integrated to his Google Calendars, store/share files with his teachers or friends (which is again powered with Google Drive), apply for a position in the school sports team, track his library transactions and many such things just by logging onto SCINTIN. In the same way, teachers can do multiple tasks such as uploading/generating attendance reports, give assignments to a class or a section or a set of particular students online (corresponding alerts will be delivered to the students).


SAMPLE SCREENS
--------------

![alt tag](https://s4.postimg.org/9y1287jnh/Screen_Shot_2017-04-23_at_01.14.33.png)
![alt tag](https://s12.postimg.org/nf887y48d/Screen_Shot_2017-04-23_at_01.14.41.png)
![alt tag](https://s9.postimg.org/57ljicj4f/Screen_Shot_2017-04-23_at_01.14.52.png)

SETUP (YII 2.0 FRAMEWORK)
-------------------------

After you install the application, you have to conduct the following steps to initialize
the installed application. You only need to do these once for all.

1. Run command `init` to initialize the application with a specific environment.
2. Create a new database and adjust the `components['db']` configuration in `common/config/main-local.php` accordingly.
3. Apply migrations with console command `yii migrate`. This will create tables needed for the application to work.
4. Set document roots of your Web server:

- for frontend `/path/to/yii-application/frontend/web/` and using the URL `http://frontend/`
- for backend `/path/to/yii-application/backend/web/` and using the URL `http://backend/`

To login into the application, you need to first sign up, with any of your email address, username and password.
Then, you can login into the application with same email address and password at any time.


AUTHORS
-------

**Manideep Bollu**

+ https://github.com/manideepbollu
+ http://manideepbollu.com

**Kalyan Venkat (Not a Github fan)**

+ https://bitbucket.org/kalyan21
