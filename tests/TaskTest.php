<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Task.php";
    require_once "src/Category.php";

    $server = 'mysql:host=localhost;dbname=to_do_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class TaskTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Task::deleteAll();
            Category::deleteAll();
        }

        function test_task_getDescription()
        {
            //Arrange


            $description = "Wash the dog";
            $test_task = new Task($description);

            //Act
            $result = $test_task->getDescription();

            //Assert
            $this->assertEquals($description, $result);
        }

        // function test_getAll()
        // {
        //     //Arrange
        //     $name = "Home stuff";
        //     $id = null;
        //     $test_category = new Category($name, $id);
        //     $test_category->save();
        //
        //     $description = "Wash the dog";
        //     $test_task = new Task($description, $id);
        //     $test_task->save();
        //
        //     $description2 = "Water the lawn";
        //     $test_task2 = new Task($description2, $id);
        //     $test_task2->save();
        //
        //     //Act
        //     $result = Task::getAll();
        //
        //     //Assert
        //     $this->assertEquals([$test_task, $test_task2], $result);
        // }
        //
        // function test_deleteAll()
        // {
        //     //Arrange
        //     $name = "Home stuff";
        //     $id = null;
        //     $test_category = new Category($name, $id);
        //     $test_category->save();
        //
        //     $description = "Wash the dog";
        //
        //     $test_task = new Task($description, $id);
        //     $test_task->save();
        //
        //     $description2 = "Water the lawn";
        //     $test_task2 = new Task($description2, $id);
        //     $test_task2->save();
        //
        //     //Act
        //     Task::deleteAll();
        //
        //     //Assert
        //     $result = Task::getAll();
        //     $this->assertEquals([], $result);
        // }
        //
        // function test_getId()
        // {
        //     //Arrange
        //     $name = "Home stuff";
        //     $id = null;
        //     $test_category = new Category($name, $id);
        //     $test_category->save();
        //
        //     $description = "Wash the dog";
        //
        //     $test_task = new Task($description, $id);
        //     $test_task->save();
        //
        //     //Act
        //     $result = $test_task->getId();
        //
        //     //Assert
        //     $this->assertEquals(true, is_numeric($result));
        // }
        //
        // // function test_getCategoryId()
        // // {
        // //     //Arrange
        // //     $name = "Home stuff";
        // //     $id = null;
        // //     $test_category = new Category($name, $id);
        // //     $test_category->save();
        // //
        // //     $description = "Wash the dog";
        // //
        // //     $test_task = new Task($description, $id);
        // //     $test_task->save();
        // //
        // //     //Act
        // //     $result = $test_task->getCategoryId();
        // //
        // //     //Assert
        // //     $this->assertEquals(true, is_numeric($result));
        // // }
        //
        // function test_find()
        // {
        //     //Arrange
        //     $name = "Home stuff";
        //     $id = null;
        //     $test_category = new Category($name, $id);
        //     $test_category->save();
        //
        //     $description = "Wash the dog";
        //
        //     $test_task = new Task($description, $id);
        //     $test_task->save();
        //
        //     $description2 = "Water the lawn";
        //     $test_task2 = new Task($description2, $id);
        //     $test_task2->save();
        //
        //     //Act
        //     $result = Task::find($test_task->getId());
        //
        //     //Assert
        //     $this->assertEquals($test_task, $result);
        // }
    }
?>
