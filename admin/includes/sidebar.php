<div id="layoutSidenav_nav">
            <!--  <?php  $page = substr($_SERVER['SCRIPT_NAME'], strrpos($page = $_SERVER['SCRIPT_NAME'], "/")+1);  ?> -->
                <nav class="sb-sidenav accordion sb-sidenav-dark bg-secondary" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link <?= $page == 'index.php' ? 'active' : '' ?>" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link <?= $page == 'manage_user.php' ? 'active' : '' ?>" href="manage_user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users mr-3"></i></div>
                                Manage_Total_user's
                            </a>
                            <a class="nav-link <?= $page == 'manage_admin.php' ? 'active' : '' ?>" href="manage_admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users mr-3"></i></div>
                                Manage_admin_user's
                            </a>
                            <a class="nav-link <?= $page == 'manage_normal_user.php' ? 'active' : '' ?>" href="manage_normal_user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users mr-3"></i></div>
                                Manage__user's
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed <?= $page == 'manage_catergory.php' || $page == 'manage_catergory.php' ? 'active' : '' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Catergories
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?= $page == 'manage_catergory.php' || $page == 'manage_catergory.php' ? 'show' : '' ?>" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?= $page == 'manage_catergory.php' ? 'active' : '' ?>" href="manage_catergory.php">Manage_Catergories</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed <?= $page == 'manage_post.php' || $page = 'manage_post.php' ? 'active' : '' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePosts" aria-expanded="false" aria-controls="collapsePosts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Posts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?= $page == 'manage_post.php' || $page == 'manage_post.php' ? 'show' : '' ?>" id="collapsePosts" aria-labelledby="Posts" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?= $page == 'manage_post.php' ? 'active' : '' ?>" href="manage_post.php">Manage_Posts</a>
                                </nav>
                            </div>
                         
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <?php  if(isset($_SESSION['auth_user'])) : ?>
                        <div class="small">Logged in as:</div>
                      <?php echo $_SESSION['auth_user']['user_name']; ?>
                    </div>
                    <?php endif; ?>
                </nav>
            </div>