<?php
include'includes/dbconfig.php';

//users table statement
$sql="CREATE TABLE IF NOT EXISTS fusers (userID int (8) NOT NuLL AUTO_INCREMENT,
        userName VARCHAR(30) NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        joinDate DATETIME NOT NULL,
        userLevel int(8) NOT NULL,
        UNIQUE INDEX name_unique(userName),
        PRIMARY KEY (userID))ENGINE=INNODB";
 
        mysql_query($sql)or die("query failed ".mysql_error()); 
    $username="admin";
    $password=md5("admin");
    
   // $sql="INSERT INTO fusers (userName,password,email,joinDate,userLevel) VALUES
    //        ('$username','$password','mohamed@domain.com',NOW(),1)";
     //  mysql_query($sql)or die("query failed ".mysql_error());      
           
           //topics categories statement
           $sql="CREATE TABLE IF NOT EXISTS fcategories (catID int (8) NOT NuLL AUTO_INCREMENT,
        catName VARCHAR(30) NOT NULL,
        catDesc VARCHAR(255) NOT NULL,
        UNIQUE INDEX catname_unique(catName),
        PRIMARY KEY (catID))ENGINE=INNODB";
 
        mysql_query($sql)or die("query failed ".mysql_error());  
        
       // $sql="INSERT INTO fcategories (catName,catDesc)VALUES
       //     ('General','contain general development topics')";
       // mysql_query($sql)or die("query failed ".mysql_error());  
       
       //topics statement
       $sql="CREATE TABLE IF NOT EXISTS ftopics (topicID int (8) NOT NuLL AUTO_INCREMENT,
        topicTitle VARCHAR(30) NOT NULL,
        topicSubject VARCHAR(255) NOT NULL,
        topicDate DATETIME NOT NULL,
        topicCat int(8) NOT NULL,
        author int(8) NOT NULL,
        PRIMARY KEY (topicID))ENGINE=INNODB";
 
        mysql_query($sql)or die("query failed ".mysql_error()); 
       
       //topics related posts statement
       $sql="CREATE TABLE IF NOT EXISTS fposts (postID int (8) NOT NuLL AUTO_INCREMENT,
        postContent VARCHAR(255) NOT NULL,
        postDate DATETIME NOT NULL,
        postTopic int(8) NOT NULL,
        author int(8) NOT NULL,
        PRIMARY KEY (postID))ENGINE=INNODB";
 
        mysql_query($sql)or die("query failed ".mysql_error()); 
         
         //link topic category with cat is
         $sql="ALTER TABLE ftopics ADD FOREIGN KEY(topicCat) REFERENCES fcategories(catID) ON DELETE CASCADE ON UPDATE CASCADE";
         mysql_query($sql)or die("query failed ".mysql_error());
         $sql="ALTER TABLE ftopics ADD FOREIGN KEY(author) REFERENCES fusers(userID) ON DELETE RESTRICT ON UPDATE CASCADE";
         mysql_query($sql)or die("query failed ".mysql_error());
         $sql="ALTER TABLE fposts ADD FOREIGN KEY(author) REFERENCES fusers(userID) ON DELETE RESTRICT ON UPDATE CASCADE";
         mysql_query($sql)or die("query failed ".mysql_error());
         $sql="ALTER TABLE fposts ADD FOREIGN KEY(postTopic) REFERENCES ftopics(topicID) ON DELETE CASCADE ON UPDATE CASCADE";
         mysql_query($sql)or die("query failed ".mysql_error());
?>