<?php
session_start();
include_once('app/templates/bovenstuk_logged_in.php');

if(!isset($_SESSION['username'])) {
    // $_SESSION['error'] = 'U moet eerst inloggen om toegang te krijgen!';
    $_SESSION['error_profile'] = "U was niet bevoegd om deze pagina te weergeven";
    header('Location: index.php');
    exit(0);
}
?>

<div class="container">
    <div class="row">
        <div class="page-header">
            <h1>Profile</h1>
        </div>

        <div class="col-lg-12 text-center">
            <div class="profiel">
                <img class="foto" src="img/pf2.jpg" width="300px" height="300px" alt="photo">
                <!-- <h1>Profile Name</h1> -->
                <h1><?= $_SESSION['username'] ?></h1>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 margin-bottom">
            hallo Lorem, ipsum dolor sit amet consectetur adipisicing elit. Impedit necessitatibus non totam natus optio suscipit autem, atque dolorem molestiae iure tempore debitis officiis architecto cum voluptatum quasi at animi quod?
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi laboriosam fugiat vero delectus ut asperiores ea itaque, expedita pariatur voluptatum sit incidunt officia. Ipsa eos quisquam asperiores, cum eum nam!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, unde rerum perferendis, magni architecto vitae quaerat cum laboriosam distinctio odio doloremque ipsa obcaecati facilis aspernatur eveniet a accusantium cupiditate excepturi.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat tempore, laudantium vero aspernatur placeat harum optio velit tenetur, expedita debitis, voluptas neque excepturi ut natus porro. Minus enim quas voluptate.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis tempore molestiae necessitatibus, quo vero consequuntur libero accusantium expedita odit, odio sint eligendi, eos nisi magnam voluptatum quia beatae est aperiam?
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi laboriosam fugiat vero delectus ut asperiores ea itaque, expedita pariatur voluptatum sit incidunt officia. Ipsa eos quisquam asperiores, cum eum nam!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, unde rerum perferendis, magni architecto vitae quaerat cum laboriosam distinctio odio doloremque ipsa obcaecati facilis aspernatur eveniet a accusantium cupiditate excepturi.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat tempore, laudantium vero aspernatur placeat harum optio velit tenetur, expedita debitis, voluptas neque excepturi ut natus porro. Minus enim quas voluptate.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis tempore molestiae necessitatibus, quo vero consequuntur libero accusantium expedita odit, odio sint eligendi, eos nisi magnam voluptatum quia beatae est aperiam?
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi laboriosam fugiat vero delectus ut asperiores ea itaque, expedita pariatur voluptatum sit incidunt officia. Ipsa eos quisquam asperiores, cum eum nam!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, unde rerum perferendis, magni architecto vitae quaerat cum laboriosam distinctio odio doloremque ipsa obcaecati facilis aspernatur eveniet a accusantium cupiditate excepturi.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat tempore, laudantium vero aspernatur placeat harum optio velit tenetur, expedita debitis, voluptas neque excepturi ut natus porro. Minus enim quas voluptate.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis tempore molestiae necessitatibus, quo vero consequuntur libero accusantium expedita odit, odio sint eligendi, eos nisi magnam voluptatum quia beatae est aperiam?
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi laboriosam fugiat vero delectus ut asperiores ea itaque, expedita pariatur voluptatum sit incidunt officia. Ipsa eos quisquam asperiores, cum eum nam!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, unde rerum perferendis, magni architecto vitae quaerat cum laboriosam distinctio odio doloremque ipsa obcaecati facilis aspernatur eveniet a accusantium cupiditate excepturi.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat tempore, laudantium vero aspernatur placeat harum optio velit tenetur, expedita debitis, voluptas neque excepturi ut natus porro. Minus enim quas voluptate.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis tempore molestiae necessitatibus, quo vero consequuntur libero accusantium expedita odit, odio sint eligendi, eos nisi magnam voluptatum quia beatae est aperiam?
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 margin-bottom">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi laboriosam fugiat vero delectus ut asperiores ea itaque, expedita pariatur voluptatum sit incidunt officia. Ipsa eos quisquam asperiores, cum eum nam!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, unde rerum perferendis, magni architecto vitae quaerat cum laboriosam distinctio odio doloremque ipsa obcaecati facilis aspernatur eveniet a accusantium cupiditate excepturi.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat tempore, laudantium vero aspernatur placeat harum optio velit tenetur, expedita debitis, voluptas neque excepturi ut natus porro. Minus enim quas voluptate.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis tempore molestiae necessitatibus, quo vero consequuntur libero accusantium expedita odit, odio sint eligendi, eos nisi magnam voluptatum quia beatae est aperiam?
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi laboriosam fugiat vero delectus ut asperiores ea itaque, expedita pariatur voluptatum sit incidunt officia. Ipsa eos quisquam asperiores, cum eum nam!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, unde rerum perferendis, magni architecto vitae quaerat cum laboriosam distinctio odio doloremque ipsa obcaecati facilis aspernatur eveniet a accusantium cupiditate excepturi.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat tempore, laudantium vero aspernatur placeat harum optio velit tenetur, expedita debitis, voluptas neque excepturi ut natus porro. Minus enim quas voluptate.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis tempore molestiae necessitatibus, quo vero consequuntur libero accusantium expedita odit, odio sint eligendi, eos nisi magnam voluptatum quia beatae est aperiam?
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi laboriosam fugiat vero delectus ut asperiores ea itaque, expedita pariatur voluptatum sit incidunt officia. Ipsa eos quisquam asperiores, cum eum nam!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, unde rerum perferendis, magni architecto vitae quaerat cum laboriosam distinctio odio doloremque ipsa obcaecati facilis aspernatur eveniet a accusantium cupiditate excepturi.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat tempore, laudantium vero aspernatur placeat harum optio velit tenetur, expedita debitis, voluptas neque excepturi ut natus porro. Minus enim quas voluptate.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis tempore molestiae necessitatibus, quo vero consequuntur libero accusantium expedita odit, odio sint eligendi, eos nisi magnam voluptatum quia beatae est aperiam?
        </div>
    </div>
</div>

<?php
// include_once('index.php');
include_once('app/templates/onderstuk.php');