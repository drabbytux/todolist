<?php 

class TodoList{

   private $items, $categories;

    function __construct(){
        echo "Welcome to your Todo List. Enjoy your day!";
        $this->items        = array();
        $this->categories   = array();
    }
    
    function addItem($item){
        array_push($this->items, $item);
    }

    function addCategory($category){
        array_push($this->categories, $category);
    }

    function addCategoryToItems( array $item_objs, $category_name ){
        foreach($item_objs as $item){
            $item->add_category($category_name);
        }
        //print_r( $item_objs );
        //print_r( $category_name );
    }

    function printItems(){
        //print_r( $this->items );
    }

    function printCateogies(){
       // print_r( $this->categories );
    }

    // ("Buy milk - shopping - 1")
    function renderShoppingList(){
        foreach($this->items as $item){
            echo "\n----------------------\n";
            echo $item->whatIsTheName();
            echo "\n----------------------\n";
        }
    }

}

class Item {
    
    private $name, $categories;
    function __construct(string $name){
        $this->name         = $name;
        $this->categories   = array();
    }

    function add_category($category){
        if( !array_search($category, $this->categories) ){
        array_push($this->categories, $category);
        echo "Added Category!\n";
        } else {
             echo "Category aleady exists!\n";
        }
    }

    function whatIsTheName(){
        echo $this->name;
    }
}

class Category {
    private $name;

    function __construct(string $name){
        $this->name = $name;
    }

    function whatIsTheName(){
        echo $this->name;
    }
}

// INIT the list, categories and items ------------
$my_list = new TodoList;

$my_item_1 = new Item("Buy Milk");
$my_item_2 = new Item("Butter");
$my_item_3 = new Item("item 3");

$my_category_1 = new Category("shopping");
$my_category_2 = new Category("cat 2");

// Testing/Using my List items ------------
$my_item_1->whatIsTheName();


// Testing my list
$my_list->addItem($my_item_1);
$my_list->addItem($my_item_2);
$my_list->addItem($my_item_3);

$my_list->addCategory($my_category_1);
$my_list->addCategory($my_category_2);
$my_list->addCategory($my_category_2);

$my_list->printItems();
$my_list->printCateogies();

// TEST 5 - associate "item 1" and "item 2" with "cat 1"
$my_list->addCategoryToItems([$my_item_1, $my_item_2], $my_category_1);

$my_list->renderShoppingList();

/*

Create 3 classes to handle:
-a todo list, with items and categories
-adding an item to list (belonging to category)
-removing an item from list
-changing existing item
-swap the order of 2 items
-print the todo list with item orders and ordered ("Buy milk - shopping - 1")

//testing
You will write additional code to test the implementation. By calling functions to:

1 create 1 todo list
2 create 3 items ("item 1", "item 2", "item 3")
3 create 2 categories ("cat 1", "cat 2")
4 associate all the items with the todo list (sorted by order of adding)
5 associate "item 1" and "item 2" with "cat 1"
6 associate "item 3" with the "cat 2"
7 change "item 1" to "item 1 - modified"
8 swap the order of "item 2" and "item 3"

Extra:
-adding item category
-removing item category
-remove all items from category
-an item should contain the task and creation time
-print todo list, with categories and item orders in the appropriate order.

*/
