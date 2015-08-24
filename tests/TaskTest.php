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

        function test_task_setDescription()
        {
            //Arrange
            $description = "Wash the dog";
            $test_task = new Task($description);

            //Act
            $test_task->setDescription("Feed dog");
            $result = $test_task->getDescription();

            //Assert
            $this->assertEquals("Feed dog", $result);
        }

        function test_task_getId()
        {
            //Arrange
            $id = 1;
            $description = "Wash the dog";
            $test_task = new Task($description, $id);

            //Act
            $result = $test_task->getId();

            //Assert
            $this->assertEquals(1, $result);
        }

        function test_task_save()
        {
            //Arrange
            $id = 1;
            $description = "Wash the dog";
            $test_task = new Task($description, $id);

            //Act
            $test_task->save();

            //Assert
            $result = Task::getAll();
            $this->assertEquals($test_task, $result[0]);
        }

        function testSaveSetsId()
        {
            //Arrange
            $description = "Wash the dog";
            $id = 1;
            $test_task = new Task($description, $id);

            //Act
            $test_task->save();

            //Assert
            $this->assertEquals(true, is_numeric($test_task->getId()));
        }




        function test_getAll()
        {
            //Arrange
            $description = "Wash the dog";
            $id = 1;
            $test_task = new Task($description, $id);
            $test_task->save();

            $description2 = "Water the lawn";
            $id2 = 2;
            $test_task2 = new Task($description2, $id2);
            $test_task2->save();

            //Act
            $result = Task::getAll();

            //Assert
            $this->assertEquals([$test_task, $test_task2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $description = "Wash the dog";
            $id = 1;
            $test_task = new Task($description, $id);
            $test_task->save();

            $description2 = "Water the lawn";
            $id2 = 2;
            $test_task2 = new Task($description2, $id2);
            $test_task2->save();

            //Act
            Task::deleteAll();

            //Assert
            $result = Task::getAll();
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $description = "Wash the dog";
            $id = 1;
            $test_task = new Task($description, $id);
            $test_task->save();
            $id2 = 2;
            $description2 = "Water the lawn";
            $test_task2 = new Task($description2, $id2);
            $test_task2->save();

            //Act
            $result = Task::find($test_task->getId());

            //Assert
            $this->assertEquals($test_task, $result);
        }

        function testUpdate()
        {
            //Arrange
            $description = "Wash the dog";
            $id = 1;
            $due_date = "2015-11-11";
            $test_task = new Task($description, $id, $due_date);
            $test_task->save();

            $new_description = "Clean the dog";
            $new_due_date = "2015-10-10";

            //Act

            $test_task->update($new_description, $new_due_date);

            //Assert
            $this->assertEquals("Clean the dog", $test_task->getDescription());
            $this->assertEquals("2015-10-10", $test_task->getDueDate());
        }

        function testDeleteTask()
        {
            //Arrange
            $description = "Wash the dog";
            $id = 1;
            $test_task = new Task($description, $id);
            $test_task->save();

            $description2 = "Water the lawn";
            $id2 = 2;
            $test_task2 = new Task($description2, $id2);
            $test_task2->save();


            //Act
            $test_task->delete();

            //Assert
            $this->assertEquals([$test_task2], Task::getAll());
        }
    }
?>
