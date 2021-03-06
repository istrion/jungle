<div class="content-header">
    <!-- Header Starts -->
    <div class="navbar-wrapper">

        <div class="navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">


                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>


                <!-- Nav Starts -->
                <div class="navbar-collapse  collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        foreach ($queryMenus as $menu) {
                            echo '<li><a href="'.$menu->url.'">'.$menu->title.'</a>';
                        }
                        ?>
                    </ul>
                </div>
                <!-- #Nav Ends -->

            </div>
        </div>

    </div>
    <!-- #Header Starts -->

    <div class="container">

        <!-- Header Starts -->
        <div class="header">
            <a href="<?= PATH_ADMIN ?>/" class="link-logo">
                <img src="<?= PATH_ADMIN ?>/img/template/jungle_logo.png" alt="Jungle immobilier" class="logo">
            </a>

            <ul class="pull-right">
                <div class="navbar-collapse  collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                            foreach ($queryMenus as $menu) {
                                echo '<li><a href="'.$menu->url.'">'.$menu->title.'</a>';
                            }
                        ?>
                    </ul>
                </div>
            </ul>
        </div>
        <!-- #Header Starts -->
    </div>
</div>