### Create post table

> CREATE TABLE `kantapp`.`post` ( `post_id` INT NOT NULL AUTO_INCREMENT ,  `post_title` VARCHAR(500) NOT NULL ,  `post_by` VARCHAR(100) NOT NULL ,  `body` LONGTEXT NOT NULL ,    PRIMARY KEY  (`post_id`)) ENGINE = InnoDB;
