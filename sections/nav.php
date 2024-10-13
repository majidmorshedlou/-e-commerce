<nav class="container-fluid g-0 navbar navbar-expand-lg navbar-dark bg-primary ">
    <div class="container d-flex  justify-content-between">
        <a class="navbar-brand" href="<?php echo PATH; ?>index.php"><img class=" rounded-circle" src="<?php echo PATH; ?>images/logo/logo-color.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link fs-6" href="<?php echo PATH; ?>index.php">صفحه اصلی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6" href="<?php echo PATH; ?>index.php#products">محصولات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6" href="javascript:void(0)"> دسته‌بندی‌ها</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6" href="javascript:void(0)">تماس‌ با ‌ما</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6" href="javascript:void(0)"> درباره ما</a>
                </li>
            </ul>
            <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-danger justify-content-end d-lg-none" data-bs-toggle="modal" data-bs-target="#myModal">
            جستجو در محصولات
        </button>
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">نام محصول مورد نظر</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                        <form class="d-flex mt-3" action="<?php echo PATH; ?>search.php" method="get">
                            <input name="search" class="form-control me-2" type="text" placeholder="جستجو محصول">
                            <button class="btn btn-danger" type="submit">جستجو</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <!-- The Modal -->

        </div>
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-danger justify-content-end d-none d-lg-block" data-bs-toggle="modal" data-bs-target="#myModal">
            جستجو در محصولات
        </button>
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">نام محصول مورد نظر</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body ">
                        <form class="d-flex mt-3" action="search.php" method="get">
                            <input name="search" class="form-control me-2" type="text" placeholder="جستجو محصول">
                            <button class="btn btn-danger" type="submit">جستجو</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
    </div>
</nav>