<h3 class="alert-success">
                        <?php
                        $message=Session::get('message');
                        if ($message)
                        { 
                            echo $message;
                            Session::put('message',NULL);
                        }
                        ?>
                    </h3>