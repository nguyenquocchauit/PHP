<?php $curPageName = $_SERVER["SCRIPT_NAME"];
$curPageName = explode("/", $curPageName);
$curPageName = $curPageName[(sizeof($curPageName) - 1)];
?>
<div class="header">
    <nav class="navbar navbar-expand-lg justify-content-center">
        <div class="header-title">
            <h3>Báo cáo PHP nhóm 5</h3>
        </div>
    </nav>
    <div class="navigation card text-center">
        <div class="card-header ">
            <ul class="nav nav-tabs card-header-tabs justify-content-between">
                <li class="nav-item">
                    <a class="nav-link <?php if ($curPageName == "index.php") echo "active bg-info";
                                        else echo ""; ?>" href="index.php">Thông tin nhóm</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link <?php if ($curPageName == "exercise.php") echo "active bg-info";
                                        else echo ""; ?> " href="#">Bài tập cá nhân</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#" id="website-demo">Website Watch demo</a>
                </li>
            </ul>
        </div>
    </div>
</div>