# phpquantox
School Board

## Index
Index section is containing student ID, name, and edit button to edit student's grades

## Edit
Edit page can be used to change the grade.

## API
To check API (CSB/CSMB), you can go to student.php/?student={id}&type={CSB/CSMB}
CSB will return JSON format 
CSMB will return XML format
The default type if type is not mentioned or false input is CSB
with average score and Pass/Fail is depend on criterias.

I have already deployed to heroku and you can access it through 
https://phpquantox.herokuapp.com/

### Example
This is example of the api:
https://phpquantox.herokuapp.com/student.php?student=1&type=csmb


## Database
Here I used remote database from remotemysql. You also can connect to database with connection string on the config.php and modify the data
