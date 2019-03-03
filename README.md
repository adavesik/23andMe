### How to use ###
First of all you should be logged in. Then firstly run GetAuthCode.php

Using GetAuthCode class allowed to get "code" which is neccessary for further steps. 

You should provide all required parameters, 
then it redirects to the 23 site and asks for granting access.

If user pressed "Yes, grant access" the page redirected to the http://localhost:5000/receive_code/?code=xxxxxxxxxxxxxxxxxxxxxxxxxxxx. 
You should copy "xxxxxxxxxxxxxxxxxxxxxxxxxxxx". 

### Second Step ###
Run GetAccessToken script with "code" parameter which provide you a token.

### 3rd step ###
You could test API running test.php with your token

