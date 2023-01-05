My Thoughts On the Code
=================
1) The controller is breaking the REST API structure thereby consisting of n number of methods in a single file. It should be splitted into different controller based on requirements.
2) Piling up the controller with more methods will create more issues in code readability.
3) No validations defined in the controller for incoming request.
4) PSR coding standard is not followed.
-- In consistent naming convention (At some places it's snake case & some places camel case).
-- Unused variables are defined.
-- Curly braces missing for some if conditions whereas PSR standard ask for curly braces.
5) Unnecessary if, elseif defined in the code.
6) At many places $request->all() is stored in $data variable & then passed into a function which can be directly passed instead of storing in variable.
7) Environment variables are directly used in the file at some places which actually should be put in config file & then should be accessed anywhere required.
8) Doc blocks are missing for methods.
9) Short forms shouldn't be used while naming variables because it creates confusion for a developer in uderstanding.
-- For example on line no 84 in BookingController $cuser variabled has been used which doesn't give any clarity of what kind of user it is. It should be more specific like $customUser or $authenticatedUser.
10) The Comparison operator for comparing the value is wrong.
-- Example: In booking controller on line no 38  if($user_id = $request->get('user_id')) {}
11) Commented code exist in the file which is a bad practice.
-- We can remove such commented code & commit them to repository by defining proper message so that in future if required it can be retrieved.
12) The static values like male, female, yes, no etc should be defined in a separate constants file so that if any changes need to be done it can be done at one place.
13) At some places the function remains open ended without return statement.
14) Instead of writing the raw conditions in where clause for null values the clauses like **whereNull**, **whereNotNull** can be used.
15) The methods are too long, it should be breakdown into small private methods to improve the code readability.
16) Spelling mistakes while naming variables 
-- Example: Under **UserRepository** line no 157 the variable is **$already_exit** which should be actually **$already_exist**, 


Conclusion
=================
1) Just want to mention that refactoring of code cannot be done in one shot :). It's a gradual process.
2) As per the task assigned to me I have refactored the code under BookingController for following methods.
-- index
-- show
-- store
-- update
-- immediateJobEmail
3) I'm not assuring that it's 100% refactored, because it requires more time. However I have given few glimpses of how can we improve it.
4) Regarding my rating for the original code, I'll rate it under terrible category. Because there are some basic mistakes.




