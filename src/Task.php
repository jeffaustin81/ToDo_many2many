<?php
class Task
{
    private $description;
    private $id;
    private $due_date;

    function __construct($description, $id=null, $due_date="0000-00-00")
    {

        $this->description = $description;
        $this->id =$id;
        $this->due_date = $due_date;
    }

    function setDescription($new_description)
    {

        $this->description = (string) $new_description;

    }

    function getDescription()
    {

        return $this->description;

    }

    function getId()
    {

        return $this->id;

    }

    function getDueDate()
    {

        return $this->due_date;

    }

    function setDueDate($new_due_date)
    {
        $this->due_date = $new_due_date;
    }

    function save()
    {

        $statement = $GLOBALS['DB']->exec("INSERT INTO tasks (description, due_date) VALUES ('{$this->getDescription()}', '{$this->getDueDate()}')");
        $this->id = $GLOBALS['DB']->lastInsertId();

    }

    function delete()
    {

        $GLOBALS['DB']->exec("DELETE FROM tasks WHERE id = {$this->getId()};");

    }

    function update($new_description, $new_due_date)
    {
        $GLOBALS['DB']->exec("UPDATE tasks SET description = '{$new_description}', '{$new_due_date}' WHERE id =  {$this->getId()};");
        $this->setDescription($new_description);
        $this->setDueDate($new_due_date);
    }

    function addCategory($category)
    {
        $GLOBALS['DB']->exec("INSERT INTO categories_tasks (category_id, task_id) VALUES ({$category->getId()}, {$this->getId()});");
    }

    function getCategories()
    {
        $query = $GLOBALS['DB']->query("SELECT category_id FROM categories_tasks WHERE task_id = {$this->getId()};");
        $category_ids = $query->fetchAll(PDO::FETCH_ASSOC);

        $categories = array();
        foreach($category_ids as $id) {
            $category_id = $id['category_id'];
            $result = $GLOBALS['DB']->query("SELECT * FROM categories WHERE id = {$category_id};");
            $returned_category = $result->fetchAll(PDO::FETCH_ASSOC);

            $name = $returned_category[0]['name'];
            $id = $returned_category[0]['id'];
            $new_category = new Category($name, $id);
            array_push($categories, $new_category);
        }
        return $categories;
    }

    static function find($search_id)
    {
        $found_task = null;
        $tasks = Task::getAll();
        foreach($tasks as $task) {
            $task_id = $task->getId();
            if ($task_id == $search_id) {
                $found_task = $task;
            }
        }
        return $found_task;
    }

    static function getAll()
    {
        $returned_tasks = $GLOBALS['DB']->query("SELECT * FROM tasks ORDER BY due_date;");
        $tasks = array();
        foreach($returned_tasks as $task) {
            $description = $task['description'];
            $id = $task['id'];
            $due_date = $task['due_date'];
            $new_task = new Task($description, $id, $due_date);
            array_push($tasks, $new_task);
        }

        return $tasks;
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM tasks;");
    }
}
?>
