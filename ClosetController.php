<?php

class ClosetController {
    private $command;

    private $db;

    public function __construct($command) {
        $this->command = $command;

        $this->db = new Database();
    }

    public function run() {
        switch($this->command) {
            // testing AJAX
            case "loadDetail":
                $this->loadDetail();
                break;
            case "detail":
                $this->detail();
                break;
            case "market":
                $this->market();
                break;
            case "create":
                $this->create();
                break;
            case "logout":
                $this->destroySession();
            case "login":
            default:
                $this->login();
        }
    }

    // destroys the current session after the user logs out
    private function destroySession() {
        session_destroy();
    }

    // checks whether the user in already in the database and creates an account for them if they are not
    private function login() {
        $error_msg = "";
        // $name_regex = "/^[A-Z][a-z]+\s[A-Z][a-z]+$/";
        // $pass_regex = "/^[a-zA-Z]\w{8,20}$/";
        // if(preg_match($name_regex, $_POST["name"])){
    
            if (isset($_POST["email"])) { // if email is not null
                $data = $this->db->query("select * from closet_user where email = ?;", "s", $_POST["email"]);
                if ($data === false) {
                    $error_msg = "Error checking for user";
                } else if (!empty($data)) {
                    if (password_verify($_POST["password"], $data[0]["password"])) {
                        $_SESSION["id"] = $data[0]["id"];
                        $_SESSION["name"] = $_POST["name"];
                        $_SESSION["email"] = $_POST["email"];
                        header("Location: ?command=market");
                    } else {
                        $error_msg = "Wrong password";
                    }
                } else { // empty, no user found
                    // TODO: input validation
                    // Note: never store clear-text passwords in the database
                    //       PHP provides password_hash() and password_verify()
                    //       to provide password verification
                    // New user is inserted in the closet_user table
                    
                    // regex for first and last name separated by a space
                    $name_regex = "/^[A-Z][a-z]+\s[A-Z][a-z]+$/";
                    // regex for password that can be any character but has to has at least 8 and at most 20
                    $pass_regex = "/^[a-zA-Z].{8,20}$/";

                    // checks if user input matches the regex
                    if(preg_match($name_regex, $_POST["name"]) && preg_match($pass_regex, $_POST["password"])){
                        $insert = $this->db->query("insert into closet_user (name, email, password) values (?, ?, ?);", 
                            "sss", $_POST["name"], $_POST["email"], 
                            password_hash($_POST["password"], PASSWORD_DEFAULT));
                        if ($insert === false) {
                        $error_msg = "Error inserting user";
                    }
                        else {
                            $id = $this->db->query("select id from closet_user where email = ?;", "s", $_POST["id"]);
                            $_SESSION["id"] = $id;
                            $_SESSION["name"] = $_POST["name"];
                            $_SESSION["email"] = $_POST["email"];
                            header("Location: ?command=market");
                        }
                    }
                    else{
                        if(!preg_match($name_regex, $_POST["name"])){
                            $error_msg = "Not correct formatting for first and last name";
                        }
                        if(preg_match($pass_regex, $_POST["password"])){
                            $error_msg = "Password needs to be between 8-20 characters";
                        }
                    }
                }
            }
        // }
        include("templates/login.php");
    } 


    private function market() {
        $data = $this->db->query("select * from listings");
        $imagery = $this->db->query("select * from images");
        $status_msg = '';
        if(!isset($data[0])) {
            $status_msg = 'There are no listings currently available.';
        } 

        if(isset($_POST["delete"])){
            // $deleteid = $_POST["delete"];
            $delete = $this->db->query("delete from listings where id = 6");
            // $delete = $this->db->query("delete from listings where id = '$deleteid'");
            if($delete === false){
                $status_msg = "listing not deleted";
            }
            else{
                header("Location: ?command=market");
            }
        }


        include("templates/market.php");
    }

