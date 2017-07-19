User, Category, & Course Creation Interface Example
---------------------------------------------------------
This is the source file of Interface Example on using Moodle Web Service

Usage
---------------------------------------------------------
1. Clone the project into htdocs on XAMPP, then start XAMPP and go to `localhost/src_moodle_for_scele3`
2. Enter your username and password that are registered as admin on your local server
3. Enter the name of your moodle server's folder
4. Logon, and now you can create User, Course, and Category

Create User
---------------------------------------------------------
Attributes (all attributes are required unless stated otherwise):
    1. Username
    2. Password
    3. First Name
    4. Last Name
    5. Email

Create Category
----------------------------------------------------------
Attributes (all attributes are required unless stated otherwise):
    1. Name
    2. Parent ID (Default '0' for root)
    3. Category ID (Optional)
    4. Description (Optional)

Create Course
----------------------------------------------------------
Attributes (all attributes are required unless stated otherwise):
    1. Fullname (Course's name)
    2. Shortname (Course's short name)
    3. Category ID (ID based on full category order in site administration)
    4. Summarry (Optional)