<?php
require_once("./php/component.php");
require_once('./php/operation.php');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/68d9a41448.js" crossorigin="anonymous"></script>
    <title>Books</title>
</head>

<body>

    <main>
        <div class="container text-center">
            <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i>Book Store</h1>
            <div class="d-flex justify-content-center">
                <form action="" method="POST" class="w-50">
                    <div class="pt-2">
                        <?php inputElement("<i class=\"fas fa-id-badge\"></i>", "ID", "book_id", setID()); ?>

                    </div>
                    <div class="pt-2">
                        <?php inputElement("<i class=\"fas fa-book\"></i>", "Book Name", "book_name", ""); ?>
                    </div>
                    <div class="row pt-2">
                        <div class="col">
                            <?php inputElement("<i class=\"fas fa-people-carry\"></i>", "Publisher", "book_publisher", ""); ?>
                        </div>
                        <div class="col">
                            <?php inputElement("<i class=\"fas fa-dollar-sign\"></i>", "Price", "book_price", ""); ?>

                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php buttonElement("btn-create", "btn btn-success", "<i class='fas fa-plus'></i>", "create", "data-toggle='tooltip' data-placement='bottom' title='Create'") ?>
                        <?php buttonElement("btn-read", "btn btn-primary", "<i class='fas fa-sync'></i>", "read", "data-toggle='tooltip' data-placement='bottom' title='Read'") ?>
                        <?php buttonElement("btn-update", "btn btn-light", "<i class='fas fa-pen-alt'></i>", "update", "data-toggle='tooltip' data-placement='bottom' title='Update'") ?>
                        <?php buttonElement("btn-delete", "btn btn-danger", "<i class='fas fa-trash-alt'></i>", "delete", "data-toggle='tooltip' data-placement='bottom' title='Delete'") ?>
                        <?php deleteBtn() ?>
                    </div>
                </form>
            </div>
            <!-- Bootstrap table-->
            <div class="d-flex table-data">
                <table class="table table-striped table-dark">
                    <thead class="thead-dark">
                        <tr>
                            <th>id</th>
                            <td>Book Name</td>
                            <td>Publisher</td>
                            <td>Book Price</td>
                            <td>Edit</td>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php

                        if (isset($_POST['read'])) {
                            $result = getData();
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td data-id="<?php echo $row['id']; ?> "><?php echo $row['id']; ?></td>
                            <td data-id="<?php echo $row['id']; ?> "><?php echo $row['book_name']; ?></td>
                            <td data-id="<?php echo $row['id']; ?> "><?php echo $row['book_publisher']; ?></td>
                            <td data-id="<?php echo $row['id']; ?> "><?php echo '$' . $row['book_price']; ?></td>
                            <td><i data-id="<?php echo $row['id']; ?> " class=" fas fa-edit btnedit"></i></td>
                        </tr>
                        <?php
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="php/main.js"></script>
</body>

</html>