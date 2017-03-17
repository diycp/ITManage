<div id="top" style="height:92px" role="navigation">
        <nav class="navbar navbar-custom">
            <div class="container">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="nav-current"><a href="">Home</a></li>
                        <?php foreach($data as $val):?>
                            <li <?php if($val['tag']==$this->id): ?>class="nav-current" <?php endif;?>><a href="<?php echo $val['url'];?>"><?php echo $val['name'];?></a></li>
                        <?php endforeach;?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-current"><a href="">javascript</a></li>
                        <li><a href="">个人中心</a></li>
                        <li><a href="">logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
<div>