<?php
require_once("db.php");
require_once("component.php");

$con = CreateDb();
// create button click

if (isset($_POST['create'])) {
    crateData();
}

if (isset($_POST['update'])) {
    UpdateData();
}

if (isset($_POST['delete'])) {
    DeleteRecord();
}
if (isset($_POST['deleteall'])) {
    deleteAll();
}


function crateData()
{
    $bookname = textboxValue("book_name");
    $bookpublisher = textboxValue("book_publisher");
    $bookprice = textboxValue("book_price");

    if ($bookname && $bookpublisher && $bookprice) {
        $sql = "INSERT INTO books (book_name, book_publisher, book_price)
        VALUES ('$bookname','$bookpublisher','$bookprice')";

        if (mysqli_query($GLOBALS['con'], $sql)) {
            TextNode("success", "Record Successfully Created");
        } else {
            echo "Error";
        }
    } else {
        TextNode("error", "Provide data in the textbox");
    }
}

// Sanitizer 
function textboxValue($value)
{
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if (empty($textbox)) {
        return false;
    } else {
        return $textbox;
    }
};


// messages
function TextNode($classname, $msg)
{
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}

// Get data from mysqli database

function getData()
{
    $sql = "SELECT * FROM books";
    $result = mysqli_query($GLOBALS['con'], $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    }
}

// update books
function UpdateData()
{
    $bookid = textboxValue("book_id");
    $bookname = textboxValue("book_name");
    $bookpublisher = textboxValue("book_publisher");
    $bookprice = textboxValue("book_price");

    if ($bookname && $bookpublisher && $bookprice) {
        $sql = "
                    UPDATE books SET book_name='$bookname', book_publisher = '$bookpublisher', book_price = '$bookprice' WHERE id='$bookid';                    
        ";

        if (mysqli_query($GLOBALS['con'], $sql)) {
            TextNode("success", "Data Updated");
        } else {
            TextNode("error", "Error: Enable to Update data");
        }
    } else {
        TextNode("error", "Error: Enable to Update data");
    }
}


function DeleteRecord()
{
    $bookid = (int) textboxValue("book_id");
    $sql = "DELETE FROM books WHERE id='  $bookid'";

    if (mysqli_query($GLOBALS['con'], $sql)) {
        TextNode("success", "Record Deleted successfully");
    } else {
        TextNode("error", "Error: Enable to Delete Record");
    }
}

function deleteBtn()
{
    $result =  getData();
    $i = 0;
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $i++;
            if ($i > 3) {
                buttonElement("btn-deleteall", "btn btn-danger", "<i class='fas fa-trash'></i> Delete All", "deleteall", "");
                return;
            }
        }
    }
}
function deleteAll()
{
    $sql = "DROP TABLE books";

    if (mysqli_query($GLOBALS['con'], $sql)) {
        TextNode("success", "All Records deleted Successfully");
        CreateDb();
    } else {
        TextNode("error", "Something Went Wrong: Records cannot deleted");
    }
}
// set id to textbox
function setID()
{
    $getid = getData();
    $id = 0;
    if ($getid) {
        while ($row = mysqli_fetch_assoc($getid)) {
            $id = $row['id'];
        }
    }
    return ($id + 1);
}