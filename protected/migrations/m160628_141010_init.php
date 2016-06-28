<?php

/**
 * Created with https://github.com/schmunk42/database-command
 */
class m160628_141010_init extends CDbMigration
{

    public function safeUp()
    {
        if ($this->dbConnection->schema instanceof CMysqlSchema) {
            $options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
        } else {
            $options = '';
        }


        // Schema for table 'courses'
        $this->createTable("courses",
            array(
                "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
                "name" => "varchar(255) NOT NULL",
                "description" => "text NOT NULL",
                "start_date" => "datetime NOT NULL",
                "end_date" => "datetime",
                "owner_user_id" => "int(11) NOT NULL",
                "create_date" => "datetime NOT NULL",
                "status" => "varchar(15) NOT NULL",
                "price_by" => "varchar(15) NOT NULL",
                "price" => "float NOT NULL",
                "previous_course_id" => "int(11)",
            ),
            $options);


        // Schema for table 'courses_users'
        $this->createTable("courses_users",
            array(
                "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
                "user_id" => "int(11) NOT NULL",
                "course_id" => "int(11) NOT NULL",
                "role" => "varchar(15) NOT NULL",
            ),
            $options);


        // Schema for table 'homeworks'
        $this->createTable("homeworks",
            array(
                "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
                "user_id" => "int(11) NOT NULL",
                "lesson_id" => "int(11) NOT NULL",
                "task" => "text NOT NULL",
                "time_estimated" => "float NOT NULL",
                "progress" => "int(11) NOT NULL",
                "done" => "float NOT NULL",
                "comment" => "text NOT NULL",
                "teacher_id" => "int(11) NOT NULL",
            ),
            $options);


        // Schema for table 'lessons'
        $this->createTable("lessons",
            array(
                "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
                "course_id" => "int(11) NOT NULL",
                "date_start" => "datetime NOT NULL",
                "date_finished" => "datetime NOT NULL",
                "paid" => "tinyint(1) NOT NULL",
                "description" => "text NOT NULL",
                "name" => "varchar(255) NOT NULL",
                "price" => "int(11) NOT NULL",
            ),
            $options);


        // Schema for table 'lessons_users'
        $this->createTable("lessons_users",
            array(
                "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
                "user_id" => "int(11) NOT NULL",
                "lesson_id" => "int(11) NOT NULL",
                "mark" => "float NOT NULL",
                "presented" => "tinyint(1) NOT NULL",
            ),
            $options);


        // Schema for table 'users'
        $this->createTable("users",
            array(
                "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
                "name" => "varchar(255) NOT NULL",
                "email" => "varchar(255) NOT NULL",
                "password" => "varchar(50) NOT NULL",
                "access_role" => "varchar(15) NOT NULL",
                "status" => "varchar(15) NOT NULL",
                "check_code" => "varchar(50) NOT NULL",
                "comment" => "text NOT NULL",
                "date_created" => "datetime NOT NULL",
                "last_ip" => "varchar(40) NOT NULL",
                "phone" => "bigint(20) NOT NULL",
                "address" => "text NOT NULL",
            ),
            $options);


        // Schema for table 'users_visibility'
        $this->createTable("users_visibility",
            array(
                "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
                "user_id" => "int(11) NOT NULL",
                "viewer_user_id" => "int(11) NOT NULL",
                "fields_visible" => "text NOT NULL",
            ),
            $options);


        // Foreign Keys for table 'courses'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_courses_courses_previous_course_id', 'courses', 'previous_course_id', 'courses',
                'id', 'RESTRICT', 'RESTRICT'); // FIX RELATIONS
            $this->addForeignKey('fk_courses_users_owner_user_id', 'courses', 'owner_user_id', 'users', 'id',
                'RESTRICT', 'RESTRICT'); // FIX RELATIONS
        endif;


        // Foreign Keys for table 'courses_users'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_courses_users_courses_course_id', 'courses_users', 'course_id', 'courses', 'id',
                'RESTRICT', 'RESTRICT'); // FIX RELATIONS
            $this->addForeignKey('fk_courses_users_users_user_id', 'courses_users', 'user_id', 'users', 'id',
                'RESTRICT', 'RESTRICT'); // FIX RELATIONS
        endif;


        // Foreign Keys for table 'homeworks'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_homeworks_users_user_id', 'homeworks', 'user_id', 'users', 'id', 'RESTRICT',
                'RESTRICT'); // FIX RELATIONS
            $this->addForeignKey('fk_homeworks_lessons_lesson_id', 'homeworks', 'lesson_id', 'lessons', 'id',
                'RESTRICT', 'RESTRICT'); // FIX RELATIONS
            $this->addForeignKey('fk_homeworks_users_teacher_id', 'homeworks', 'teacher_id', 'users', 'id', 'RESTRICT',
                'RESTRICT'); // FIX RELATIONS
        endif;


        // Foreign Keys for table 'lessons'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_lessons_courses_course_id', 'lessons', 'course_id', 'courses', 'id', 'RESTRICT',
                'RESTRICT'); // FIX RELATIONS
        endif;


        // Foreign Keys for table 'lessons_users'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_lessons_users_lessons_lesson_id', 'lessons_users', 'lesson_id', 'lessons', 'id',
                'RESTRICT', 'RESTRICT'); // FIX RELATIONS
            $this->addForeignKey('fk_lessons_users_users_user_id', 'lessons_users', 'user_id', 'users', 'id',
                'RESTRICT', 'RESTRICT'); // FIX RELATIONS
        endif;


        // Foreign Keys for table 'users_visibility'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_users_visibility_users_user_id', 'users_visibility', 'user_id', 'users', 'id',
                'RESTRICT', 'RESTRICT'); // FIX RELATIONS
            $this->addForeignKey('fk_users_visibility_users_viewer_user_id', 'users_visibility', 'viewer_user_id',
                'users', 'id', 'RESTRICT', 'RESTRICT'); // FIX RELATIONS
        endif;

        print "\n".'=======================INSERTING_DATA:========================='."\n";
        
        // Data for table 'users'
        $this->insert("users", array(
            "id" => "1",
            "name" => "Баринов Федор Олегович",
            "email" => "alloy05@mail.ru",
            "password" => "1466809662c52c7e033d6d6c08704bd445a7074bed7580b3ec",
            "access_role" => "admin",
            "status" => "verified",
            "check_code" => "",
            "comment" => "",
            "date_created" => "2016-06-25 02:08:00",
            "last_ip" => "127.0.0.1",
            "phone" => "79175929331",
            "address" => "Ленинградское ш. 86 кв 99",
        ));

        // Data for table 'courses'
        $this->insert("courses", array(
            "id" => "1",
            "name" => "Основы веб-программирования 2016",
            "description" => "",
            "start_date" => "2016-07-01 10:00:00",
            "end_date" => "2016-07-08 12:00:00",
            "owner_user_id" => "1",
            "create_date" => "2016-06-25 02:09:00",
            "status" => "verified",
            "price_by" => "lesson",
            "price" => "2000",
            "previous_course_id" => null,
        ));


        // Data for table 'courses_users'
        $this->insert("courses_users", array(
            "id" => "1",
            "user_id" => "1",
            "course_id" => "1",
            "role" => "teacher",
        ));


        // Data for table 'homeworks'


        // Data for table 'lessons'


        // Data for table 'lessons_users'





        // Data for table 'users_visibility'

    }

    public function safeDown()
    {
        echo 'Migration down for init is not supported. Just kill all database:)';
    }

}