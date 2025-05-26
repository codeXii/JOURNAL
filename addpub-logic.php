<?php

require './config/database.php';

if(isset($_POST['submit'])){

     $author = filter_var($_POST['author'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
     $co_author = filter_var($_POST['co-author'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
     $pub_title = filter_var($_POST['pub-title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
     $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
     $pub_photo = $_FILES['pub-photo'];
     $document = $_FILES['document'];


        // LOGIC FOR DOCUMENT UPLOAD
        $time = time();
        $document_name = $time . $document['name'];
        $document_tmp_name = $document['tmp_name'];
        $document_destination = './documents/' . $document_name;
        // make sure the file is a document 
        $allowed_file = ['pdf', 'docx', 'doc'];
        $files = explode('.', $document_name);
        $files = end($files);
        if(in_array($files, $allowed_file)){
            // make sure file is not too large (3mb)
            if($document['size'] < 3000000){
                // upload file
                move_uploaded_file($document_tmp_name, $document_destination);
            } else{
                $_SESSION['pub-doc'] = 'File size too big. Should be less than 3Mb';
            }
        }else{
            $_SESSION['pub-doc'] = 'Document file should be pdf, docx or doc';
        }

        
        if(isset($_SESSION['pub-doc'])){
            header('location:' . ROOT_URL . 'publications.php');
            die();
        }


      // LOGIC FOR COVER PHOTO UPLOAD
        $time = time();
        $thumbnail_name = $time . $pub_photo['name'];
        $thumbnail_tmp_name = $pub_photo['tmp_name'];
        $thumbnail_destination = './images/' . $thumbnail_name;
    
        // make sure the file is an image
        $allowed_files = ['png', 'jpeg', 'jpg', 'JPG', 'PNG'];
        $file = explode('.', $thumbnail_name);
        $file = end($file);
    
        if(in_array($file, $allowed_files)){
            // make sure file is not too large (3mb)
            if($pub_photo['size'] < 3000000){
                // upload file
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination);
            } else{
                $_SESSION['pub'] = 'File size too big. Should be less than 3Mb';
            }
    
        }else{
            $_SESSION['pub'] = 'File should be png, jpeg or jpg';
        }
    
        // INSERTING INPUTS INTO THE PUBS TABLE
        $insert_pub_query = "INSERT INTO pubs(author, co_author, pub_title, description, pub_photo, document) VALUES('$author', '$co_author', '$pub_title', '$description', '$thumbnail_name', '$document_name')";

        $insert_pub_result = mysqli_query($connect, $insert_pub_query);

        if(!mysqli_errno($connect)){
            // redirect to publications page with success message
            $_SESSION['pub-success'] = 'Publication was uploaded successfully';
            header('location:' . ROOT_URL . 'publications.php');
            die();
        }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
}else{
    header('location:' . ROOT_URL . 'publications.php');
    die();
}
