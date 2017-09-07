CREATE TABLE Movie(id int,
       	     	   title varchar(100), /*title cannot be NULL*/
		   year int,
		   rating varchar(10),
		   company varchar(50),
		   primary key(id),	/*movie id is primary key*/	
		   CHECK (title IS NOT NULL)
		   ) ENGINE=INNODB;
		   

CREATE TABLE Actor(id int,
       	     	   last varchar(20),
		   first varchar(20),
		   sex varchar(6),
		   dob date NOT NULL, /*actor must have date of birth*/
		   dod date,
		   primary key(id), /*actor id must be unique*/
		   CHECK (sex in ('Male','Female')) /*sex must be Male or Female*/
		  		     
		   ) ENGINE=INNODB;

CREATE TABLE Sales(mid int,
       	     	   ticketsSold int,
		   totalIncome int,
		   primary key(mid), /*movie id must be unique identifier*/
		   CHECK (ticketsSold>=0) /*non-negative tickets sold*/
		   ) ENGINE=INNODB;

CREATE TABLE Director(id int,
       	              last varchar(20),
		      first varchar(20),
		      dob date NOT NULL, /*must have DOB*/
		      dod date,
		      primary key(id) /*director id must be unique identifier*/
		      ) ENGINE=INNODB;

CREATE TABLE MovieGenre(mid int,
       	     		genre varchar(20),
			foreign key(mid) references Movie(id)
			) ENGINE=INNODB;

CREATE TABLE MovieDirector(mid int,
	     		   did int,
			   primary key(did,mid),
			   foreign key(mid) references Movie(id),
			   foreign key(did) references Director(id)
			   ) ENGINE=INNODB;

CREATE TABLE MovieActor(mid int,
			aid int,
			role varchar(50),
			primary key(mid,aid), /*one entry per actor per movie*/
			foreign key(mid) references Movie(id),
			foreign key(aid) references Actor(id)
			) ENGINE=INNODB;

CREATE TABLE MovieRating(mid int,
       	     		 imdb int,
			 rot int,
			 primary key(mid), /*one rating entry per movie*/
			 foreign key(mid) references Movie(id)
			 ) ENGINE=INNODB;

CREATE TABLE Review(name varchar(20),
		    time timestamp,
		    mid int,
		    rating int,
		    comment varchar(500)
		    ) ENGINE=INNODB;

CREATE TABLE MaxPersonID(id int) ENGINE=INNODB;       	

CREATE TABLE MaxMovieID(id int) ENGINE=INNODB;
