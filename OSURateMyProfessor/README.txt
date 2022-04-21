Hello! This is the lead programmer, Emory Meursing and here is how to run this website.
PREREQUISITES:
	1) Must have xampp 7.+ installed. (I use 7.4.27 for Windows 64x bit systems)
	2) Internet connection
	3) Copy of OSURateMyProfessor folder
	4) Copy of rateMyProfessor SQL text file
	
STEPS:
	1) Once xampp is installed, open the control panel and start the Apache server and MySQL server.
	2) After those processes begin, go to localhost/phpmyadmin on a new browser page.
	3) Once you're there, click on SQL and paste all of the text from the SQL text file and press go.
		- If everything worked right, once you refresh your page you should see a new database called osu_ratemyprofessor.
	4) Next, go to the User Accounts tab and click "Add user account".
		- For username, enter masterUser
		- For hostname, change any host to local and enter localhost in the text box.
		- For password, enter password
		- For global priviledges, click "Check all"
		- Finally, hit go to create a new user
	5) Once you're done creating a new user and uploading the database, navigate in your computer to where you installed xampp, aka the xampp folder.
	6) Take the OSURateMyProfessor file and put it in the htdocs folder.
		- The htdocs folder is where all of your websites will be run from.
	7) Go to your browser and run localhost/(insert your folder name here).
		- This will take you to the index.html page of your folder.
	8) In this case, we will open localhost/osuratemyprofessor.
	9) After these steps, you should be at the log in page of this project and you can begin going through the website.
