# **KeyRace**

<br>

This README contains all informations needed for developers in order to
globally understand the project and its code base.

<br><hr>


<!-------------------------------- P A G E S --------------------------------->

## <br> **Website plan**

### <br> **index.html**

KeyRace description, search bar, sign in, log in & leaderboard.


### <br> **connect.html**

Sign in / log in (dynamic page).


### <br> **leaderboard.html**

List of all users ordered either by number of wins or by WPM.


### <br> **profile.html**

Stats, car with detailed traits, achievements & friends (dynamic).


### <br> **campaign.html**

8 quests from the easiest to the hardest.


### <br> **multiplayer.html**

Race & chat.


### <br> **training.html**

Infinite word list for training typing.


### <br> **customization.html**

Custom interface, car & avatar (dynamic page)


### <br> **settings.html**

Edit account & website preferences.


### <br> **support.html**

Contact form for reaching KeyRace teams.

<br><hr>

<!--------------------- F R O N T - E N D   S C R I P T S -------------------->

## <br> **Front-end scripts**

### <br> **main.js**

Manages transitions for dynamic content & pages.


### <br> **typing.js**

Generates randow words, checks for errors from user's input & computes user's
WPM.


### <br> **race.js**

Listens for winners & manages chat.


### <br> **avatar-maker.js**

Custom avatar by selecting traits.

<br><hr>

<!---------------------- B A C K - E N D   S C R I P T S --------------------->

## <br> **Back-end scripts**

### <br> **signin-check.php**

Checks if sign in form is applicable.


### <br> **login-check.php**

Checks if log in form is applicable.


### <br> **support-form.php**

Send an email to the team with PHP Mailer.
