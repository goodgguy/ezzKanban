<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-29 05:39:52
  from 'C:\xampp\htdocs\ezkanban\mvc\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f9a4798629c49_99265848',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74adce711e15671880bf1e8965910eb4686a4804' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ezkanban\\mvc\\templates\\index.tpl',
      1 => 1603946391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f9a4798629c49_99265848 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '11504550445f9a4798613a06_27243382';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='../public/css/dragula.css' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="../public/css/1.css">
</head>

<body>
    <div class="add-task-container">
        <input type="text" maxlength="12" id="taskText" placeholder="New Task..." onkeydown="if (event.keyCode == 13)
                              document.getElementById('add').click()">
        <button id="add" class="button add-button" onclick="addTask()">Add New Task</button>
    </div>

    <div class="main-container">
        <ul class="columns">

            <li class="column to-do-column">
                <div class="column-header">
                    <h4>To Do</h4>
                </div>
                <ul class="task-list" id="to-do">
                    <li class="task">
                        <p>Analysis</p>
                    </li>
                    <li class="task">
                        <p>Coding</p>
                    </li>
                    <li class="task">
                        <p>Card Sorting</p>
                    </li>
                    <li class="task">
                        <p>Measure</p>
                    </li>
                </ul>
            </li>

            <li class="column to-do-column">
                <div class="column-header">
                    <h4>Tuan quen</h4>
                </div>
                <ul class="task-list" id="tuanquen">
                    <li class="task">
                        <p>Analysis</p>
                    </li>
                    <li class="task">
                        <p>Coding</p>
                    </li>
                    <li class="task">
                        <p>Card Sorting</p>
                    </li>
                    <li class="task">
                        <p>Measure</p>
                    </li>
                </ul>
            </li>

            <li class="column doing-column">
                <div class="column-header">
                    <h4>Doing</h4>
                </div>
                <ul class="task-list" id="doing">
                    <li class="task">
                        <p>Hypothesis</p>
                    </li>
                    <li class="task">
                        <p>User Testing</p>
                    </li>
                    <li class="task">
                        <p>Prototype</p>
                    </li>
                </ul>
            </li>

            <li class="column done-column">
                <div class="column-header">
                    <h4>Done</h4>
                </div>
                <ul class="task-list" id="done">
                    <li class="task">
                        <p>Ideation</p>
                    </li>
                    <li class="task">
                        <p>Sketches</p>
                    </li>
                </ul>
            </li>

            <li class="column trash-column">
                <div class="column-header">
                    <h4>Trash</h4>
                </div>
                <ul class="task-list" id="trash">
                    <li class="task">
                        <p>Interviews</p>
                    </li>
                    <li class="task">
                        <p>Research</p>
                    </li>

                </ul>
                <div class="column-button">
                    <button class="button delete-button" onclick="emptyTrash()">Delete</button>
                </div>
            </li>

        </ul>
    </div>
    <?php echo '<script'; ?>
 src='../public/js/dragula.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../public/js/1.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