    private function detail() {
        $closet_user = [
            "id"=>$_SESSION["id"],
            "name"=>$_SESSION["name"],
            "email"=>$_SESSION["email"]
        ];
        
        // $data = $this->db->query("select item, description, price from listings where id = ?", "i", $_SESSION["id"]);
        $data = $this->db->query("select * from listings");

        foreach ($data as $info){
            $item_name = $info["item"];
            $price = $info["price"];
            $description = $info["description"];
        }

        // $data_2 = $this->db->query("select name from closet_user where id = ?;", "i", $_POST["itemid"]);
        // $item_name = $data["item"];

        // $result = $this->db->query($data);

        // if($data === false){
        //     echo "did not connect";
        // }
        // else{
        //     while($row = $data->fetch_assoc()){
        //     $id = $row["id"];
        //     $item_name = $row["item"];
        // }
        // }

        include("templates/detail.php");
    }

    private function create() {
        $closet_user = [
            "id"=>$_SESSION["id"],
            "name"=>$_SESSION["name"],
            "email"=>$_SESSION["email"]
        ];

        $listings = [
            "id"=>$_SESSION["id"]
        ];
        
        // $testmsg = "hi";
        if (isset($_POST["item"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["type"]) && isset($_POST["size"])) { // if form data is not null, and images have been uploaded
            // $testmsg = "bye";
            $data = $this->db->query("select * from listings where item = ?;", "s", $_POST["item"]);
            if ($data === false) {
                $error_msg = "Error checking for listing";
            } 
            else if (!empty($data)){ 
                $error_msg = "data not empty";
                header("Location: ?command=market");
                }
            else { // empty, no listings found
                $error_msg = 'Else statement reached';

                // Get last part of file path
                // $_FILES is an associative array, doing $_FILES[x]["name"] gets you the name of the uploaded file x (ex. 'dinner.png')
                // make sure it's all lowercase with strtolower
                $fileType = strtolower(pathinfo(basename($_FILES["image"]["name"]), PATHINFO_EXTENSION));

                // build an array to indicate allowed file types
                $validTypes = array("png", "tiff", "jpg", "jpeg", "gif");
                $JSONTypes = json_encode($validTypes);

                if(in_array($fileType, $validTypes)) {
                    // grab temp image upload location, formats it by adding slashes in front of escape characters
                    $imageTemp = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                    $insert_image = $this->db->query("insert into images (image) values ('$imageTemp');");
                } else {
                    $testmsg = "Upload only png, tiff, jpg, jpeg, and gif files.";
                }
                
                // inserts the new listing into the listings database
                $insert = $this->db->query("insert into listings (item, description, price, type, size) values (?, ?, ?, ?, ?);", 
                        "sssss", $_POST["item"], $_POST["description"], $_POST["price"], $_POST["type"], $_POST["size"]);
                // $insert_image = $this->db->query("insert into images (image) values (?);", "s", $_POST["image"]);
                if ($insert === false) {
                    $error_msg = "Error inserting listing";
                } 
                else {
                    $_SESSION["id"] = $data[0]["id"];
                    $_SESSION["item"] = $_POST["item"];
                    $_SESSION["description"] = $_POST["description"];
                    $_SESSION["price"] = $_POST["price"];
                    $_SESSION["type"] = $_POST["type"];
                    $_SESSION["size"] = $_POST["size"];
                    header("Location: ?command=market");
                }
            }
        }

        include("templates/create.php");
    }

    private function loadDetail() {
        $data = $this->db->query("select * from listings");

        $item_name = $data["item"];

        header("Content-type: application/json");
        echo json_encode($item_name, JSON_PRETTY_PRINT);
    }
//     private function loadDetail() {
//         $data = $this->db->query("select * from listings");
//         $names = [];

//         foreach ($data as $info){
//             array_push($names, $info["item"]);
//         }

//         header("Content-type: application/json");
//         echo json_encode($names, JSON_PRETTY_PRINT);
//     }
}
