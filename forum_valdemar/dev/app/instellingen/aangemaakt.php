<?php
include_once('app/helpers/helper_functions.php');
?>
<div class="container">
    <div class="row">
            <br>
            <div class="col-xs-12 text-left">
                <div class="previous" id="previous" onclick="previousSettings()" onmouseover="mouseover()"
                    onmouseout="mouseout()"><span class="fas fa-angle-double-left"></span> Previous</div>
            </div>
            <br>
        </div>
        <hr>
        
        <!-- BEGIN UPDATE REACTIES -->
            <h3 class="page-header">Reactie updaten</h3>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <?php
                            include_once('connect.php');

                            $kolommen = array_keys($gebruikers[0]);

                            foreach ($kolommen as $kolom) {
                                echo "<th class='tablehead'> $kolom </th>";
                            }
                        ?>
                        <th scope="col" class="tablehead">Content</th>
                        <th scope="col" class="tablehead">Delete</a></th>
                        <th scope="col" class="tablehead">Update</a></th>
                    </tr>
                </thead>
                    
                    <?php
                        $user_id = $_SESSION['user_id'];

                        $stmt = $conn->prepare("SELECT * FROM reactions WHERE user_id = $user_id");
                        $stmt->execute();
                        $data = $stmt->fetchAll();

                        foreach ($data as $k => $v):
                    ?>

                <tbody>
                        <tr>
                            <td><?= $v['id'] ?></td>
                            <td><?= $_SESSION['username'] ?></td>
                            <td><?= $_SESSION['email']  ?></td>
                            <td><?= $v['reaction'] ?></td>
                            <form action="app/instellingen/crud_instellingen.php?id=<?= $v['id']; ?>" method="POST">
                                <td>
                                    <button class="btn btn-danger" name="delete_reaction">Delete</button>
                                </td>
                            </form>
                            <form action="update_t_t_r.php?id=<?= $v['id'] ?>" method="POST">
                                <td>
                                    <button class="btn btn-primary" name="update_reaction">Update</button>
                                </td>
                            </form>
                        </tr>
                </tbody>

                <?php endforeach; ?>
            </table>
        <!-- EINDE UPDATE REACTIE -->



        <!-- BEGIN UPDATE TOPICS -->
            <h3 class="page-header">Topics updaten</h3>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <?php
                            include_once('connect.php');

                            $kolommen = array_keys($gebruikers[0]);

                            foreach ($kolommen as $kolom) {
                                echo "<th class='tablehead'> $kolom </th>";
                            }
                        ?>

                        <th scope="col" class="tablehead">Content</th>
                        <th scope="col" class="tablehead">Delete</a></th>
                        <th scope="col" class="tablehead">Update</a></th>
                    </tr>
                </thead>
                    
                    <?php
                        $user_id = $_SESSION['user_id'];

                        $stmt = $conn->prepare("SELECT * FROM topic WHERE user_id = $user_id");
                        $stmt->execute();
                        $data = $stmt->fetchAll();

                        foreach ($data as $k => $v):
                    ?>
                
                <tbody>
                    <tr>
                        <td><?= $v['id'] ?></td>
                        <td><?= $_SESSION['username'] ?></td>
                        <td><?= $_SESSION['email']  ?></td>
                        <td><?= $v['content'] ?></td>
                        <form action="app/instellingen/crud_instellingen.php?id=<?= $v['id']; ?>" method="POST">
                            <td>
                                <button class="btn btn-danger" name="delete_topic">Delete</button>
                            </td>
                        </form>
                        <form action="update_t_t_r.php?id=<?= $v['id'] ?>" method="POST">
                            <td>
                                <button class="btn btn-primary" name="update_topic">Update</button>
                            </td>
                        </form>
                    </tr>
                </tbody>

                <?php endforeach; ?>
            </table>
        <!-- EINDE UPDATE TOPICS -->



        <!-- BEGIN UPDATE THREADS -->
            <?php if(isAdmin()): ?>
                <h3 class="page-header">Thread updaten</h3>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <?php
                                    include_once('connect.php');

                                    $kolommen = array_keys($gebruikers[0]);

                                    foreach ($kolommen as $kolom) {
                                        echo "<th class='tablehead'> $kolom </th>";
                                    }
                                ?>

                                <th scope="col" class="tablehead">Content</th>
                                <th scope="col" class="tablehead">Delete</a></th>
                                <th scope="col" class="tablehead">Update</a></th>
                            </tr>
                        </thead>
                            
                            <?php
                                $user_id = $_SESSION['user_id'];

                                $stmt = $conn->prepare("SELECT * FROM threads");
                                $stmt->execute();
                                $data = $stmt->fetchAll();

                                foreach ($data as $k => $v):
                            ?>
                        
                        <tbody>
                            <tr>
                                <td><?= $v['id'] ?></td>
                                <td><?= $_SESSION['username'] ?></td>
                                <td><?= $_SESSION['email']  ?></td>
                                <td><?= $v['content'] ?></td>
                                <form action="app/instellingen/crud_instellingen.php?id=<?= $v['id']; ?>" method="POST">
                                    <td>
                                        <button class="btn btn-danger" name="delete_thread">Delete</button>
                                    </td>
                                </form>
                                <form action="update_t_t_r.php?id=<?= $v['id'] ?>" method="POST">
                                    <td>
                                        <button class="btn btn-primary" name="update_thread">Update</button>
                                    </td>
                                </form>
                            </tr>
                        </tbody>

                        <?php endforeach; ?>
                    </table>
            <?php endif; ?>
        <!-- EINDE UPDATE THREADS -->

        <div class="margin-bottom">

        </div>

    </div>
</div>