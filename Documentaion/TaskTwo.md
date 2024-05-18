# Ahmad Ali Othman 3-3

# Unit 6 - Task Two

# Comprehensive Proposal and Development Documentation for Dern-Support

## Business Context and Summary of the Problem

### Overview of Dern-Support

Dern-Support is a small IT technical support company specializing in computer system repairs for businesses and individual customers. The company offers on-site support for business clients and provides repair services for individual clients who either drop off their computers at Dern-Support offices or arrange delivery through a courier service. As Dern-Support expands, it requires a software solution to streamline its operations and enhance service offerings.

### Summary of the Problem

Dern-Support currently faces challenges in managing customer accounts, support requests, repair scheduling, and providing efficient customer service. The existing manual processes are not scalable and hinder the company's ability to expand. A comprehensive software solution is needed to automate and integrate these functions, providing a better customer experience and operational efficiency.

## SDLC Of The Project

### Planning phase:

1. #### Define Objectives and Scope:

    - **Objective**: Develop a software solution to support Dern-Support's business operations, enabling efficient management of customer accounts, support requests, and enhancing service offerings.
    - **Scope**:
        - **Customer Account Management**: Implement a system to set up and manage individual customer accounts.
        - **Support Requests and Scheduling**: Develop features allowing customers to submit support requests and receive quotes for service costs.
        - **Knowledge Base**: Provide access to a knowledge base that helps diagnose problems and offers instructions for minor hardware and software fixes.
        - **Additional Functionality**:
            - Enable tracking of repair statuses for customers.
            - Offer integration with courier services for the delivery and pickup of individual customer computers.
        - **User Capacity**: Ensure the system can handle up to 100 simultaneous users[¹](#testing-phase), with scalability for future growth.
        - **Security and Privacy**: Incorporate robust security measures to protect customer data and ensure compliance with relevant data protection regulations.
        - **Reporting and Analytics**: Provide reporting tools for business insights and performance monitoring.

2. #### Requirements:
    - **Identify Technology Stack**: Select the appropriate technologies for developing the customer account management system, support request submission, and knowledge base features.
    - **Gather Resources**: Assess the skills and expertise of the development team, ensuring they have the necessary background in the selected technologies.
    - **Utilize Technologies**: Choose technologies that meet customer requirements and enhance the user experience, such as a robust backend framework, user-friendly frontend, and secure database solutions.
    - **Develop a Comprehensive Web Application**:
        - **Customer Accounts**: Implement registration and login functionality for individual customers.
        - **Support Requests and Scheduling**: Create modules for submitting support requests.
        - **Admin Dashboard**: Develop an admin interface with CRUD (Create, Read, Update, Delete) operations for managing customer accounts, support requests, services offered by the company, and service categories.
        - **Tracking**: Integrate features for tracking repair statuses.
    - **User Interface**:
        - **Customer Interface**: Design a user-friendly interface for customers to easily access the application’s features.
        - **Admin Interface**: Create an intuitive admin interface for managing the system efficiently.

### Analysis Phase:

1. #### Requirements Gathering:
    - Determine the service categories and specific services offered by Dern-Support.
    - Establish the maximum number of simultaneous service requests that can be managed per customer account.
    - Clarify how service charges are calculated for each service category based on the complexity and duration of the service.
    - Identify the data needed from customers and their devices to provide accurate support.
    - Discuss the nature of the technical support services, including on-site visits, courier services, and any remote support options.

The process of requirements gathering ensures that the software solution will meet the specific needs and challenges faced by the company in its daily operations and future expansion.

## Design Phase:

1.  ### System Architecture:

    -   The project will utilize the MVC (Model-View-Controller) architecture.
    -   The system will be divided into three layers:
        -   **Model:** Contains the database and application models.
        -   **View:** Contains the templates and views for the application.
        -   **Controller:** Contains the controllers for the application.
    -   Implemented a customer registration and login system with authentication and authorization.
    -   Designed pages for the users to:
        -   View all available services
        -   View individual service details
        -   View all services' categories
        -   Browse services by category
        -   Access and modify account details including (username, email, address, password) in addition for account deletion
    -   Designed an admin dashboard to manage services, services' categories, customer accounts, and support requests.
    -   Implemented CRUD operations for admins to control services, categories, support requests, and customer data.
    -   Created protected routes and access tokens to ensure the security of the application.
    -   Passwords are hashed to enhance security.

2.  ### Database Design:
    -   Designed a database for the application with the following tables:
        -   **Users:**
            -   id
            -   name
            -   email (unique)
            -   password (hashed)
            -   address
            -   created_at
            -   updated_at
        -   **Admins:**
            -   id
            -   email (unique)
            -   password (hashed)
            -   is_super_admin (boolean -> tinyint(1) in mysql) -> default is 0 (not a super admin)
            -   created_at
            -   updated_at
        -   **Services:**
            -   id
            -   name (unique)
            -   description (optional)
            -   price
            -   category_id (foreign key references categories table)
            -   created_at
            -   updated_at
        -   **Categories:**
            -   id
            -   name
            -   created_at
            -   updated_at
        -   **Requests:**
            -   id
            -   description
            -   status (enum: pending, completed, cancelled) -> default is 'pending'
            -   user_id (foreign key references user table)
            -   service_id (foreign key references services table)
            -   created_at
            -   updated_at
3.  ### User Interface (UI) Design:

    -   Designed a user-friendly interface for customers to access the application.
    -   Created a simple registration form for customers to register.
    -   Designed a login form for customers to log in to the application.
    -   Included validation checks on data with user-friendly error messages.
    -   Designed a page for customers to browse available services and submit support requests.
    -   Created a dashboard for customers to view the status and details of their support requests.
    -   Designed an intuitive interface for admins to manage the application.
    -   Designed a login form for admins to log in to the admin panel.
    -   Created a versatile admin dashboard to manage services, categories, support requests, and customer data.

    _Examples of the admin dashboard:_

    -   **admin dashboard welcome page:**
        ![](images/adminDashboard.png)

    -   **Requests:**

        -   View all Services:
            ![](images/allrequests.png)
        -   Add new request:
            ![](images/addRequest1.png)
            ![](images/addrequest2.png)
        -   Edit cancelled request (disabled):
            ![](images/editcancelledrequest.png)
        -   Edit completed request:
            ![](images/editcompletedrequest.png)
        -   Edit pending request (disabled):
            ![](images/editpendingrequest.png)
        -   Delete request (allowed for all):
            ![](images/deleterequest.png)
        -   Mass Delete requests:
            ![](images/massrequestdelete.png)

    -   **Services:**

        -   View all Services:
            ![](images/allServices.png)
        -   Add new Service:
            ![](images/addService.png)
        -   Edit Service:
            ![](images/editService.png)
        -   Delete Service:
            ![](images/deleteService.png)
            ![](images/deleteServiceNotify.png)
        -   Mass Delete Services:
            ![](images/MassDeleteSerivces.png)
            ![](images/MServiceC.png)

    -   **Categories:**

        -   View all Categories:
            ![](images/unsortedServices)
            ![](images/sortServices)
        -   Add new Category:
            ![](images/addCategory.png)
        -   Edit Category:
            ![](images/editCategory.png)
        -   Delete Category:
            ![](images/deleteCategory.png)
        -   Mass Delete Categories:
            ![](images/massDeleteCategories.png)

    -   **Users:**
        -   View all Users:
            ![](images/allUsers.png)
        -   Add new User:
            ![](images/addUser.png)
        -   Edit User:
            ![](images/editUser.png)
        -   Delete User:
            ![](images/deleteUser.png)
        -   Mass Delete Users:
            ![](images/selectVisibleUsers.png)
            ![](images/selectAllUsers.png)

    _Examples of admin login:_

    ![](images/adminlogin.png)

    _Examples of validation messages:_
    ![](images/adminloginvalidation.png)

    _Examples of customer login:_

    ![](images/userlogin.png)

    _Examples of user login validation messages:_

    ![](images/userloginvalidation.png)

    _Examples of customer registration:_

    ![](images/userregister1.png)
    ![](images/userregister2.png)

    _Examples of user login validation messages:_

    ![](images/userregistervalidation.png)

    _Examples of Landing page:_

    ![](images/landing1.png)
    ![](images/landing2.png)

    _Examples of the services page:_

    -   View all services:
        ![](images/services.png)
    -   View all services (no services available):
        ![](images/noservices.png)

    _Examples of the service details page:_

    ![](images/service.png)

    _Examples of the categories page:_

    -   View all categories:
        ![](images/categories.png)
    -   View all categories (no categories available):
        ![](images/nocategories.png)

    _Examples of the services by category page:_

    ![](images/category.png)

    _Examples of the user dashboard:_

    -   View all requests:
        ![](images/userdashboard1.png)
    -   View all requests (no requests made yet):
        ![](images/norequests.png)
    -   Restore cancelled requests:
        ![](images/userdashboard2.png)
    -   Delete cancelled request:
        ![](images/userdashboard3.png)
    -   Delete completed request:
        ![](images/userdashboard4.png)
    -   Edit existing (pending) request:
        ![](images/editrequest.png)

    _Examples of the user profile page:_

    -   Edit basic info:
        ![](images/editprofile.png)
    -   Change password (successful):
        ![](images/changepassword.png)
    -   Change password (incorrect password):
        ![](images/wrongpassword.png)
    -   Change password (passwords not matching):
        ![](images/nomatchpassword.png)
    -   delete account button:
        ![](images/deleteaccount1.png)
    -   delete account modal:
        ![](images/deleteaccount2.png)
    -   delete account modal (wrong password):
        ![](images/deleteaccount3.png)
    -   delete account modal (success redirected to the landing page):
        ![](images/landing1.png)

## Implementation Phase:

1. ### Coding:

#### I used the following technologies for the project:

-   HTML (Blade Template)
-   CSS (Tailwindcss)
-   JavaScript
-   PHP (Laravel Framework)
-   MySQL
-   Git
-   GitHub

#### I used the following libraries for the project:

-   #### Frontend technologies:

    -   Tailwindcss: A utility-first CSS framework for rapidly building custom user interfaces.
    -   Hero icons: Beautiful hand-crafted SVG icons, by the makers of Tailwind CSS.
    -   Laravel Livewire: A full-stack framework for Laravel that provides a simple, yet powerful way to build dynamic UIs.

-   #### Backend technologies:
    -   Filament: A collection of beautiful full-stack components. For designing the admin dashboard.
    -   Eloquent: An object-relational mapper (ORM) that makes it enjoyable to interact with your database.
    -   the Auth facade: A simple authentication API that provides a variety of common authentication tasks.

#### User Authentication:

-   I have implemented a secure user authentication system in Laravel, utilizing hashed passwords for user security.
-   I have utilized Laravel's built-in session-based authentication tokens to ensure secure user authentication.

#### User Authorization:

-   I have implemented middlewares to protect user and admin routes in the application.
-   I have implemented a middleware that ensures only authenticated users with the appropriate roles (user or admin) can access their respective routes.
    Unauthorized access attempts are redirected to the login page, thereby enhancing the security of the application.
-   I have implemented a middleware to check if the user is guest (has logged in or registered) or not.

## Testing Phase:

-   Performed integration tests for backend components, including routes, controllers, and database interactions
-   Ensured proper integration of Laravel Livewire components with backend APIs in frontend integration tests.
-   Evaluated system performance under different loads using tools like JMeter for testing APIs performance.

*   examples on testing using JMeter:

    ![](images/)

    ![](images/)

    ![](images/)

## Deployment phase:

-   Deploying the app may need additional costs which isn't available with me right now.
-   there are lots of ways to deploy laravel apps I will mention two of them:
    -   Laravel Vapor: serverless deployment platform for Laravel, powered by AWS. Launch your Laravel infrastructure on Vapor and fall in love with the scalable simplicity of serverless.
    -   Envoyer: deploys your PHP applications with zero downtime. Just push your code, and let Envoyer deliver your application to one or many servers without interrupting a single customer.
