# **KeyRace**


This README contains all informations needed for developers in order to
globally understand the project and its code base.

<br>


<!-------------------------------- P A G E S --------------------------------->

## **📄 Pages**

<br>

### **index.php**

KeyRace description, search bar, sign in, log in & leaderboard.

<br>


### **signup.php / login.php**

Sign up / log in (dynamics pages).

<br>


### **leaderboard.php**

List of all users ordered either by number of wins or by WPM.

<br>


### **profile.php**

Stats, car with detailed traits, achievements & friends (dynamic).

<br>


### **campaign.php**

8 quests from the easiest to the hardest.

<br>


### **multiplayer.php**

Race & chat.

<br>


### **training.php**

Infinite word list for training typing.

<br>


### **customization.php**

Custom interface, car & avatar (dynamic page)

<br>


### **settings.php**

Edit account & website preferences.

<br>


### **admin.php**

Database & website monitoring page for administrators.

<br>


### **search.php**

List search results.

<br>


### **support.php**

Contact form for reaching KeyRace teams.

<br><br>


<!--------------------- F R O N T - E N D   S C R I P T S -------------------->

## **🖼️ Front-end scripts**

<br>

### **main.js**

Manages transitions for dynamic content & pages.

<br>


### **navbar.js**

php component for the navbar.

<br>


### **typing.js**

Generates randow words, checks for errors from user's input & computes user's
WPM.

<br>


### **race.js**

Listens for winners & manages race display.

<br>


### **chat.js**

Manages chat.

<br>


### **avatar-maker.js**

Custom avatar by selecting traits.

<br>


### **settings.js**

Choose colors of customization and dark/light mode.

<br><br>


<!---------------------- B A C K - E N D   S C R I P T S --------------------->

## **⚙️ Back-end scripts**

<br>

### **signup-check.php**

Checks if sign in form is applicable.

<br>


### **login-check.php**

Checks if log in form is applicable.

<br>


### **admin.php**

Contains every functions for managing the database and the website for the
administrators.

<br>


### **contact-form.php**

Send an email to the team with PHP Mailer.

<br><br>


<!----------------------------- D A T A B A S E ------------------------------>

## **Data Conceptual Model**

USER: user_id, username, email, password, keyboard_layout, rights, customization

SEND, 0N USER, 11 MESSAGE

MESSAGE: message_id, text, user, date
