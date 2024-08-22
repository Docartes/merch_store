<?php 

include "../../controllers/category.controller.php";

deleteCategory($_GET['id']);
header("Location: ../home");
